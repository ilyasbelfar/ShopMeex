<?php

	include 'includes/session.php';

	$pageTitle = 'My Profile';

	$breadcrumbSlug = 'profile.php?id='.$_SESSION['id'];

	$breadcrumbName = 'My Profile';

	$prodEditErrors = '';

	include 'pre-seller-panel.php';

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		$fname = str_replace(' ', '',$_POST['fname']);
		$lname = str_replace(' ', '',$_POST['lname']);
		$email = $_POST['email'];
		$phone = $_POST['contact_info'];
		$country = $_POST['country_name'];
		$state = $_POST['state-province'];
		$adr_1 = $_POST['address-1'];
		$adr_2 = $_POST['address-2'];
		$town = $_POST['town'];
		$postal_code = $_POST['zip-code'];

		// Validate Email
			$stmtt=$db->prepare('SELECT id, email, password from users where email=?');
			$stmtt->bindValue(1, $email);
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
		            	$password = $row['password'];
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
			            $sql = $db->prepare('UPDATE users SET firstname=?, lastname=?, email=?, address=?, contact_info=?, country=?, state=?, address2=?, city=?, postal=? WHERE id=?');
			            $sql->bindValue(1, $fname);
			            $sql->bindValue(2, $lname);
			            $sql->bindValue(3, $email);
			            $sql->bindValue(4, $adr_1);
			            $sql->bindValue(5, $phone);
			            $sql->bindValue(6, $country);
			            $sql->bindValue(7, $state);
			            $sql->bindValue(8, $adr_2);
			            $sql->bindValue(9, $town);
			            $sql->bindValue(10, $postal_code);
			            $sql->bindValue(11, $_SESSION['id']);
			            $sql->execute();
			            $prodEditErrors .= "<div class='message' role='alert'><strong>Your Profile Infos</strong>&nbsp;has been updated!</div>";
			        }
			        catch(PDOException $e)
			        {
			            echo "Error: " . $e->getMessage();
			        }
		    }

		    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
	    		$target_dir = "images/users/";
				$target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Check if image file is a actual image or fake image
				$check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
		    	if($check !== false) {
				    $uploadOk = 1;
				  } else {
				    $prodEditErrors.="<div class='message' role='alert'><strong>Sorry,</strong>&nbsp;".basename($_FILES["profile_pic"]["name"])." is not an image!</div>";
				    $uploadOk = 0;
				  }

				  // Check if file already exists
				  if (file_exists($target_file)) {
					  $prodEditErrors.="<div class='errors' role='alert'><strong>Sorry,</strong>&nbsp;".basename($_FILES["profile_pic"]["name"])." already exists in our database!</div>";
					  $uploadOk = 0;
					}

					// Check file size
					if ($_FILES["profile_pic"]["size"] > 2097152) {
					  $prodEditErrors.="<div class='message' role='alert'><strong>Sorry,</strong>&nbsp;try to upload image file less than 2MB!</div>";
					  $uploadOk = 0;
					}

					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "bmp") {
					  	$prodEditErrors.="<div class='message' role='alert'><strong>Sorry,</strong>&nbsp;only JPG, JPEG, PNG, BMP & GIF files are allowed!</div>";
					  	$uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					  $prodEditErrors.="<div class='errors' role='alert'><strong>Your Profile Picture</strong>&nbsp; was not updated!</div>";
					// if everything is ok, try to upload file
					} else {
					  if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
					  	try
					        {
					            $sql = $db->prepare('UPDATE users SET picture=? WHERE id=?');
					            $sql->bindValue(1, basename($_FILES["profile_pic"]["name"]));
					            $sql->bindValue(2, $_SESSION['id']);
					            if ($sql->execute()) {
					            	$prodEditErrors.="<div class='message' role='alert'><strong>Your Profile Picture</strong>&nbsp;has been updated!</div>";
					            }
					        }
					        catch(PDOException $e)
					        {
					            echo "Error: " . $e->getMessage();
					        }
					  } else {
					    $prodEditErrors.="<div class='errors' role='alert'><strong>Sorry,</strong>&nbsp;there was an error uploading ".basename($_FILES["profile_pic"]["name"])."</div>";
					  }
				  	}
		    }






		    if (!empty($_POST['password_current'])) {

	            $pass=$_POST['password_current'];
	            $salt="^%r8yuyg";//create our salt; salt is special String added to password // way of encrption on database;
	            $pass = sha1(filter_var($pass.$salt, FILTER_SANITIZE_STRING));// sha1 function to transform the password into long String; known as hashing method;
	            if($pass==$password) {
	                
	                if(empty($_POST['password_1']) OR empty($_POST['password_2'])){
	                    $prodEditErrors.="<div class='errors' role='alert'>Please fill all the fields!</div>";
	                }
	                
	                else if($_POST['password_1']==$_POST['password_2']) {
	                     $pass=$_POST['password_1'];
	                     $salt="^%r8yuyg";
	                     $pass = sha1(filter_var($pass.$salt, FILTER_SANITIZE_STRING));
	                     $stmt=$db->prepare('UPDATE users set password=? where email=?');
	                     if ($stmt->execute(array($pass,$email)))
	                       $prodEditErrors.="<div class='message' role='alert'><strong>Profile Password</strong>&nbsp;Updated Successfully!</div>";
	                        
	                     

	                } 
	                 else{
	                    $prodEditErrors.="<div class='errors' role='alert'><strong>The Two Passwords</strong>&nbsp;did not match!</div>";
	            }

	            }
	            else {
	                $prodEditErrors.="<div class='errors' role='alert'><strong>Current password</strong>&nbsp;is incorrect!</div>";
	        }

	        }

	}

?>
<div class="notices seller-notices">
    <?php echo $prodEditErrors; ?>
</div>
<div class="seller-profile">
    <h4>Edit Your Profile</h4>
    <div class="row">
        <div class="col-table-03">
            <div class="col-table-03-card">
                <h5>Profile Information</h5>
                <p>Edit all information below</p>
                <?php
					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
				        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
				        $stmt->execute(array($_SESSION["email"]));
				        $result = $stmt->fetch(PDO::FETCH_ASSOC);
			        }

				?>
                <form class="form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-401">
                            <div class="form-group">
                                <label for="fname">First Name<span>*</span></label>
                                <input id="fname" name="fname" type="text" placeholder="" value="<?php echo $result['firstname'] ?>" required="">
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="lname">Last Name<span>*</span></label>
                                <input name="lname" type="text" placeholder="" id="lname" value="<?php echo $result['lastname'] ?>" required="">
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="mail">Email Address<span>*</span></label>
                                <input id="mail" name="email" type="email" placeholder="" value="<?php echo $result['email'] ?>" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                <p class="error-form"></p>
                            </div>

                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="phone">Phone Number<span>*</span></label>
                                <input id="phone" name="contact_info" type="tel" placeholder="" value="<?php echo $result['contact_info'] ?>" required="" pattern="[0-9]*">
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
                                    <option value="Qatar" selected="selected">Qatar</option>
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
                                    <option value="Dawha" selected="selected">Dawha</option>
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
                                <input id="adr-1" name="address-1" type="text" placeholder="" value="<?php echo $result['address'] ?>" required="">
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="adr-2">Address Line 2</label>
                                <input id="adr-2" name="address-2" type="text" placeholder="" value="<?php echo $result['address2'] ?>">
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="town">Town / City</label>
                                <input id="town" name="town" type="text" placeholder="" value="<?php echo $result['city'] ?>">
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="zip-code">Postal Code</label>
                                <input id="zip-code" name="zip-code" type="text" placeholder="" value="<?php echo $result['postal'] ?>">
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
                            </div>
                        </div>
                        <div class="col-401 uploads">
							<div class="form-group">
								<label id="profile_pic_label" for="profile_pic">User Profile Picture</label>
								<input type="file" name="profile_pic" id="profile_pic">
								<div class="upload_zone">
									<div class="upload_msg">
										<div>
											<i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
										</div>
										<h4>Click here to upload.</h4>
									</div>
								</div>
								<div class="upload_zone_previews">
								</div>
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
        </div>
    </div>
</div>
<?php
	
	include 'post-seller-panel.php';

?>