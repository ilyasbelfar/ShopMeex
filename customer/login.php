<?php

    include 'includes/session.php';
    
    
    // Check if the user is already logged in, if yes then redirect him to Accueil page

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: ../index.php");
        exit;
    }

    
    //Initialising variables

    $email=$pass=$userr='';
    $emailErr=$passErr='';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
       
        $login= trim($_POST["login"]);//trim function removes whitespaces;
        $salt="^%r8yuyg";//create our salt; salt is String added to password // way of encrption on database;
        $pass = sha1(filter_var($_POST["password"].$salt, FILTER_SANITIZE_STRING));// sha1 function to transform the password into long String; known as hashing method;
        //$pass= $_POST["password"];
        
        //Check if user exist in DataBase
        
        
        $sql = "SELECT * FROM users WHERE email = :login OR username= :login";
        
        if($stmt = $db->prepare($sql)){
            
            // Bind variables to the prepared statement as parameters
            
            $stmt->bindParam(":login", $param_login, PDO::PARAM_STR);
            
            // Set parameters
            
            $param_login = $login;
            
            // Attempt to execute the prepared statement
            
            $stmt->execute();
                
                // Check if email exists, if yes then verify password
                
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $email = $row["email"];
                        $userr=$row["username"];
                        $password = $row["password"];
                        if($pass==$password){

                            // Admin

                            if($row['type']== 1){
                            $_SESSION['admin'] = $row['id'];
                            $_SESSION["loggedin"] = true;
                              header("location: ../admin/admin.php");
                            }

                            // Buyer

                            else if ($row['type']== 3){
                                
                            // Password is correct, so start a new session
                            if(!empty($_POST["remember"])) {
                                    $hour = time()+3600 ;   //3600=1hour

                                    setcookie('email', $email, $hour);
                                    setcookie('password', $_POST["password"], $hour);
                            }
                            else {
                                setcookie("email","");
                                setcookie("password","");   
                            }
                            
                           
                            
                            // Store data in session variables
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["type"] = 3;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["username"]= $userr;
                            
                        
                            // Redirect user to welcome page
                            
                            header("location: buyer-dashboard.php?user=$userr");
                        }

                        // Seller or Both

                        else{ 

                        // Password is correct, so start a new session
                            if(!empty($_POST["remember"])) {
                                    $hour = time()+3600 ;   //3600=1hour

                                    setcookie('email', $email, $hour);
                                    setcookie('password', $_POST["password"], $hour);
                            }
                            else {
                                setcookie("email","");
                                setcookie("password","");   
                            }
                            
                           
                            
                            // Store data in session variables
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["type"] = 2;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["username"]= $userr;
                            
                        
                            // Redirect user to welcome page
                            
                            header("location: ../seller-dashboard.php?user=$userr");}

                         } else
                            // Display an error message if password is not valid
                            
                            $passErr = "The password you entered was not valid.";
                        
                    }
                } else
                    // Display an error message if username doesn't exist
                    
                    $emailErr = "No account found with that username.";
                
            } else
                echo "Oops! Something went wrong. Please try again later.";
          

            // Close statement
            unset($stmt);
        }

    // Close connection
    unset($pdo);



?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Login | ShopMeex Online Store</title>
            <?php include 'includes/header.php'; ?>
			
    <!-- End Header -->

			<!-- Start Account -->

			<div class="breadcrumbs">
				<div class="container">
					<div class="wrapper">
						<div class="col-35">
							<div class="bread-inner">
							    <ul class="bread-list">
							        <li><a href="../index.php">Home<i class="ti-arrow-right"></i></a></li>
							        <li class="active"><a href="login.php">Login</a></li>
							    </ul>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="my-account">
				<div class="container">
					<div class="wrapper">
						<div class="section-title">
							<h2>My Account</h2>
							<p style="font-size: 14px;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
						</div>
						<div class="row">
							<div class="col-50">
								<div class="title-box">
									<h2>Log In</h2>
								</div>
								<form action="login.php" method="post">
                                    <div class="form-group">
                                        <label for="email">Username / E-Mail<span>*</span></label>
                                        <input name="login" type="text" placeholder="E-mail" value="<?php echo (isset($_COOKIE['email'])) ? $_COOKIE['email']: ''?>" required >
                                    <p class="error-form"><?php echo $emailErr; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password<span>*</span></label>
                                        <input name="password" type="password" placeholder="Password"  id="password" value="<?php echo (isset($_COOKIE['password'])) ? $_COOKIE['password']: ''?>" required>
                                        <p class="error-form"><?php echo $passErr; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <a href="forgotpass.php" class="float-right">Forgot password?</a> 
                                        <label for="check" class="float-left custom-control custom-checkbox">
                                            <input id="check" type="checkbox" class="custom-control-input"  name="remember">
                                            <p class="custom-control-label"> Remember Me </p>
                                        </label>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group">
                                        <button type="submit" class="btn">Login</button>
                                    </div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			

			<!-- End Account -->

			

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
		</body>

</html>
