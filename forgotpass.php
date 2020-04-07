<?php
	include 'includes/session.php';
	$msg='';
	if(isset($_POST['submit'])){
		$email=trim($_POST['email']);
		$sql = "SELECT id, email, password FROM users WHERE email = :email";
        //why you met a condition here Mohcene
        if($stmt = $db->prepare($sql)){
			
            // Bind variables to the prepared statement as parameters
			
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            
            // Set parameters
			
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
			
            if($stmt->execute()){
                // Check if email exists,we send the reset link
                if($stmt->rowCount() >0 ){
                    if($row = $stmt->fetch()){
                        $db_id = $row["id"];
                        $db_email = $row["email"];
                        $token=uniqid(md5(time())); //This a random token
						$stmt=$db->prepare('UPDATE users set token=? where email=?');
						if($stmt->execute(array($token,$email))){
							
							$to=$db_email;
							$subject="Password reset link";
							$body="Click here 'http://localhost/shopmeex-master/reset.php?token=$token' to reset your password.";
							$headers="MIME-Version:1.0"."\r\n";
							$headers .="Contents-type:text/html;CHARSET=UTF-8"."\r\n";
							$headers .='From: <shopmeex22@gmail.com>'."\r\n";
							if(mail($to,$subject,$body,$headers))
								$msg="Password reset link has sent to your email";
							else 
								$msg='email sending failed';
							
						
						}
						}
					}
				else
					$msg = "No account found with that username.";
			}
			
		}
	}
?>


<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>Forget Password | ShopMeex Online Store</title>
			<link rel="icon" href="images/favicon.png">
			<link rel="stylesheet" href="css/owl.carousel.min.css">
			<link rel="stylesheet" href="css/owl.theme.default.min.css">
			<link rel="stylesheet" type="text/css" href="css/all.css">
			<link rel="stylesheet" type="text/css" href="css/brands.css">
			<link rel="stylesheet" type="text/css" href="css/solid.css">
			<link rel="stylesheet" type="text/css" href="css/fontawesome.css">
			<link rel="stylesheet" type="text/css" href="css/themify-icons.css">
			<link rel="stylesheet" type="text/css" href="css/nice-select.css">
			<link rel="stylesheet" type="text/css" href="css/style.css">
		</head>
		
		<body>
			<!-- Start Loader -->
			<div class="loader_container">
				<div class="loader__cart">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 320" class="cart-loader"><g id="Layer_2" data-name="Layer 2"><path class="cls-1" d="M33.57,232.47S-3.5,131.75,49.65,116.37,142,108.67,135,142.94,97.91,253.45,33.57,232.47Z"></path><line class="cls-2" x1="16.09" y1="145.32" x2="65.94" y2="145.32" data-svg-origin="16.09000015258789 145.32000732421875" transform="matrix(1,0,0,1,0,0)" style="opacity: 1;"></line><line class="cls-2" x1="37.75" y1="177.7" x2="77.6" y2="177.7" data-svg-origin="37.75 177.6999969482422" transform="matrix(1,0,0,1,0,0)" style="opacity: 1;"></line><line class="cls-2" x1="54.87" y1="208.79" x2="84.72" y2="208.79" data-svg-origin="54.869998931884766 208.7899932861328" transform="matrix(1,0,0,1,0,0)" style="opacity: 1;"></line><polyline class="cls-3" points="40 65.9 77.65 65.9 122.32 206.88 221.77 206.88 270.56 107.9 121.71 107.9"></polyline><circle class="cls-3" cx="139.46" cy="251.69" r="18.54"></circle><circle class="cls-3" cx="207" cy="251.69" r="18.54"></circle></g></svg>
					<div class="loader__circles">
					<div class="cir" id="cir_one"></div>
					<div class="cir" id="cir_two"></div>
					<div class="cir" id="cir_three"></div>
					</div>
				</div>
			</div>
			<!-- End Loader -->

			<!-- Start Header -->
				<header id="main-header">
					<!-- Start Top Section -->
					<section class="top-sec">
						<div class="container">
							<nav>
								<ul class="social-media">
									<li><a href="#"><i class="fab fa-facebook"></i></a></li>
									<li><a href="#"><i class="fab fa-instagram"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								</ul>
								<ul class="nav-items">
									<li><a href="#">Help</a></li>
									<li class="dropdown-menu1">
										<a href="#">DZD<i class="fas fa-angle-down"></i></a>
										<ul class="dropdown-list">
											<li><a href="#">USD</a></li>
											<li><a href="#">EUR</a></li>
										</ul>
										<div class="clearfix"></div>
									</li>
									<li class="dropdown-menu2">
										<a href="#">English</a>
									</li>
								</ul>
							</nav>
						</div>
					</section>
					<!-- End Top Section -->

					<!-- Start Bottom Section -->
					<section class="bottom-sec">
						<div class="container">
							<div class="wrapper">
								<div class="logo-container">
									<a href="#">
										<img src="images/Logo-header.png" class="logo">
									</a>
								</div>

								<div class="search-bar">
									<form method="post">
										<div class="search-bar-container">
											<select class="custom-select" name="category_name">
												<option value="all categories" data-display="All Categories">All Categories</option>
												<option value="special">Special</option>
												<option value="best">Best</option>
												<option value="recent">Latest</option>
											</select>
											<input type="text" class="form-control" placeholder="Search Here...">
											<div class="search-icon-container">
												<button class="search-icon" type="submit">
													<i class="fa fa-search"></i>
												</button>
											</div>
										</div>
									</form>
								</div>

								<div class="user-details">
									<div class="user-details-container">
										<a href="#" class="widget-header1">
											<div class="icon">
												<div class="cart-icon-container">
													<svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 251.6" id="cart-icon">
													<g id="Grid_Layer"><g id="Artboard-3"><g id="Group-2" transform="translate(1 1)">
													<polyline id="Path-17" class="st2" points="65.7,13.6 95.6,13.6 142.6,133.9 286.2,122 306.2,42.1 108.8,42.1"></polyline><circle id="Oval-7" class="st2" cx="251.5" cy="210.4" r="21.9"></circle><circle id="Oval-7-Copy" class="st2" cx="164.1" cy="210.4" r="21.9"></circle>
													<polyline id="Path-18" class="st2" points="146,133.9 131.3,155.8 284.3,155.8"></polyline>
													</g>
													</g>
													</g>
													<g id="Layer_2"><line class="st2 st1" x1="15.7" y1="85.7" x2="76.6" y2="85.7" data-svg-origin="15.699999809265137 85.69999694824219" transform="matrix(0,0,0,1,15.699999809265137,0)" style="opacity: 0;"></line><line class="st2 st1" x1="35.4" y1="123" x2="81.5" y2="123" data-svg-origin="35.400001525878906 123" transform="matrix(0,0,0,1,35.400001525878906,0)" style="opacity: 0;"></line><line class="st2 st1" x1="57.6" y1="160.4" x2="85.2" y2="160.4" data-svg-origin="57.599998474121094 160.39999389648438" transform="matrix(0,0,0,1,57.599998474121094,0)" style="opacity: 0;"></line></g>
													</svg>
												</div>
												<span class="notify">0</span>
											</div>
										</a>
										<a href="#" class="widget-header1">
											<div class="icon">
												<i class="fa fa-heart"></i>
											</div>
										</a>

										<div class="widget-header1 dropdown">
											<div class="icon">
												<i class="fa fa-user"></i>
												<div class="user-text">
													<small class="text-muted"><a href="login.php">Sign in</a> | 
														<a href="register.php">Sign Up</a> </small>
													<div>My Account<i class="fa fa-angle-down"></i></div>
												</div>
											</div>

										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</section>
					<!-- End Bottom Section -->

					<!-- Start Categories Links -->
					<nav class="categories-list">
						<div class="container">
							<ul>
								<li><a href="#" class="active-home"><strong>Toutes Les Catégories</strong></a></li>
								<li><a href="#"><strong>Machines</strong></a></li>
								<li><a href="#"><strong>Electronique</strong></a></li>
								<li><a href="#"><strong>Electroménagie</strong></a></li>
								<li><a href="#"><strong>Services & Equipements</strong></a></li>
								<li><a href="#"><strong>Santé</strong></a></li>
								<li><a href="#"><strong>Toys & Hobbies</strong></a></li>
								<li><a href="#"><strong>Home Textiles</strong></a></li>
							</ul>
						</div>
					</nav>
				</header>

			<!-- End Header -->

			<!-- Start Account -->

			<div class="breadcrumbs">
				<div class="container">
					<div class="wrapper">
						<div class="col-35">
							<div class="bread-inner">
							    <ul class="bread-list">
							        <li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
							        <li class="active"><a href="login.php">Sign In<i class="ti-arrow-right"></i></a></li>
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
										<label for="user-reset"><span>*</span>E-mail or Username:</label>
										<input name="email" type="text" placeholder="E-mail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="user-reset">
									</div>
									<div class='alert alert-success'>
										<?php 
											if(isset($msg))
												echo $msg;
										?>
									</div>
									<div class="form-group">
										<button type="submit" name="submit" class="btn">Send</button>
									</div>									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			

			<!-- End Account -->

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
									<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
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
								<ul class="social-media"><li>
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
		</body>

</html>