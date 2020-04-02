<?php
	session_start();
	include 'connect.php';
?>
<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<title>ShopMeex Online Store</title>
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

			<!-- Start Promotional Pop-Up -->

			<div class="popup-overlay"></div>
			<div class="promo-popup">
				<i class="fa fa-times"></i>
				<div class="popup-img">
					<img src="images/items/item5.png" width="280" height="360" alt="Promo Image">
				</div>
				<div class="popup-content">
					<h3>Sign up for the Latest news, Trends &amp; Exclusive Offers!</h3>
					<div class="popup-mc">
						<div class="box-form">
							<form action="/" class="popup-subscribe">
								<div class="popup-mailchimp">
									<div class="form-group">
										<input type="email" name="email" class="form-control stm_subscribe_email" placeholder="Enter your E-mail to subscribe..." required="">
										<button class="btn btn-outline-primary">
											<span></span>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<!-- Start Promotional Pop-Up -->

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

        <div class="sticky-container">
            <!-- Start Bottom Section -->
            <section class="bottom-sec">
                <div class="container">
                    <div class="wrapper">
                        <div class="logo-container">
                            <a href="index.php">
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
                                <span class="card-container">
                                    <a href="cart.html" class="widget-header1" id="icone-carte">
                                    <div class="icon">
                                        <div class="cart-icon-container">
                                            <svg version="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 251.6" id="cart-icon">
                                                <g id="Grid_Layer">
                                                    <g id="Artboard-3">
                                                        <g id="Group-2" transform="translate(1 1)">
                                                            <polyline id="Path-17" class="st2" points="65.7,13.6 95.6,13.6 142.6,133.9 286.2,122 306.2,42.1 108.8,42.1"></polyline>
                                                            <circle id="Oval-7" class="st2" cx="251.5" cy="210.4" r="21.9"></circle>
                                                            <circle id="Oval-7-Copy" class="st2" cx="164.1" cy="210.4" r="21.9"></circle>
                                                            <polyline id="Path-18" class="st2" points="146,133.9 131.3,155.8 284.3,155.8"></polyline>
                                                        </g>
                                                    </g>
                                                </g>
                                                <g id="Layer_2">
                                                    <line class="st2 st1" x1="15.7" y1="85.7" x2="76.6" y2="85.7" data-svg-origin="15.699999809265137 85.69999694824219" transform="matrix(0,0,0,1,15.699999809265137,0)" style="opacity: 0;"></line>
                                                    <line class="st2 st1" x1="35.4" y1="123" x2="81.5" y2="123" data-svg-origin="35.400001525878906 123" transform="matrix(0,0,0,1,35.400001525878906,0)" style="opacity: 0;"></line>
                                                    <line class="st2 st1" x1="57.6" y1="160.4" x2="85.2" y2="160.4" data-svg-origin="57.599998474121094 160.39999389648438" transform="matrix(0,0,0,1,57.599998474121094,0)" style="opacity: 0;"></line>
                                                </g>
                                            </svg>
                                        </div>
                                        <span class="notify">0</span>
                                    </div>
                                </a>
                                <div class="sub-menu">
                                        <div class="shopping-cart-content">
                                            <div class="no-item">
                                                <p class="empty-msg">No products in the cart.</p>
                                            </div>
                                            <div class="mini-menu">
                                                <div class="shopping-cart-widget">
                                                    <ul class="products-list">
                                                        <li class="product-item">
                                                            <a href="#" class="remove-item-button">×</a>
                                                            <a href="#" class="item-details">
                                                                <img width="300" height="300" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg 800w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-150x150.jpg 150w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-300x300.jpg 300w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-768x768.jpg 768w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-660x660.jpg 660w" sizes="(max-width: 300px) 100vw, 300px">Basic t-shirt
                                                            </a>
                                                            <div class="clearfix"></div>    
                                                            <span class="quantitys">1 × <span>$<span class="total-amount">7.99</span></span></span>    
                                                        </li>
                                                        <li class="product-item">
                                                            <a href="#" class="remove-item-button">×</a>
                                                            <a href="#" class="item-details">
                                                                <img width="300" height="300" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg 800w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-150x150.jpg 150w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-300x300.jpg 300w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-768x768.jpg 768w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-660x660.jpg 660w" sizes="(max-width: 300px) 100vw, 300px">Basic t-shirt
                                                            </a>
                                                            <div class="clearfix"></div>    
                                                            <span class="quantitys">1 × <span>$<span class="total-amount">7.99</span></span></span>    
                                                        </li>
                                                        <li class="product-item">
                                                            <a href="#" class="remove-item-button">×</a>
                                                            <a href="#" class="item-details">
                                                                <img width="300" height="300" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg 800w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-150x150.jpg 150w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-300x300.jpg 300w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-768x768.jpg 768w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-660x660.jpg 660w" sizes="(max-width: 300px) 100vw, 300px">Basic t-shirt
                                                            </a>
                                                            <div class="clearfix"></div>    
                                                            <span class="quantitys">1 × <span>$<span class="total-amount">7.99</span></span></span>    
                                                        </li>
                                                    </ul>
                                                    <p class="total">
                                                        <strong>Subtotal:</strong>
                                                        <span>$<span class="amount">16.98</span></span>
                                                    </p>
                                                    <p class="sub-buttons">
                                                        <a href="cart.html" class="forward-cart">View cart</a>
                                                        <a href="checkout.html" class="forward-checkout">Checkout</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                </span>
                                <a href="#" class="widget-header1">
                                    <div class="icon">
                                        <i class="fa fa-heart"></i>
                                    </div>
                                </a>

                                <div class="widget-header1 dropdown">
                                    <div class="icon">
                                        <i class="fa fa-user"></i>
                                        <div class="user-text">
                                           <?php
														if(!isset($_SESSION['email'])){
															
															echo '<small class="text-muted"><a href="login.php">Sign in</a> |'; 
															echo'<small class="text-muted"><a href="register.php">Sign Up</a>';
															echo '<div>My Account<i class="fa fa-angle-down"></i></div>';
														}
														else{
															echo '<div><a href="dashboarduser.php">My Account</a><i class="fa fa-angle-down"></i></div>';
															echo '<small class="text-muted"><a 						href="logout.php">Logout</a>';
														}
													?>
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
        </div>
    </header>

    <!-- End Header -->

			<!-- Start Main -->

			<main>
				<section class="section-main">
					<div class="container">
						<div class="wrapper">
							<aside class="side-cat">
								<nav class="card">
									<ul class="menu-category">
										<li><a href="#">Best clothes</a></li>
										<li><a href="#">Automobiles</a></li>
										<li><a href="#">Home interior</a></li>
										<li><a href="#">Electronics</a></li>
										<li><a href="#">Technologies</a></li>
										<li><a href="#">Digital goods</a></li>
										<li class="has-submenu"><a href="#">More items</a></li>
									</ul>
								</nav>
							</aside>

							<div class="owl-carousel banner-slides owl-theme">
								<div>
									<img src="images/banners/2.jpg">
									<span class="new">New</span>
								</div>
								<div>
									<img src="images/banners/2.jpg">
									<span class="hot">Hot</span>
								</div>
								<div>
									<img src="images/banners/2.jpg">
									<span class="new">New</span>
								</div>
								<div>
									<img src="images/banners/2.jpg">
									<span class="hot">Hot</span>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="section-features">
					<div class="container">
						<article class="card-features">
							<div class="wrapper">
								<div class="col-1">
									<div class="article-show">
										<span><i class="fa fa-user"></i></span>
										<h3>Customer Support</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									</div>
								</div>
					
								<div class="col-1">
									<div class="article-show">
										<span><i class="fa fa-star white"></i></span>
										<h3>Five Star Quality</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									</div>
								</div>

								<div class="col-1">
									<div class="article-show">
										<span><i class="fa fa-truck white"></i></span>
										<h3>Express Delivery</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									</div>
								</div>

								<div class="col-1">
									<div class="article-show">
										<span><i class="fa fa-dollar-sign"></i></span>
										<h3>Reasonable Prices</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									</div>
								</div>
							</div>
						</article>
					</div>
				</section>

				<section class="trending-area">
					<div class="container">
						<div class="wrapper">
							<div class="row">
								<div class="col-12">
									<div class="section-title">
										<h2>Trending Products</h2>
										<p style="font-size: 14px;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="products-info">
										<div class="main-nav">
											<ul class="nav-tabs" id="myTab" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#man" role="tab" aria-selected="true">Man</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#women" role="tab" aria-selected="false">Woman</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#kids" role="tab" aria-selected="false">Kids</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#accessories" role="tab" aria-selected="false">Accessories</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#essential" role="tab" aria-selected="false">Essential</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#prices" role="tab" aria-selected="false">Prices</a>
												</li>
											</ul>
										</div>
										<div class="tab-content">
											<div class="tab-panel active fade show" id="man">
												<div class="container">
													<div class="wrapper">
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														</div>
													</div>
												</div>
												<div class="tab-panel" id="women">
												<div class="container">
													<div class="wrapper">
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														</div>
													</div>
												</div>
												<div class="tab-panel" id="kids">
												<div class="container">
													<div class="wrapper">
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														</div>
													</div>
												</div>
												<div class="tab-panel" id="accessories">
												<div class="container">
													<div class="wrapper">
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														</div>
													</div>
												</div>
												<div class="tab-panel" id="essential">
												<div class="container">
													<div class="wrapper">
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														</div>
													</div>
												</div>
												<div class="tab-panel" id="prices">
												<div class="container">
													<div class="wrapper">
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-col">
															<div class="single-product">
																<div class="product-img">
																	<a href="#">
																		<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
																	</a>
																	<div class="button-head">
																		<div class="product-action">
																			<a href="#">
																				<i class="ti-eye"></i>
																				<span>Quick View</span>
																			</a>
																			<a href="#">
																				<i class="ti-heart "></i>
																				<span>Add To Wishlist</span>
																			</a>
																			<a href="#">
																				<i class="ti-bar-chart-alt"></i>
																				<span>Add To Compare</span>
																			</a>
																		</div>
																		<div class="product-action-2">
																			<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																		</div>
																	</div>
																</div>
																<div class="product-content">
																	<h3>
																		<a href="#">Man Hot Collection</a>
																	</h3>
																	<div class="product-price-rating">
																		<span title="Price">$29.00</span>
																		<ul title="Rating">
																			<li class="stars-active">
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																			<li>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																				<i class="fa fa-star"></i>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="top-sales">
					<div class="container">
						<div class="wrapper">
							<div class="col-20">
								<div class="row-title">
									<div class="shop-section-title">
										<h1>On Sale</h1>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-20">
								<div class="row-title">
									<div class="shop-section-title">
										<h1>Best Seller</h1>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-20">
								<div class="row-title">
									<div class="shop-section-title">
										<h1>Top Viewed</h1>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="single-list">
									<div class="row">
										<div class="product-pic">
											<div class="img-list">
												<img src="images/items/item-2.jpg">
												<a href="#" class="buy"><i class="fa fa-shopping-bag"></i></a>
											</div>
										</div>
										<div class="product-cont">
											<div class="content">
												<h3 class="title">Camera Canon EOS M50 Kit Matrix</h3>
												<div>
													<p class="discounting-price" title="Discounting Price">$29</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="new-products">
					<div class="container">
						<div class="wrapper">
							<div class="row">
								<div class="col-12">
									<div class="section-title">
										<h2>New Products</h2>
										<p style="font-size: 14px;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
									</div>
								</div>
							</div>
							<div class="owl-carousel nouv-prod owl-theme">
								<div class="tab-content">
									<div class="tab-panel active fade show newpro">
										<div class="container">
											<div class="wrapper">
												<div class="tab-col">
													<div class="single-product">
														<div class="product-img">
															<a href="#">
																<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a href="#">
																		<i class="ti-eye"></i>
																		<span>Quick View</span>
																	</a>
																	<a href="#">
																		<i class="ti-heart "></i>
																		<span>Add To Wishlist</span>
																	</a>
																	<a href="#">
																		<i class="ti-bar-chart-alt"></i>
																		<span>Add To Compare</span>
																	</a>
																</div>
																<div class="product-action-2">
																	<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3>
																<a href="#">Man Hot Collection</a>
															</h3>
															<div class="product-price-rating">
																<span title="Price">$29.00</span>
																<ul title="Rating">
																	<li class="stars-active">
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																	</li>
																	<li>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-col">
													<div class="single-product">
														<div class="product-img">
															<a href="#">
																<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a href="#">
																		<i class="ti-eye"></i>
																		<span>Quick View</span>
																	</a>
																	<a href="#">
																		<i class="ti-heart "></i>
																		<span>Add To Wishlist</span>
																	</a>
																	<a href="#">
																		<i class="ti-bar-chart-alt"></i>
																		<span>Add To Compare</span>
																	</a>
																</div>
																<div class="product-action-2">
																	<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3>
																<a href="#">Man Hot Collection</a>
															</h3>
															<div class="product-price-rating">
																<span title="Price">$29.00</span>
																<ul title="Rating">
																	<li class="stars-active">
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																	</li>
																	<li>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-col">
													<div class="single-product">
														<div class="product-img">
															<a href="#">
																<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a href="#">
																		<i class="ti-eye"></i>
																		<span>Quick View</span>
																	</a>
																	<a href="#">
																		<i class="ti-heart "></i>
																		<span>Add To Wishlist</span>
																	</a>
																	<a href="#">
																		<i class="ti-bar-chart-alt"></i>
																		<span>Add To Compare</span>
																	</a>
																</div>
																<div class="product-action-2">
																	<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3>
																<a href="#">Man Hot Collection</a>
															</h3>
															<div class="product-price-rating">
																<span title="Price">$29.00</span>
																<ul title="Rating">
																	<li class="stars-active">
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																	</li>
																	<li>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-col">
													<div class="single-product">
														<div class="product-img">
															<a href="#">
																<img src="images/items/item1.jpg">
																		<img class="hover-default" src="images/items/item1.jpg">
															</a>
															<div class="button-head">
																<div class="product-action">
																	<a href="#">
																		<i class="ti-eye"></i>
																		<span>Quick View</span>
																	</a>
																	<a href="#">
																		<i class="ti-heart "></i>
																		<span>Add To Wishlist</span>
																	</a>
																	<a href="#">
																		<i class="ti-bar-chart-alt"></i>
																		<span>Add To Compare</span>
																	</a>
																</div>
																<div class="product-action-2">
																	<a href="#" title="Add To Cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
																</div>
															</div>
														</div>
														<div class="product-content">
															<h3>
																<a href="#">Man Hot Collection</a>
															</h3>
															<div class="product-price-rating">
																<span title="Price">$29.00</span>
																<ul title="Rating">
																	<li class="stars-active">
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																	</li>
																	<li>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												
												
												
												
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
					</div>
				</section>

				<section class="day-deal">
					<div class="container">
						<div class="wrapper">
							<div class="col-30">
								<div class="img-deal">
									<img src="images/items/item4.png">
								</div>
							</div>
							<div class="col-30 col-31">
								<div class="row">
									<div class="content">
										<p class="small-title">Deal of day</p>
										<h3 class="title">Beatutyful dress for women</h3>
										<p class="text">Suspendisse massa leo, vestibulum cursus nulla sit amet, frungilla placerat lorem. Cars fermentum, sapien.</p>
										<h1 class="price">$1200 <s>$1890</s></h1>
										<div class="coming-time">
											<div class="countsdown clearfix" data-countdown="2021/03/07"><div class="cdown"><span class="days"><strong>359</strong><p>Days.</p></span></div><div class="cdown"><span class="hour"><strong> 7</strong><p>Hours.</p></span></div> <div class="cdown"><span class="minutes"><strong>31</strong> <p>MINUTES.</p></span></div><div class="cdown"><span class="second"><strong> 49</strong><p>SECONDS.</p></span></div></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="section-blog">
					<div class="container">
						<div class="wrapper">
							<div class="row">
								<div class="col-12">
									<div class="section-title">
										<h2>From Our Blog</h2>
										<p style="font-size: 14px;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
									</div>
								</div>
							</div>
							<div class="posts-row">
								<div class="col-25">
									<div class="single-shop-blog">
										<img src="images/items/post.jpg" title="Blog-Post Image" alt="Blog-Post Image">
										<div class="content-post">
											<p class="date">15 July , 2021. Monday</p>
											<a href="#" class="title">Sed adipiscing ornare.</a>
											<p class="post-description">Find all the information you need to ensure your experience.</p>
											<a href="#" class="more-btn">Continue Reading</a>
											<div>
												<i class="ti-heart">72</i>
												<i class="ti-comment-alt">29</i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-25">
									<div class="single-shop-blog">
										<img src="images/items/post.jpg" title="Blog-Post Image" alt="Blog-Post Image">
										<div class="content-post">
											<p class="date">15 July , 2021. Monday</p>
											<a href="#" class="title">Sed adipiscing ornare.</a>
											<p class="post-description">Find all the information you need to ensure your experience.</p>
											<a href="#" class="more-btn">Continue Reading</a>
											<div>
												<i class="ti-heart">72</i>
												<i class="ti-comment-alt">29</i>
											</div>
										</div>
									</div>
								</div>
								<div class="col-25">
									<div class="single-shop-blog">
										<img src="images/items/post.jpg" title="Blog-Post Image" alt="Blog-Post Image">
										<div class="content-post">
											<p class="date">15 July , 2021. Monday</p>
											<a href="#" class="title">Sed adipiscing ornare.</a>
											<p class="post-description">Find all the information you need to ensure your experience.</p>
											<a href="#" class="more-btn">Continue Reading</a>
											<div>
												<i class="ti-heart">72</i>
												<i class="ti-comment-alt">29</i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</main>

			<!-- End Main -->

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
