<?php
    include "includes/session.php";
    //$slug=$_GET['products'];
    $slug='large-dell-inspiron-15-5000-15-6';

    try{          
        $stmt = $db->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.slug = :slug");
        $stmt->execute(['slug' => $slug]);//id product;
        if ($stmt->rowCount()==0) {
            echo '404';
            exit();
        }
        $product = $stmt->fetch();
        
        $stmt=$db->prepare("SELECT * from review LEFT JOIN users on review.user_id=users.id WHERE product_id=:prodid");
        $stmt->execute(['prodid'=>$product['prodid']]);
        $nbreview= $stmt->rowCount();// return the number of ligne in table resulted;


    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }

    //page_view; most view page in the current day.
    $now = date('Y-m-d');
    if($product['date_view'] == $now){
        $stmt = $db->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
        $stmt->execute(['id'=>$product['prodid']]);
    }
    else{
        $stmt = $db->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
        $stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
    }
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $product['prodname']; ?> | ShopMeex Online Store</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="css/all.css">
    <link rel="stylesheet" type="text/css" href="css/brands.css">
    <link rel="stylesheet" type="text/css" href="css/solid.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="css/lightcase.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
                                                        if(!isset($_SESSION['loggedin'])){
                                                            
                                                            echo '<small class="text-muted"><a href="login.php">Sign in </a> |<a href="register.php">Sign Up</a></small>';
                                                            echo '<div>My Account<i class="fa fa-angle-down"></i></div>';
                                                        }
                                                        else{
                                                            echo '<div><a href="dashboarduser.php">My Account</a><i class="fa fa-angle-down"></i></div>';
                                                            echo '<small class="text-muted"><a                      href="logout.php">Logout</a></small>';
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

    <!-- Start Product Details -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="wrapper">
                <div class="col-35">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="#">Products<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="product-details.html">Product Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-details">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-8">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <div>
                                    <a href="images/items/12.jpg" data-rel="lightcase">
                                        <img src="images/items/12.jpg">
                                </div>
                            </div>
                            <div class="thumbs-wrap">
                                <a href="images/items/12.jpg" data-lc-caption="Fantasy t-shirt Model N°1" data-rel="lightcase:myCollection" class="item-thumb">
                                    <img src="images/items/12.jpg">
                                </a>
                                <a href="images/items/12-1.jpg" data-lc-caption="Fantasy t-shirt Model N°2" data-rel="lightcase:myCollection" class="item-thumb">
                                    <img src="images/items/12-1.jpg">
                                </a>
                            </div>
                        </article>
                    </div>
                    <div class="col-8">
                        <article class="content-body">
                            <h2 class="title"><?php echo $product['prodname']; ?></h2>
                            <div class="seperator-line"></div>
                            <div class="rating-wrap">
                                <ul class="rating-stars">
                                    <li style="width:80%" class="stars-active">
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <small class="label-rating text-muted"><?php echo $nbreview ?></small>
                                <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
                            </div>

                            <div class="mb-3">
                                <var class="price h4"><?php echo '$'.$product['price']; ?></var>
                            </div>
                            <div class="seperator-line"></div>

                            <p class="product-description"><?php echo $product['description']; ?></p>

                            <dl class="row">
                                <dt class="col-dd">Model#</dt>
                                <dd class="col-dt">Odsy-1000</dd>

                                <dt class="col-dd">Color</dt>
                                <dd class="col-dt">Brown</dd>

                                <dt class="col-dd">Delivery</dt>
                                <dd class="col-dt">Russia, USA, and Europe </dd>
                            </dl>

                            <div class="seperator-line"></div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-light" type="button" id="button-plus"> + </button>
                                        </div>
                                        <input id="quantity" type="text" class="form-control" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button" id="button-minus"> − </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Select size</label>
                                    <div class="mt-1">
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="select_size" checked="" class="custom-control-input">
                                            <div class="custom-control-label">Small</div>
                                        </label>

                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="select_size" class="custom-control-input">
                                            <div class="custom-control-label">Medium</div>
                                        </label>

                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="select_size" class="custom-control-input">
                                            <div class="custom-control-label">Large</div>
                                        </label>

                                    </div>
                                </div>
                            </div>

                            <a href="#" class="add-cart">
                                <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i>
                            </a>
                        </article>
                        <div class="tabs-wrapper">
                            <ul class="tabs">
                                <li class="description_tab active">
                                    <a href="#tab-description">Description</a>
                                </li>
                                <li class="additional_information_tab">
                                    <a href="#tab-additional_information">Additional information</a>
                                </li>
                                <li class="reviews_tab">
                                    <a href="#tab-reviews">Reviews (1)</a>
                                </li>
                            </ul>
                            <div class="paneltbs panel-1" id="tab-description">
                                <h2>Product Description</h2>
                                <p>Sed a lorem sed dui dictum sodales non et nisl.</p>
                            </div>

                            <div class="paneltbs panel-2" id="tab-additional_information" style="display: none;">
                                <h2>Additional information</h2>
                                <table class="product-attributes">
                                    <tbody>
                                        <tr class="product-attributes-item-weight">
                                            <th class="product-attributes-item__label">Weight</th>
                                            <td class="product-attributes-item__value">0.3 kg</td>
                                        </tr>
                                        <tr class="product-attributes-item-dimensions">
                                            <th class="product-attributes-item__label">Dimensions</th>
                                            <td class="product-attributes-item__value">50 × 60 cm</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="paneltbs panel-3" id="tab-reviews" style="display: none;">
                                <div id="reviews" class="product-reviews">
                                    <div id="comments">
                                        <h2 class="reviews-title">1 review for <span>Fantasy t-shirt</span></h2>

                                        <ol class="commentlist">
                                            <li id="li-comment-11">
                                                <div id="comment-11" class="comment_container">
                                                    <img alt="" src="https://secure.gravatar.com/avatar/8ca3fe8440883023010924dd86cb3218?s=60&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/8ca3fe8440883023010924dd86cb3218?s=120&amp;d=mm&amp;r=g 2x" class="avatar avatar-60 photo" height="60" width="60">
                                                    <div class="clearfix"></div>
                                                    <div class="comment-text">
                                                        <div class="star-rating" aria-label="Rated 4 out of 5">
                                                            <span style="width:80%">Rated <strong class="rating">4</strong> out of 5</span>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <p class="meta">
                                                            <strong class="review__author">Shufflehound </strong>
                                                            <span class="review__dash">–</span>
                                                            <time class="review__published-date" datetime="2020-05-10T14:02:51+01:00">May 10, 2020</time>
                                                        </p>

                                                        <div class="description">
                                                            <p>Nice one, love it!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <span id="reply-title" class="comment-reply-title">Add a review</span>
                                                <form action="#" method="post" id="commentform" class="comment-form" novalidate="">
                                                    <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                                    <div class="comment-form-rating">
                                                        <label for="rating">Your rating</label>
                                                        <p class="stars">
                                                            <span>
                                                            		<a class="star-1" href="#">1</a>
                                                            		<a class="star-2" href="#">2</a>
                                                            		<a class="star-3" href="#">3</a>
                                                            		<a class="star-4" href="#">4</a>
                                                            		<a class="star-5" href="#">5</a>
                                                            </span>
                                                        </p>
                                                        <select name="rating" id="rating" required="" style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review&nbsp;<span class="required">*</span></label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                                                    </p>
                                                    <p class="comment-form-author">
                                                        <label for="author">Name&nbsp;<span class="required">*</span></label>
                                                        <input id="author" name="author" type="text" value="" size="30" required="">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">Email&nbsp;<span class="required">*</span></label>
                                                        <input id="email" name="email" type="email" value="" size="30" required="">
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="related-products">
                    <h2>Related products</h2>
                    <div class="related-wrapper">
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
                </section>
            </div>
        </div>
    </div>

    <!-- End Product Details -->

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
    <script src="js/jquery.zoom.js"></script>
    <script src="js/lightcase.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {});
    </script>
    <script src="js/custom.js"></script>
</body>

</html>