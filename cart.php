<?php

    ob_start();
    
    include 'includes/session.php';

    
    $subtotal = $subTotals = $discount = $discountPrice = 0;
    $messageSub = '';
    $messageCoupon = '';
    
    
    $stmt = $db->prepare("SELECT *, cart.quantity AS cq , cart.id As cartid FROM cart LEFT JOIN products ON products.id=cart.product_id	 WHERE user_id=:user_id");
    $stmt->execute(['user_id'=>$user['id']]);
    foreach($stmt as $row) {
        $subtotal += $row['price']*$row['cq'];
    }
    
    if (isset($_POST['Coupon']) && (!empty($_POST['Coupon']))) {
        $stmt = $db->query("SELECT coupon_value FROM coupons WHERE coupon_code='" . $_POST["Coupon"] . "'");
        $results = $stmt->fetch();
        if ($results) {
			$discountPrice = (int)$results["coupon_value"];
			if(!empty($discountPrice)) {
			    if($_SESSION['cart']['total'] > $discountPrice) {
			        $messageCoupon = '<div class="message" role="alert">Coupon Applied.</div>';
			        $discount = $discountPrice;
			    }
			    else if($_SESSION['cart']['total'] <= $discountPrice) {
		            $messageCoupon = '<div class="errors" role="alert">Invalid Discount Coupon.</div>';
		            $discount = 0;
		        }
		    }
        }
        else {
		    $messageCoupon = '<div class="errors" role="alert">Invalid Discount Coupon.</div>';
		    $discount = 0;
		}
    }
    
    if (isset($_POST['update_cart'])) {
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'qty_') !== false) {
                $id = str_replace('qty_', '', $k);
                $id = (int)$id;
                $quantity = (int)$v;
                 // Always do checks and validation
                 if ($quantity > 0) {
                    $stmt = $db->prepare("UPDATE cart SET quantity=? WHERE id=?");
                    $stmt->bindValue(1,$quantity, PDO::PARAM_INT);
                    $stmt->bindValue(2,$id, PDO::PARAM_INT);
			        if($stmt->execute()) {
                        $messageSub ='<div class="message" role="alert">Products quanities has been has been updated.</div>';
			        } else {
			            $messageSub = '<div class="errors" role="alert">Oops! Something Went Wrong, Please Try Again.</div>';
			        }
                 }
             }
         }
    }
    

    // Delete Item From Shopping Cart Not Working
    if(isset($_GET['remove_item'])) {
        $ident = $_GET['remove_item'];
        if(isset($_SESSION['id'])) {
		    try {
    			$stmt = $db->prepare("DELETE FROM cart WHERE id=:id");
    			$stmt->execute(['id'=>$ident]);
    			foreach($_SESSION['cart'] as $row) {
        			if($row['productid'] == $ident){
        				unset($_SESSION['cart'][$key]);
        				echo "Delete Product Successfully.";
        			}
        		}
    			echo "Delete Product Successfully.";
            }
            catch(PDOException $e){
			    echo "Wrong Message When Delete Product.";
		    }
        }
        else {
    	    foreach($_SESSION['cart'] as $row) {
    			if($row['productid'] == $ident){
    				unset($_SESSION['cart'][$key]);
    				echo "Delete Product Successfully.";
    			}
    		}
	    }
	    header('Location: cart.php');
    }
    ob_end_flush();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cart | ShopMeex Online Store</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="css/brands.css">
    <link rel="stylesheet" type="text/css" href="css/solid.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<body>
    <!-- Start Loader -->
    <div class="loader_container">
        <div class="loader__cart">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 320" class="cart-loader">
                <g id="Layer_2" data-name="Layer 2">
                    <path class="cls-1" d="M33.57,232.47S-3.5,131.75,49.65,116.37,142,108.67,135,142.94,97.91,253.45,33.57,232.47Z"></path>
                    <line class="cls-2" x1="16.09" y1="145.32" x2="65.94" y2="145.32" data-svg-origin="16.09000015258789 145.32000732421875" transform="matrix(1,0,0,1,0,0)" style="opacity: 1;"></line>
                    <line class="cls-2" x1="37.75" y1="177.7" x2="77.6" y2="177.7" data-svg-origin="37.75 177.6999969482422" transform="matrix(1,0,0,1,0,0)" style="opacity: 1;"></line>
                    <line class="cls-2" x1="54.87" y1="208.79" x2="84.72" y2="208.79" data-svg-origin="54.869998931884766 208.7899932861328" transform="matrix(1,0,0,1,0,0)" style="opacity: 1;"></line>
                    <polyline class="cls-3" points="40 65.9 77.65 65.9 122.32 206.88 221.77 206.88 270.56 107.9 121.71 107.9"></polyline>
                    <circle class="cls-3" cx="139.46" cy="251.69" r="18.54"></circle>
                    <circle class="cls-3" cx="207" cy="251.69" r="18.54"></circle>
                </g>
            </svg>
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

        <div class="sticky-container">
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
                            <form method="POST">
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
                                                        <span><span class="amount"></span></span>
                                                    </p>
                                                    <p class="sub-buttons">
                                                        <a href="cart.php" class="forward-cart">View cart</a>
                                                        <a href="checkout.php" class="forward-checkout">Checkout</a>
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
            <nav class="categories-list forhide">
                <div class="container">
                    <ul>
                        <li><a href="#" class="active-home"><strong>All Categories</strong></a></li>
                        <li><a href="#"><strong>Machines</strong></a></li>
                        <li><a href="#"><strong>Electronics</strong></a></li>
                        <li><a href="#"><strong>Services</strong></a></li>
                        <li><a href="#"><strong>Health</strong></a></li>
                        <li><a href="#"><strong>Home Textiles</strong></a></li>
                    </ul>
                </div>
            </nav>
            <nav class="categories-list mobile">
                <div class="container">
                    <a href="#" class="mobile-drop"><i class="fa fa-bars"></i></a>
                    <ul class="category">
                        <li><a href="#" class="active-home"><strong>All Categories</strong></a></li>
                        <li><a href="#"><strong>Machines</strong></a></li>
                        <li><a href="#"><strong>Electronics</strong></a></li>
                        <li><a href="#"><strong>Services</strong></a></li>
                        <li><a href="#"><strong>Health</strong></a></li>
                        <li><a href="#"><strong>Home Textiles</strong></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- End Header -->

    <!-- Start Cart -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="wrapper">
                <div class="col-35">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="cart.php">Cart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="shopping">
        <div class="container">
            <div class="wrapper">
                <div class="notices">
                    <?php echo $messageSub;?>
                    <?php echo $messageCoupon;?>
                </div>
                <div class="col-9">
                    <div class="nothing-found">
                        <span>Your cart is</span>
                        <div>Currently empty</div>
                    </div>
                    <p class="return-to-shop">
                        <a class="button wc-backward" href="#">Return to shop</a>
                    </p>
                </div>
                <form class="cart-form" method="POST">
                <div class="col-7">
                    
                        <table class="shopping-cart">
                            <thead>
                                <tr class="main-heading">
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">UNIT PRICE</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center" style="padding-left: 1.5rem;padding-right: 1.5rem"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($_SESSION['id'])) {
		                            try {
			                            $stmt = $db->prepare("SELECT *, cart.quantity AS cq , cart.id As cartid FROM cart LEFT JOIN products ON products.id=cart.product_id	 WHERE user_id=:user_id");
			                            $stmt->execute(['user_id'=>$user['id']]);
			                            foreach($stmt as $row) { ?>
                                <tr>
                                    <td class="image" data-title="Product Picture"><img src="images/items/<?php echo $row['photo'];?>" alt="Product's Picture"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="product.php?product=<?php echo $row['slug'];?>"><?php echo $row['name'];?></a></p>
                                        <p class="product-des"><?php echo $row['description'];?></p>
                                    </td>
                                    <td class="prix" data-title="Price"><span>$<span class="unit-price"><?php echo $row['price'];?></span></span>
                                    </td>
                                    <td class="qty" data-title="Quantity">
                                        <!-- Input Order -->
                                        <div class="input-group mb-3 mb-4">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-light" type="button" id="button-plus"> + </button>
                                            </div>
                                            <input id="quantity" name="qty_<?php echo $row['cartid'];?>" type="text" class="form-control" value="<?php echo $row['cq'];?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-light" type="button" id="button-minus"> − </button>
                                            </div>
                                        </div>
                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total"><span>$<span class="amount"><?php echo $row['price']*$row['cq'];?></span></span>
                                    </td>
                                    <td class="action" data-title="Remove"><a href="cart.php?remove_item=<?php echo $row['product_id'];?>" id="remove-product"><i class="ti-trash remove-icon"></i></a></td>
                                </tr>

                                <?php $subTotals += $row['price']*$row['cq'];
                                    $subtotal += $row['price']*$row['cq'];
                                }
		                    } catch(PDOException $e){
			                        echo "Error: " . $e->getMessage();
	                        }
                        }?>
                            </tbody>
                        </table>
                </div>
                <div class="col-7">
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-6 big">
                                <div class="left">
                                    <div class="coupon">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <button type="submit" class="btn" name="apply_coupon" value="Apply">Apply</button>
                                    </div>
                                </div>
                                <div class="left">
                                    <div class="coupon">
                                        <button type="submit" class="btn" name="update_cart" value="Update Cart" disabled>Update Cart</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span id="subtot">$<?php echo $subTotals; ?></span></li>
                                        <li>Shipping<span>Free</span></li>
                                        <li>Discount<span>$<?php echo $discount; ?></span></li>
                                        <li class="last">You Pay<span>$<?php echo ($subTotals - $discount); ?></span></li>
                                    </ul>
                                    <?php $_SESSION['cart']['total'] = $subTotals - $discount;?>
                                    <div class="button5">
                                        <a href="checkout.php" class="btn">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
</body>

</html>
