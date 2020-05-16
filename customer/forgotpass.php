<?php
    include 'includes/session.php';
    $msg='';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=trim($_POST['user-reset']);
        $sql = "SELECT id, email, password FROM users WHERE email = :email";
        //why you met a condition here Mohcene
        $stmt = $db->prepare($sql);
            
            // Bind variables to the prepared statement as parameters
            
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
            
            $param_email = trim($_POST["user-reset"]);
            
            // Attempt to execute the prepared statement
            
            $stmt->execute();
                // Check if email exists,we send the reset link
                if($stmt->rowCount() >0){ 
                    $row = $stmt->fetch();
                    $db_id = $row["id"];
                    $to = $row["email"];
                    $headers = "From : shopmeex1@gmail.com "  ;
                    $subject="Password reset link";
                    $headers .="MIME-Version:1.0"."\r\n";
                    $headers .="Contents-type:text/html;CHARSET=UTF-8"."\r\n";
                    $headers .= ' From:ShopMeex Contact Form <shopmeex1@gmail.com>';
                    $body="Click here 'http://localhost/shopmeex/customer/reset.php?email=$email' to reset your password.";

    
                    if (mail($to, $subject, $body, $headers)) 
                         echo "<script>alert('Password reset link has sent to your email.');</script>"; 
                    else 
                          echo "<script>alert('email sending fail.');</script>"; 
                             
                            
                        
                       
                 }       
                    
                else
                    $msg = "No account found with that username.";
            
            
        
    }
?>

<!DOCTYPE html>
	<html>
		<head>
			<title>Forget Password | ShopMeex Online Store</title>
			<?php include 'includes/header.php'; ?>

			<!-- Start Account -->

			<div class="breadcrumbs">
				<div class="container">
					<div class="wrapper">
						<div class="col-35">
							<div class="bread-inner">
							    <ul class="bread-list">
							        <li><a href="../index.php">Home<i class="ti-arrow-right"></i></a></li>
							        <li class="active"><a href="login.php">My Account<i class="ti-arrow-right"></i></a></li>
							        <li class="active"><a href="forgotpass.php">Forget Password</a></li>
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
							<div class="col-52">
								<div class="title-box">
									<h2>Reset Password</h2>
								</div>
								<form action="forgotpass.php" method="post">
									<p>Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>
									<div class="form-group">
										<label for="user-reset">E-mail:</label>
										<input type="text" name="user-reset" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required id="user-reset">
									</div>
                                     <p class="error-form"><?php if(isset($msg)) echo $msg; ?></p>
									<div class="form-group">
										<button type="submit" class="btn">Send</button>
									</div>									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			

			<!-- End Account -->

			<?php include 'includes/footer.php'; ?>
			<!-- End Footer -->

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
