<?php

    
    
    include 'includes/session.php';
    if(!isset($_SESSION['id'])){
        
        
         header("location: register.php");
         exit();
        
    }
    ob_start();
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
    <title>Cart | ShopMeex Online Store</title>
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
                                    <td class="action" data-title="Remove"><a 
                                        class="delete_cart" rel="<?php echo $row['cartid'];  ?>"
                                        href="#"

                                     id="remove-product"><i class="ti-trash remove-icon"></i></a>
                                    </td>
                                    
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


    <?php include 'includes/script.php'; ?>
    

    <script >
        

    </script>


</html>
