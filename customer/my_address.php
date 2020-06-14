<?php
    include 'includes/session.php';
    
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $getUser = $db->prepare("SELECT * FROM users WHERE email = ?");
        $getUser->execute(array($_SESSION["email"]));
        $info = $getUser->fetch();
        $emailid = $info['email'];
        $customer_id = $info['id'];

        // CART

        $getcart = $db->prepare("SELECT * FROM cart WHERE user_id = ?");
        $getcart->execute(array($customer_id));
        $infoo = $getcart->fetch();
        if (!empty($infoo))
            $b=true;
         else 
            $b=false;

        // ORDERS

        $getorders = $db->prepare("SELECT * FROM orders WHERE user_id = ?");
        $getorders->execute(array($customer_id));
        $infoo = $getorders->fetch();
        if (!empty($infoo))
            $c=true;
        else 
            $c=false;
         
        //Wishlist

        $getwish = $db->prepare("SELECT * FROM wishlist WHERE user_id = ?");
        $getwish->execute(array($customer_id));
        $infoo = $getwish->fetch();
        if (!empty($infoo))
            $a=true;
        else 
            $a=false;
         
         }

    else
        header('location:login.php');


   
    $emailInsErr=$userErr=$msg=$msgerr="";
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
       

     

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['fname']))
            $fname=$_POST['fname'];
        else
            $fname=$info['firstname'];
            
        if (isset($_POST['lname']))
            $lname=$_POST['lname'];
        else
            $lname=$info['lastname'];
            
        if (isset($_POST['email'])&&($_POST['email']!=$info['email'])){
            $email=$_POST['email'];
            $stmtt=$db->prepare('SELECT email from users where email=?');
            $stmtt->execute(array($email));
            $count=$stmtt->rowCount();
            if ($count>0){  
                $emailInsErr="Email Already Taken";
                echo "<script>alert('Email Already Taken.');</script>";
                unset($stmt);
            }
            
            else 
                $_SESSION["email"] = $email;
        }
        else
            $email=$info['email'];
            
        if (isset($_POST['username'])&&($_POST['username']!=$info['username'])){
            $userr=$_POST['username'];
            $st=$db->prepare('SELECT username from users where username=?');
            $st->execute(array($userr));
            $count=$st->rowCount();
            if ($count>0){  
                $userErr="Username Already Taken";
                echo "<script>alert('Username Already Taken.');</script>";
                unset($st);
            }
            
            else 
                $_SESSION["username"] = $userr;
        }
        else
            $userr=$info['username'];
            
        if (isset($_POST['company_name']))
            $contact=$_POST['company_name'];
        else
            $contact=$info['contact_info'];
    
        if (isset($_POST['country_name'])&&($_POST['country_name']!='Please select ...'))
            $country=$_POST['country_name'];
        else
            $country=$info['country'];
    
        if (isset($_POST['state-province'])&&($_POST['state-province']!='Please select ...'))
            $state=$_POST['state-province'];
        else
            $state=$info['state'];

        if (isset($_POST['address-1']))
            $address1=$_POST['address-1'];
        else
            $address1=$info['address'];
            
        if (isset($_POST['address-2']))
            $address2=$_POST['address-2'];
        else
            $address2=$info['address2'];
            
        if (isset($_POST['town']))
            $city=$_POST['town'];
        else
            $city=$info['city'];
        
        if (isset($_POST['zip-code']))
            $postal=$_POST['zip-code'];
        else
            $postal=$info['postal'];

        //Password
        if (!empty($_POST['password_current'])){

            $password = $info["password"];
            $pass=$_POST['password_current'];
            $salt="^%r8yuyg";//create our salt; salt is special String added to password // way of encrption on database;
            $pass = sha1(filter_var($pass.$salt, FILTER_SANITIZE_STRING));// sha1 function to transform the password into long String; known as hashing method;
            if($pass==$password){
                
                if(empty($_POST['password_1']) OR empty($_POST['password_2'])){
                    $msg="Please fill all the fields";
                    echo "<script>alert('Please fill all the fields.');</script>";
                    $err=true;
                }
                
                else if($_POST['password_1']==$_POST['password_2']) {
                     $pass=$_POST['password_1'];
                     $salt="^%r8yuyg";
                     $pass = sha1(filter_var($pass.$salt, FILTER_SANITIZE_STRING));
                     $stmt=$db->prepare('UPDATE users set password=? where email=?');
                     if ($stmt->execute(array($pass,$emailid)))
                        echo "<script>alert('Password updated success.');</script>";
                        
                     

                } 
                else{
                    $msg='The two Passwords did not match';
                    echo "<script>alert('The two Passwords did not match.');</script>";
                    $err=true;
                }



            }
            else {
                 
                $msg='Current password incorrect';
                echo "<script>alert('Current password incorrect.');</script>";
                $err=true;
            }


        }   

        if (empty($emailInsErr)&&empty($userErr)&&empty($err)){

        $stmt=$db->prepare('UPDATE users set firstname=?,lastname=?,email=?,username=?,contact_info=?,country=?,state=?,address=?,address2=?,city=?,postal=? where email=?');
        $stmt->execute(array($fname,$lname,$email,$userr,$contact,$country,$state,$address1,$address2,$city,$postal,$emailid));

        if ($stmt) {
            echo "<script>alert('User Has Been Updated successfully')</script>";
            echo "<script>window.open('buyer-dashboard.php?user=$userr','_self')</script>";
        }
        else 
            header("location: ../404.php");
        }
 }

?>


<!DOCTYPE html>
<html>

<head>
    <title>My Addresses | ShopMeex Online Store</title>
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->

    <!-- Start Dashboard -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="wrapper">
                <div class="col-35">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="../index.php">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="buyer-dashboard.php">My Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user-dashboard">
        <div class="container">
            <div class="wrapper">
                <div class="tabs-wrapper">
                    <ul class="tabs">
                        <li class="addresses">
                            <a href="#dashboard">Dashboard</a>
                        </li>
                        <li class="orders">
                            <a href="#orders">Orders</a>
                        </li>
                        <li class="downloads">
                            <a href="#downloads">Downloads</a>
                        </li>
                        <li class="dashboard active">
                            <a href="#addresses">Addresses</a>
                        </li>
                        <li class="acc-details">
                            <a href="#acc-details">Account Details</a>
                        </li>
                        <li class="wishlist">
                            <a href="#wishlist">Wishlist</a>
                        </li>
                        <li class="logout">
                            <a href="#logout">Log Out</a>
                        </li>
                    </ul>
                    <div class="paneltbs panel-1" id="dashboard" style="display: none;" >
                        <p>Hello <strong><?php echo $_SESSION["username"]; ?></strong> (not <strong><?php echo $_SESSION["username"]; ?></strong>? <a href="logout.php">Log out</a>)</p>
                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                        <div class="myaccount-links">
                            <div class="dashboard-link">
                                <a href="buyer-dashboard.php">Dashboard</a>
                            </div>
                            <div class="orders-link">
                                <a href="my_orders.php">Orders</a>
                            </div>
                            <div class="downloads-link">
                                <a href="my_downloads.php">Downloads</a>
                            </div>
                            <div class="edit-address-link">
                                <a href="my_address.php">Addresses</a>
                            </div>
                            <div class="edit-account-link">
                                <a href="acc_details.php">Account details</a>
                            </div>
                            <div class="wishlist-link">
                                <a href="my_wishlist.php">Wishlist</a>
                            </div>
                            <div class="customer-logout-link">
                                <a href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                         
                            <?php if ($c==true){  
                             echo '
                             <div class="paneltbs panel-2" id="orders" style="display: none;"><table class="shopping-cart">
                            <thead>
                                <tr class="main-heading">
                                    <th class="text-center" style="padding-left: 1.5rem;padding-right: 1.5rem"><i class="ti-trash remove-icon"></i></th>
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">UNIT PRICE</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>';
                                
    
                                   $stmt = $db->prepare("SELECT *,orders.quantity as oq FROM orders LEFT JOIN products ON products.id=orders.product_id  WHERE user_id=:user_id");
                                        $stmt->execute(['user_id'=>$customer_id]);
                                        foreach($stmt as $row) {
    
                                    
                                echo '<tr>
                                    <td class="action" data-title="Remove"><a href="#" id="remove-product" rel="'.$row['product_id'].'" class="order_delete"   ><i class="ti-trash remove-icon"></i></a></td>
                                    <td class="image" data-title="No"><img src="../images/items/'.$row['photo'].' "alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="../product.php?product='.$row['slug'].'">'.$row['name'].'</a></p>
                                        <p class="product-des">'.$row['description'].'</p>
                                    </td>
                                    <td class="prix" data-title="Price"><span>$'. $row['price'].'<span class="unit-price"></span></span>
                                    </td>
                                    <td class="prix" data-title="Quantity">
                                        <span>'.$row['oq'].'</span>
                                    </td>
                                    <td class="prix" data-title="Status">
                                        <span>PAID</span>
                                    </td>';
                    
                            } echo '</tbody>
                        </table></div>';}
                            else 
                                echo  '<div class="paneltbs panel-2" id="orders" style="display: none;">
                        <div class="alert-message"><a href="../product.php">Browse products </a>No order has been made yet.</div>
                    </div>'; ?>
                            
                    
                    
                       



                   
                        <?php if ($b==true){  
                            
                        echo '<div class="paneltbs panel-3" id="downloads" style="display: none;">
                        <table class="shopping-cart">
                            <thead>
                                <tr class="main-heading">
                                    <th class="text-center" style="padding-left: 1.5rem;padding-right: 1.5rem"><i class="ti-trash remove-icon"></i></th>
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">UNIT PRICE</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>';
                                
    
                                    $stmt = $db->prepare("SELECT *, cart.quantity AS cq , cart.id As cartid FROM cart LEFT JOIN products ON products.id=cart.product_id  WHERE user_id=:user_id");
                                        $stmt->execute(['user_id'=>$customer_id]);
                                        foreach($stmt as $row) {
    
                                    
                                echo '<tr>
                                    <td class="action" data-title="Remove"><a href="#" id="remove-product" rel="'.$row['product_id'].'" class="cart_delete"   ><i class="ti-trash remove-icon"></i></a></td>
                                    <td class="image" data-title="No"><img src="../images/items/'.$row['photo'].' "alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="../product.php?product='.$row['slug'].'">'.$row['name'].'</a></p>
                                        <p class="product-des">'.$row['description'].'</p>
                                    </td>
                                    <td class="prix" data-title="Price"><span>$'.$row['price'].'<span class="unit-price"></span></span>
                                    </td>
                                    <td class="prix" data-title="Quantity">
                                        <span>'.$row['cq'].'</span>
                                    </td>';
                            }
                            echo '</tbody>
                        </table> </div>'; }
                            else 
                                echo  '<div class="paneltbs panel-3" id="downloads" style="display: none;">
                        <div class="alert-message"><a href="../product.php">Browse products </a>Your cart is currently empty.</div>
                    </div>'; ?>
                            
                   

                    <div class="paneltbs panel-4" id="addresses" style="">
                        <form class="form" method="post" action="my_address.php">
                            <div class="row">
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="fname">First Name<span>*</span></label>
                                        <input id="fname" name="fname" type="text" placeholder="" value="<?php echo $info['firstname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span>*</span></label>
                                       <input name="lname" type="text" placeholder="" id="lname" value="<?php echo $info['lastname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="mail">Email Address<span>*</span></label>
                                        <input id="mail" name="email" type="email" placeholder="" value="<?php echo $info['email']; ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                        <p class=error-form><?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $emailInsErr; ?></p>
                                    </div>
                                     
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="phone">Phone Number<span>*</span></label>
                                        <input id="phone" name="company_name" type="tel" placeholder="" value="<?php echo $info['contact_info']; ?>"required pattern="[0-9]*" >
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="country">Country<span>*</span></label>
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
                                            <option value="<?php if(!empty($info['country']))                                             echo $info['country'];
                                            else echo 'Please select ...';
                                             ?>" selected="selected"><?php if(!empty($info['country']))                                             echo $info['country'];
                                            else echo 'Please select ...';
                                             ?></option>
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
                                            <option value="<?php if (!empty($info['state'] )) echo $info['state'];
                                            else echo 'Please select ...';?>" selected="selected"><?php if (!empty($info['state'] )) echo $info['state'];
                                            else echo 'Please select ...';?>                                          </option>
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
                                        <label for="adr-1">Address Line 1<span>*</span></label>
                                        <input id="adr-1" name="address-1" type="text" placeholder="" value="<?php echo $info['address']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="adr-2">Address Line 2<span>*</span></label>
                                        <input id="adr-2" name="address-2" type="text" placeholder="" value="<?php echo $info['address2']; ?>" >
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="town">Town / City<span>*</span></label>
                                       <input id="town" name="town" type="text" placeholder="" value="<?php echo $info['city']; ?>">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="zip-code">Postal Code<span>*</span></label>
                                        <input id="zip-code" name="zip-code" type="text" placeholder="" value="<?php echo $info['postal']; ?>">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <button type="submit" class="button" name="save_account_details" value="Save changes">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="paneltbs panel-5" id="acc-details" style="display: none;">
                        <form class="form" method="post" action="acc_details.php">
                            <div class="row">
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="fname">First Name<span>*</span></label>
                                        <input id="fname" name="fname" type="text" placeholder="" value="<?php echo $info['firstname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span>*</span></label>
                                         <input name="lname" type="text" placeholder="" id="lname" value="<?php echo $info['lastname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="mail">Email Address<span>*</span></label>
                                         <input id="mail" name="email" type="email" placeholder="" value="<?php echo $info['email']; ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                         <p class=error-form><?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $emailInsErr; ?></p>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="username">Username<span>*</span></label>
                                        <input id="username" name="username" type="text" placeholder="" value="<?php echo $info['username']; ?>">
                                        <p class=error-form><?php if ($_SERVER['REQUEST_METHOD']=='POST') echo $userErr; ?></p>
                                    </div>
                                </div>
                                <div class="col-401 field">
                                    <div class="form-group">
                                        <fieldset>
                                            <legend>Password change</legend>
                                            <p>
                                                <label for="password_current">Current password (leave blank to leave unchanged)</label>
                                                <span class="password-input">
                                                    <input id="password_current" name="password_current" type="password" placeholder="">
                                                </span>
                                            </p>
                                            <p>
                                                <label for="password_1">New password (leave blank to leave unchanged)</label>
                                                <span class="password-input">
                                                    <input id="password_1" name="password_1" type="password" placeholder="">
                                                </span>
                                            </p>
                                            <p>
                                                <label for="password_2">Confirm new password</label>
                                                <span class="password-input">
                                                    <input id="password_2" name="password_2" type="password" placeholder="">
                                                </span>
                                            </p>
                                        </fieldset>
                                             <p class=error-form>
                                                <?php if ($_SERVER['REQUEST_METHOD']=='POST')  
                                                     echo $msg;  
                                                ?>
                                                    
                                            </p>
                                    </div>

                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <button type="submit" class="button" name="save_account_detailss" value="Save changes">Save changes</button>
                                         
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    
                    <?php if ($a==true){  
                            
                        echo '<div class="paneltbs panel-4" id="wishlist" style="display:none;">
                        <table class="shopping-cart">
                            <thead>
                                <tr class="main-heading">
                                    <th class="text-center" style="padding-left: 1.5rem;padding-right: 1.5rem"><i class="ti-trash remove-icon"></i></th>
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">UNIT PRICE</th>
                                    <th class="text-center">STOCK STATUS</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>';
                                
    
                                    $stmt = $db->prepare("SELECT * , wishlist.id AS wishid FROM  wishlist LEFT JOIN products ON products.id=wishlist.product_id  WHERE user_id=:user_id");
                                        $stmt->execute(['user_id'=>$customer_id]);
                                        foreach($stmt as $row) {
                                    

                                echo '<tr >


                                    <td class="action" data-title="Remove"><a href="#" id="remove-product" rel="'.$row['product_id'].'" class="wishlist_delete"   ><i class="ti-trash remove-icon"></i></a></td>



                                    <td class="image" data-title="No"><img src="../images/items/'.$row['photo'].' "alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="../product.php?product='.$row['slug'].'">'.$row['name'].'</a></p>
                                        <p class="product-des">'.$row['description'].'</p>
                                    </td>
                                    <td class="prix" data-title="Price"><span>$'.$row['price'].'<span class="unit-price"></span></span>
                                    </td>
                                    <td class="stock-status" data-title="Status">
                                        <span>In Stock</span>
                                    </td>
                                    <td class="add-card" data-title="Add To Card">


                                    <a href="#" rel="'.$row['product_id'].'" class="add_to_c" title="Add To Cart"><i class="fa fa-shopping-cart" ></i></a>


                                    




                                    </td>';
                            }
                            echo '</tbody>
                        </table> </div>'; }
                            else 
                                echo  '<div class="paneltbs panel-4" id="wishlist" style="display:none;">
                        <div class="alert-message"><a href="../product.php">Browse products </a>No wishlist has been made yet.</div>
                    </div>'; ?>

                    <div class="paneltbs panel-6" id="logout" style="display: none;">
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Dashboard -->

    <?php include 'includes/footer.php'; ?>

    <div class="gototop">
        <a href="#" class="gotop"><i class="fa fa-arrow-up"></i></a>
    </div>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/TweenMax.min.js"></script>
  <script src="../js/jquery.nice-select.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="https://kit.fontawesome.com/5d49be4ed0.js" crossorigin="anonymous"></script>
<?php include 'includes/script.php'; ?>
</body>

</html>
<script >

    // WISHLIST

      $(document).ready(function(){
        $('.wishlist_delete').click(function(e) { 
            e.preventDefault();
           $(this).closest("tr").hide();
        
   });
});

 $(document).ready(function(){
            $('a.wishlist_delete').click(function() { 
             var id = $(this).attr('rel');
             $.ajax({
             type: 'POST',
             url: 'wishlist_delete.php',
             data: {id:id},
                dataType: 'json',
                success: function(response){
                
            }
        });       
         });
        });

 // ORDERS

 $(document).ready(function(){
        $('.order_delete').click(function(e) { 
            e.preventDefault();
           $(this).closest("tr").hide();
        
   });
});

 $(document).ready(function(){
            $('a.order_delete').click(function() { 
             var id = $(this).attr('rel');
             $.ajax({
             type: 'POST',
             url: 'order_delete.php',
             data: {id:id},
                dataType: 'json',
                success: function(response){
                
            }
        });
         });
        });

 //CART
  $(document).ready(function(){
        $('.cart_delete').click(function(e) { 
            e.preventDefault();
           $(this).closest("tr").hide();
        
   });
});

 $(document).ready(function(){
            $('a.cart_delete').click(function() { 
             var id = $(this).attr('rel');
             $.ajax({
             type: 'POST',
             url: 'cart_delete.php',
             data: {id:id},
                dataType: 'json',
                success: function(response){
                
            }
        });

               
         });
        });
</script>
