<?php
	include 'includes/session.php';
	$email=$passErr='';
	if(isset($_GET['email']))
		$email=$_GET['email'];
	
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$password=$_POST['password'];
		$confirmpassword=$_POST['confirmpassword'];
		if($password!=$confirmpassword)
			$msg="Sorry,password didnt match";
		else {
			 $salt="^%r8yuyg";//create our salt; salt is special String added to password // way of encrption on database;
             $password = sha1(filter_var($password.$salt, FILTER_SANITIZE_STRING));// sha1 function to transform the password into long String; known as hashing method;
			 $stmt=$db->prepare('UPDATE users set 
			 password=?
			 where email=?');
			 if($stmt->execute(array($password,$email))){
			 echo "<script>alert('Password updated success.');</script>";
			 
echo "<script>window.open('login.php','_self')</script>";
			 
			}
			
	}
	}
	
	


?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Reset Password | ShopMeex Online Store</title>
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
							        <li class="active"><a href="login.php">Sign In<i class="ti-arrow-right"></i></a></li>
							        <li class="active"><a href="forgotpass.php">Forget Password<i class="ti-arrow-right"></i></a></li>
									<li class="active"><a href="reset.php">Reset Password</a></li>
									
									
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
									<h2>Reset Password</h2>
								</div>
								<form action="" method="post">
									<div class="form-group">
										<label for="email">E-mail<span>*</span></label>
										<input name="email" type="text" placeholder="E-mail" value="<?php echo $email; ?>" id="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" readonly>
									</div>
									<div class="form-group">
										<label for="password">Password<span>*</span></label>
										<input name="password" type="password" placeholder="Password" id="password"  required>
									</div>
									<div class="form-group">
										<label for="password">ConfirmPassword<span>*</span></label>
										<input name="confirmpassword" type="password" placeholder="Password"id="password"  required>
									</div>
								    <p class="error-form"><?php if(isset($msg)) echo $msg; ?></p>

									
									<div class="clearfix"></div>
									<div class="form-group">
										<button name="submit" type="submit" class="btn">Reset Password</button>
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
