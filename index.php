<?php
    include 'includes/session.php';

    try{          

        
        // getting TopViewed products
        $stmt=$db->query("SELECT * from products ORDER BY counter DESC limit 3 ");
        $TopViewedProducts= $stmt->fetchAll();
        // getting best selling  products
        $stmt=$db->query("SELECT * from products ORDER BY sold_cmp DESC limit 3 ");
        $TopSellingProducts= $stmt->fetchAll();
        // getting on sold products (random products)
        $stmt=$db->query("SELECT * from products ORDER BY RAND() DESC limit 3 ");
        $TopOnProducts= $stmt->fetchAll();



    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
        
            
    }

    $db=null;
   
?>



























































<!DOCTYPE html>
	<html>
		<head>
			<title>ShopMeex Online Store</title>
			<?php include 'includes/header.php'; ?>

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
										<h1>On Sale (random)</h1>
									</div>
								</div>
								
								<?php 
                                foreach($TopOnProducts as $row)
                                echo "<div class='single-list'>
                                    <div class='row'>
                                        <div class='product-pic'>
                                            <div class='img-list'>
                                                <img src='images/items/".$row['photo']."' >
                                                <a href='product.php?product=".$row['slug']."' class='buy'><i class='fa fa-shopping-bag'></i></a>
                                            </div>
                                        </div>
                                        <div class='product-cont'>
                                            <div class='content'>
                                                <h3 class='title'>".$row['name']."</h3>
                                                <div>
                                                    <p class='discounting-price' title='Discounting Price'>$".number_format($row['price'], 2)."</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>" ;
                                ?>
								

							</div>





							<div class="col-20">
								<div class="row-title">
									<div class="shop-section-title">
										<h1>Best Selling</h1>
									</div>
								</div>
								<?php 
                                foreach($TopSellingProducts as $row)
                                echo "<div class='single-list'>
                                    <div class='row'>
                                        <div class='product-pic'>
                                            <div class='img-list'>
                                                <img src='images/items/".$row['photo']."' >
                                                <a href='product.php?product=".$row['slug']."' class='buy'><i class='fa fa-shopping-bag'></i></a>
                                            </div>
                                        </div>
                                        <div class='product-cont'>
                                            <div class='content'>
                                                <h3 class='title'>".$row['name']."</h3>
                                                <div>
                                                    <p class='discounting-price' title='Discounting Price'>$".number_format($row['price'], 2)."</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>" ;
                                ?>
								
								
							</div>












							<div class="col-20">
								<div class="row-title">
									<div class="shop-section-title">
										<h1>Top Viewed</h1>
									</div>
								</div>
								
							<?php 
                                foreach($TopViewedProducts as $row)
								echo "<div class='single-list'>
									<div class='row'>
										<div class='product-pic'>
											<div class='img-list'>
												<img src='images/items/".$row['photo']."' >
												<a href='product.php?product=".$row['slug']."' class='buy'><i class='fa fa-shopping-bag'></i></a>
											</div>
										</div>
										<div class='product-cont'>
											<div class='content'>
												<h3 class='title'>".$row['name']."</h3>
												<div>
													<p class='discounting-price' title='Discounting Price'>$".number_format($row['price'], 2)."</p>
												</div>
											</div>
										</div>
									</div>
								</div>" ;
                                ?>


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

		<?php  include 'includes/footer.php'; 
                 ?>

			<script src="js/jquery-3.4.1.min.js"></script>
			<script src="js/owl.carousel.min.js"></script>
			<script src="js/TweenMax.min.js"></script>
			<script src="js/jquery.nice-select.js"></script>
			<script src="js/jquery.countdown.min.js"></script>
			<script src="js/custom.js"></script>
			<script src="https://kit.fontawesome.com/5d49be4ed0.js" crossorigin="anonymous"></script>
		</body>
         <?php include 'includes/script.php'; ?>

</html>
