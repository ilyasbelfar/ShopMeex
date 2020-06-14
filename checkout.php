<?php

    include 'includes/session.php';
    
    if (empty($_SESSION['cart']['total'])) {
        header('Location: cart.php');
        exit();
    }

    $subTotal = 0;
    $prodEditErrors = '';
    
    $fname = $lname = $email = $phoneNumber = $adr_1 = $adr_2 = $city = $zipCode = $state = $country = '';
    if(isset($_SESSION['id']) && isset($_SESSION['cart'])) {
		$stmt = $db->query("SELECT * FROM users WHERE id='" . $_SESSION['id'] . "'");
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        if($results) {
            $fname = $results['firstname'];
            $lname = $results['lastname'];
            $email = $results['email'];
            $phoneNumber = $results['contact_info'];
            $zipCode = $results['postal'];
            $adr_1 = $results['address'];
            $adr_2 = $results['address2'];
            $city = $results['city'];
            $zipCode = $results['postal'];
            $state = $results['state'];
            $country = $results['country'];
        }
    } else if(isset($_SESSION['id']) && !isset($_SESSION['cart'])) {
        header('Location: cart.php');
        exit();
    }
    else {
        header('Location: customer/login.php');
        exit();
    }
    
    if(isset($_SESSION['id']) && isset($_SESSION['cart']) && isset($_POST['submitted'])) {

        // Validate Email
            $stmtt=$db->prepare('SELECT id, email, password from users where email=?');
            $stmtt->bindValue(1, $_POST['email']);
            $stmtt->execute();
            $count = $stmtt->rowCount();

            $cpt = 0;

            if ($count > 0) {
                foreach ($stmtt as $row)
                {
                    if ($row['id'] != $_SESSION['id'])
                    {
                        $cpt += 1;
                    } else {
                        $cpt += 0;
                    }
                }
                if ($cpt != 0)
                {
                    $prodEditErrors .= "<div class='errors' role='alert'><strong>Email</strong>&nbsp;you have entered is already taken by another user!</div>";
                }
                else
                {
                    $prodEditErrors = "";
                }
            }

            if (empty($prodEditErrors) && $cpt == 0) {
                try
                    {
                        $_POST['fname'] = str_replace(' ', '',$_POST['fname']);
                        $_POST['lname'] = str_replace(' ', '',$_POST['lname']);
                        $_POST['phone_num'] = str_replace(' ', '',$_POST['phone_num']);

                        // Update Profile Informations After Checkout...
                        $sql = $db->prepare("UPDATE users SET firstname=?, lastname=?, email=?, contact_info=?, address=?, country=?, state=?, address2=?, city=?, postal=? WHERE id=?");
                        $sql->bindValue(1, $_POST['fname']);
                        $sql->bindValue(2, $_POST['lname']);
                        $sql->bindValue(3, $_POST['email']);
                        $sql->bindValue(4, $_POST['phone_num']);
                        $sql->bindValue(5, $_POST['address-1']);
                        $sql->bindValue(6, $_POST['country_name']);
                        $sql->bindValue(7, $_POST['state-province']);
                        $sql->bindValue(8, $_POST['address-2']);
                        $sql->bindValue(9, $_POST['town']);
                        $sql->bindValue(10, $_POST['zip-code']);
                        $sql->bindValue(11, $_SESSION['id']);
                        $sql->execute();
                        unset($sql);

                        if (isset($_POST['order_notes']) && !empty($_POST['order_notes'])) {
                            $orderNotes = $_POST['order_notes'];
                        } else {
                            $orderNotes = '';
                        }

                        if (isset($_POST['pay_meth']) && !empty($_POST['pay_meth'])) {
                            $payMethod = $_POST['pay_meth'];
                            echo $payMethod;
                        } else {
                            $payMethod = '';
                            echo $payMethod;
                        }

                        $stmt = $db->prepare("INSERT INTO placed_orders(order_name, order_email, order_status, coupon_used, order_notes, payment_method) VALUES (?, ?, ?, ?, ?, ?)");
                        $stmt->bindValue(1, $_SESSION['username']);
                        $stmt->bindValue(2, $_SESSION['email']);
                        $stmt->bindValue(3, '1');
                        if (count($_SESSION['cart']['used_coupons']) > 0) {
                            $stmt->bindValue(4, '1');
                        } else {
                            $stmt->bindValue(4, '-1');
                        }
                        $stmt->bindValue(5, $orderNotes);
                        $stmt->bindValue(6, $payMethod);
                        $stmt->execute();
                        
                        $sql_1 = $db->prepare('SELECT order_id FROM placed_orders ORDER BY order_id DESC LIMIT 1');
                        $sql_1->execute();
                        $orderID = $sql_1->fetch(PDO::FETCH_ASSOC);

                        $sql_2 = $db->prepare('SELECT * FROM cart LEFT JOIN placed_orders ON 1 WHERE user_id=? AND order_id=?');
                        $sql_2->bindValue(1, $_SESSION['id']);
                        $sql_2->bindValue(2, $orderID['order_id']);
                        $sql_2->execute();

                        foreach($sql_2 as $key) {
                            $sql_3 = $db->prepare('INSERT INTO orders_items(order_id, product_id, quantity, usedcoupon_code) VALUES (?, ?, ?, ?)');
                            $sql_3->bindValue(1, $key['order_id']);
                            $sql_3->bindValue(2, $key['product_id']);
                            $sql_3->bindValue(3, $key['quantity']);
                            
                            if (isset($_SESSION['cart']['used_coupons']) && count($_SESSION['cart']['used_coupons']) > 0) {
                                $usedCoupon = '';
                                for ($i=0; $i < count($_SESSION['cart']['used_coupons']); $i++) { 
                                    $usedCoupon = $_SESSION['cart']['used_coupons'][$i];
                                    $sql = $db->prepare('SELECT * FROM coupons LEFT JOIN (SELECT product_id AS prodIdent, user_id, quantity FROM cart) AS cart ON coupons.product_id = cart.prodIdent LEFT JOIN (SELECT id AS product_ident, price FROM products) AS products ON coupons.product_id = products.product_ident WHERE products.product_ident = cart.prodIdent AND user_id=:userID AND coupon_code=:couponCode AND product_id =:identifier');
                                    if ($sql->execute(['userID'=>$_SESSION['id'], 'couponCode'=>$usedCoupon, 'identifier'=>$key['product_id']])) {
                                        try {
                                            $results = $sql->fetchAll(PDO::FETCH_ASSOC);
                                            if ($results) {
                                                $sql_3->bindValue(4, $usedCoupon);
                                            } else {
                                                $sql_3->bindValue(4, '-1');
                                            }
                                        } catch (PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    }
                                }
                            } else {
                                $sql_3->bindValue(4, '-1');
                            }
                            $sql_3->execute();
                        }
                        $_SESSION['totalAmount'] = $_SESSION['cart']['total'];
                        $sql_4 = $db->prepare("DELETE FROM cart WHERE user_id=:ident");
                        $sql_4->bindParam(':ident', $_SESSION['id'], PDO::PARAM_STR);
                        $sql_4->execute();
                        header('Location: place_order.php');
                        exit();
                    }
                    catch(PDOException $e)
                    {
                        echo "Error: " . $e->getMessage();
                    }
            }
    }
?>


<!DOCTYPE html>
<html>

<head>
    <title>Checkout | ShopMeex Online Store</title>
    <?php include'includes/header.php' ?>
    <!-- End Header -->

    <!-- Start Cart -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="wrapper">
                <div class="col-35">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="checkout.php">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout">
        <div class="container">
            <div class="wrapper">
                <div class="section-title">
                    <h2>Make Your Checkout Here</h2>
                    <p style="font-size: 14px;">Please register in order to checkout more quickly</p>
                </div>
                <div class="notices">
                    <?php echo $prodEditErrors; ?>
                </div>
<!--                 <div class="noticesGroup">
                    <ul class="list-errors" role="alert">
                        <li data-id="billing_error"><strong>Billing First name</strong> is a required field.</li>
                        <li data-id="billing_error"><strong>Billing Last name</strong> is a required field.</li>
                        <li data-id="billing_error"><strong>Billing Country / Region</strong> is a required field.</li>
                        <li data-id="billing_error"><strong>Billing Street Address</strong> is a required field.</li>
                        <li data-id="billing_error"><strong>Billing Town / City</strong> is a required field.</li>
                        <li data-id="billing_error"><strong>Billing State</strong> is a required field.</li>
                        <li data-id="billing_error"><strong>Billing ZIP</strong> is a required field.</li>
                        <li data-id="billing_error"><strong>Billing Phone</strong> is a required field.</li>
                    </ul>
                </div> -->
                <form method="POST" style="display:flex;flex-wrap:wrap">
                    <div class="col-40">
                        <div class="form-main">
                            <div class="form-title">
                                <h3>Billing Details</h3>
                                <p>Your profile will be updated with the entered informations after checkout.</p>
                            </div>
                            <div class="row">
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="fname">First Name <span>*</span></label>
                                        <input id="fname" name="fname" type="text" placeholder="" value="<?php echo $fname; ?>" required>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="lname">Last Name <span>*</span></label>
                                        <input name="lname" type="text" placeholder="" id="lname" value="<?php echo $lname; ?>" required>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="mail">Email Address <span>*</span></label>
                                        <input id="mail" name="email" type="email" placeholder="" value="<?php echo $email; ?>" required>
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="phone_num">Phone Number <span>*</span></label>
                                        <input id="phone_num" name="phone_num" type="tel" placeholder="" value="<?php echo $phoneNumber; ?>" required>
                                        <p class="error"></p>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="country">Country <span>*</span></label>
                                        <select name="country_name" id="country">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="VG">British Virgin Islands</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos [Keeling] Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo - Brazzaville</option>
                                            <option value="CD">Congo - Kinshasa</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d’Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong SAR China</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macau SAR China</option>
                                            <option value="MK">Macedonia</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar [Burma]</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="KP">North Korea</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territories</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn Islands</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">São Tomé and Príncipe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia</option>
                                            <option value="KR">South Korea</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="US" selected="selected">United Kingdom</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UM">U.S. Minor Outlying Islands</option>
                                            <option value="VI">U.S. Virgin Islands</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VA">Vatican City</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="state-province">State / Divition<span>*</span></label>
                                        <select name="state-province" id="state-province">
                                            <option value="state" selected="selected">New York</option>
                                            <option>Los Angeles</option>
                                            <option>Chicago</option>
                                            <option>Houston</option>
                                            <option>San Diego</option>
                                            <option>Dallas</option>
                                            <option>Charlotte</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="adr-1">Address Line 1 <span>*</span></label>
                                        <input id="adr-1" name="address-1" type="text" placeholder="House number and Street name" value="<?php echo $adr_1; ?>" required>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="adr-2">Address Line 2</label>
                                        <input id="adr-2" name="address-2" type="text" placeholder="Apartment, suite, unit etc. (optional)" value="<?php echo $adr_2; ?>">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="town">Town / City <span>*</span></label>
                                        <input id="town" name="town" type="text" placeholder="" value="<?php echo $city; ?>" required>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="zip-code">Postal Code <span>*</span></label>
                                        <input id="zip-code" name="zip-code" type="text" placeholder="" value="<?php echo $zipCode; ?>" required>
                                    </div>
                                </div>
                                <?php
                                    $hideInputs = '';
                                    if (isset($_SESSION['id'])) {
                                        $hideInputs = 'invisible';
                                    } else {
                                        $hideInputs = '';
                                    }
                                    
                                ?>
                                <div class="col-401 full <?php echo $hideInputs; ?>">
                                    <div class="form-group">
                                        <input id="cbox" type="checkbox">
                                        <label for="cbox" id="cbox-pass">Create an account?</label>
                                    </div>
                                </div>
                                <div class="col-401 inphidden <?php echo $hideInputs; ?>">
                                    <div class="form-group">
                                        <label for="motpass">Create account password<span>*</span></label>
                                        <input id="motpass" name="motpass" type="password" placeholder="">
                                    </div>
                                </div>
                                <div class="form-title" style="margin-top:2rem;">
                                    <h3>Additional Informations</h3>
                                </div>
                                <div class="col-15">
                                    <div class="form-group message">
                                        <label for="order_notes">Order Notes (Optional)</label>
                                        <textarea id="order_notes" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-41">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Your Order</h2>
                                <div class="content">
                                    <ul>
                                        <li>Product<span>SubTotal</span></li>
                                        <?php if(isset($_SESSION['id'])) {
                            				try {
                            					$stmt = $db->prepare("SELECT *, cart.quantity AS cq , cart.id As cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
                            					$stmt->execute(['user_id'=>$user['id']]);
                            					foreach($stmt as $row) { ?>
                                                    <li class="cart_item">
                                                        <?php echo ucwords($row['name']);?>&nbsp;
                                                        <strong>×&nbsp;<?php echo $row['cq'];?></strong>
                                                        <span>$<?php echo $row['price']*$row['cq']?>.00</span>
                                                    </li>
                                                <?php $subTotal += $row['price']*$row['cq']; }
                                    		} catch(PDOException $e){
                                    				echo "Error: " . $e->getMessage();
                                    		}
                                    	}?>
                                    	<li>SubTotal<span>$<?php echo number_format((float)$subTotal, 2, '.', ''); ?></span></li>
                                    	<li>Discount<span>$<?php echo ($subTotal > $_SESSION['cart']['total']) ? number_format((float)($subTotal - $_SESSION['cart']['total']), 2, '.', '') : number_format((float)0, 2, '.', ''); ?></span></li>
                                        <li>Total<span>$<?php echo number_format((float)$_SESSION['cart']['total'], 2, '.', ''); ?></span></li>
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Payments</h2>
                                <div class="content">
                                    <div class="checkbox">
                                        <label for="cashdel" class="float-left custom-control custom-checkbox pay-meth">
                                            <input id="cashdel" type="checkbox" class="custom-control-input" name="pay_meth" value="cash on delivery" checked required>
                                            <div class="custom-control-label"> Cash On Delivery</div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <input type="submit" name="submitted" class="btn" value="Place Order" style="border:none;cursor:pointer;">
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- End Cart -->

    <!-- Start NewsLetter -->

    <div class="newsletter-area">
        <div class="container">
            <div class="wrapper">
                <div class="newsletter-image">
                    <img src="images/banners/slide4.jpg">
                </div>

                <div class="newsletter-form">
                    <label for="mailing">Subscribe our newsletter</label>
                    <input type="email" id="mailing" name="email" placeholder="Enter Your E-mail...">
                    <button type="submit" name="subscribe">
                        <i class="fa fa-envelope"></i>
                        <span>Subscribe</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- End NewsLetter -->

    <!-- Start Footer -->

    <footer id="main-footer">
        <div class="container">
            <section class="footer-sections">
                <div class="wrapper">
                    <div class="about-shopmx">
                        <div class="row">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="images/Logo-header.png">
                                </a>
                            </div>
                            <p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
                            <p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
                        </div>
                    </div>
                    <aside>
                        <h3>Help</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-envelope"></i>Contact Us</a></li>
                            <li><a href="#"><i class="fas fa-money-check"></i>Money Refund</a></li>
                            <li><a href="#"><i class="fas fa-info-circle"></i>Order Status</a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i>Shipping Info</a></li>
                            <li><a href="#"><i class="fa fa-share"></i>Open Dispute</a></li>
                        </ul>
                    </aside>
                    <aside>
                        <h3>Account</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-user-circle"></i>User Login</a></li>
                            <li><a href="#"><i class="fa fa-user-plus"></i>User Register</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>Account Settings</a></li>
                            <li><a href="#"><i class="fa fa-cart-plus"></i>My Orders</a></li>
                        </ul>
                    </aside>
                    <aside>
                        <h3>Social Media</h3>
                        <ul class="social-media">
                            <li>
                            <li><a href="#"><i class="fab fa-facebook"></i>Facebook</a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>N° Phone</a></li>
                        </ul>
                    </aside>
                </div>
            </section>
        </div>
        <div class="copyrights-payments">
            <div class="container">
                <p class="rights">&copy; <a href="#"><span class="span-1">Shop</span><span class="span-2">Meex</span></a>, All Rights Reserved. &reg;</p>
                <div class="payments-bg">
                    <img src="images/payment.png">
                </div>
            </div>
        </div>
    </footer>

    <!-- End Footer -->

    <div class="gototop">
        <a href="#" class="gotop"><i class="fa fa-arrow-up"></i></a>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/jquery.nice-select.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://kit.fontawesome.com/5d49be4ed0.js" crossorigin="anonymous"></script>

    <?php include 'includes/script.php'; ?>

</body>

</html>
