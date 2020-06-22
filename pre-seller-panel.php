<?php
    if(!isset($_SESSION['id'])) {
        header("location: customer/login.php");
        exit();
    }

    if (isset($_POST['update-stock'])) {
        try {
            $prod_id = $_POST['prod_id'];
            $stockValue = $_POST['stock-value'];
            $stmt = $db->prepare("UPDATE products SET quantity='".$stockValue."' WHERE id='".$prod_id."'");
            $stmt->execute();
            echo "<meta http-equiv='refresh' content='0'>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $pageTitle; ?> - Dashboard Seller</title>
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" type="text/css" href="css/themify-icons.css">
        <link rel="stylesheet" type="text/css" href="css/nice-select.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <style>
            html, body {
                height: 100%;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
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
        <!-- Start Dashboard Seller -->
        <div class="seller-dash">
            <div id="sellermenu" role="navigation">
                <div id="sellermenu-back"></div>
                <div id="sellermenu-wrap">
                    <ul class="sel-menu">
                        <li>
                            <a href="seller-dashboard.php?page=home">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="edit.php?post_type=product">
                                <i class="fas fa-box"></i>
                                <span>Products</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="edit.php?post_type=order">
                                <i class="fas fa-file-alt"></i>
                                <span>Orders</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="edit.php?post_type=review">
                                <i class="fas fa-star"></i>
                                <span>Reviews</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="edit.php?post_type=coupon">
                                <i class="fas fa-percent"></i>
                                <span>Coupons</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="analytics.php?id=<?php echo $_SESSION['id']; ?>">
                                <i class="fas fa-chart-bar"></i>
                                <span>Analytics</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="profile.php?id=<?php echo $_SESSION['id'] ?>">
                                <i class="fas fa-user-edit"></i>
                                <span>Profile</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li id="collapse_sidemenu">
                            <a href="#">
                                <i class="fas fa-arrow-circle-left"></i>
                                <span>Collapse Menu</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="sellermenu-wrap" class="mobile-menu">
                    <ul class="sel-menu">
                        <li>
                            <a href="seller-dashboard.php?page=home">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="edit.php?post_type=product">
                                <i class="fas fa-box"></i>
                                <span>Products</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="edit.php?post_type=order">
                                <i class="fas fa-file-alt"></i>
                                <span>Orders</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="edit.php?post_type=review">
                                <i class="fas fa-star"></i>
                                <span>Reviews</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="edit.php?post_type=coupon">
                                <i class="fas fa-percent"></i>
                                <span>Coupons</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="analytics.php?id=<?php echo $_SESSION['id']; ?>">
                                <i class="fas fa-chart-bar"></i>
                                <span>Analytics</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                        <li>
                            <a href="profile.php?id=<?php echo $_SESSION['id'] ?>">
                                <i class="fas fa-user-edit"></i>
                                <span>Profile</span>
                            
                            
                            
                            
                            
                            
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="dash-content">
                <div class="sell-bar">
                    <div id="top-primary">
                        <a href="#" id="mobile-drop"><i class="fa fa-bars"></i></a>
                        <a href="seller-dashboard.php?page=home" class="seller-home">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                        <a href="#" class="new-post">
                            <i class="fas fa-plus"></i>
                            New
                        </a>
                        <div class="new-posts-dropdown">
                            <a href="new-post.php?post_type=product"><i class="fas fa-box" aria-hidden="true"></i>Product</a>
                            <a href="new-post.php?post_type=coupon"><i class="fas fa-percent" aria-hidden="true"></i>Coupon</a>
                        </div>
                    </div>
                    <?php
                        $stmt_1 = $db->prepare("SELECT id, firstname, picture FROM users WHERE id=?");
                        $stmt_1->bindValue(1, $_SESSION['id']);
                        $stmt_1->execute();
                        $user_infos=$stmt_1->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="top-account">
                        <a href="#">
                            <img class="header-profile-user" src="images/users/<?php echo $user_infos['picture']; ?>" alt="Header Avatar">
                            <span><?php echo ucwords($user_infos['firstname']); ?></span>
                            <i class="fas fa-angle-down"></i>
                        </a>
                        <div class="dropdown-top-account">
                            <a href="profile.php?id=<?php echo $_SESSION['id'] ?>"><i class="fas fa-user-edit"></i>My Profile</a>
                            <a href="edit.php?post_type=product"><i class="fas fa-box" aria-hidden="true"></i>My Products</a>
                            <a href="edit.php?post_type=order"><i class="fas fa-file-alt" aria-hidden="true"></i>My Orders</a>
                            <a href="edit.php?post_type=coupon"><i class="fas fa-percent" aria-hidden="true"></i>My Coupons</a>
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" style="color: #f46a6a;"><i class="fas fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
                <div class="sell-body">
                    <div class="sell-body-content">
                        <div class="layout-header">
                            <div class="breadcrumbs">
                                <div class="container">
                                    <div class="wrapper">
                                        <div class="col-35">
                                            <div class="bread-inner">
                                                <ul class="bread-list">
                                                    <li>
                                                        <a href="seller-dashboard.php?page=home">
                                                            Dashboard<i class="ti-arrow-right"></i>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="<?php echo $breadcrumbSlug; ?>"><?php echo $breadcrumbName; ?></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="activity-buttons">
                                <button tabindex="0">
                                    <svg height="24" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g>
                                            <path d="M16 8H8V6h8v2zm0 2H8v2h8v-2zm4-6v12l-6 6H6c-1.105 0-2-.895-2-2V4c0-1.105.895-2 2-2h12c1.105 0 2 .895 2 2zm-2 10V4H6v16h6v-4c0-1.105.895-2 2-2h4z"></path>
                                        </g>
                                    </svg>
                                    <a href="#">Orders</a>
                                    <span class="unread_activity"></span>
                                </button>
                                <button tabindex="1">
                                    <svg height="24" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g>
                                            <path d="M16 18H8v-2h8v2zm0-6H8v2h8v-2zm2-9h-2v2h2v15H6V5h2V3H6c-1.105 0-2 .895-2 2v15c0 1.105.895 2 2 2h12c1.105 0 2-.895 2-2V5c0-1.105-.895-2-2-2zm-4 2V4c0-1.105-.895-2-2-2s-2 .895-2 2v1c-1.105 0-2 .895-2 2v1h8V7c0-1.105-.895-2-2-2z"></path>
                                        </g>
                                    </svg>
                                    <a href="#">Stock</a>
                                    <span class="unread_activity"></span>
                                </button>
                                <button tabindex="2">
                                    <svg height="24" width="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g>
                                            <path d="M12 2l2.582 6.953L22 9.257l-5.822 4.602L18.18 21 12 16.89 5.82 21l2.002-7.14L2 9.256l7.418-.304"></path>
                                        </g>
                                    </svg>
                                    <a href="#">Reviews</a>
                                    <span class="unread_activity"></span>
                                </button>
                            </div>
                            <div class="activity-panel-wrapper" tabindex="0" role="tabpanel" aria-label="Orders">
                                <div class="activity-panel-content" id="activity-panel-orders">
                                    <div class="activity-panel-header">
                                        <h3 class="activity-panel-header-title">Orders</h3>
                                    </div>
                                    <div>
                                        <?php
                                            try {
                                                $stmt = $db->prepare("SELECT * FROM placed_orders LEFT JOIN (SELECT DISTINCT order_id AS OrderID, product_id, quantity FROM orders_items GROUP BY order_id) AS orders_items ON orders_items.OrderID=placed_orders.order_id LEFT JOIN (SELECT *, users.id AS client_id FROM users) AS clients ON placed_orders.order_email=clients.email LEFT JOIN (SELECT *, products.id AS prod_id FROM products) AS prods ON orders_items.product_id=prods.prod_id WHERE owner_id=:user_id ORDER BY order_id DESC");
                                                $stmt->execute(['user_id'=>$_SESSION['id']]);
                                                foreach($stmt as $row) {
                                                    $costTotal = 0;
                                                    $prodsNum = 0;

                                        ?>
                                        <section class="order-activity-card">
                                            <header class="activity-card-header">
                                                <h4 class="activity-card-title">
                                                    Order <a href="#">#<?php echo $row['order_id']; ?></a>
                                                    placed by <a href=""><?php echo ucwords($row['firstname'].' '.$row['lastname']); ?></a>
                                                </h4>
                                                <div class="activity-card-subtitle">
                                                    <div>
                                                        <?php
                                                            $sql = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id=products.id WHERE order_id=:orderIdent AND owner_id=:userID");
                                                            $sql->execute(['orderIdent'=>$row['order_id'], 'userID'=>$_SESSION['id']]);
                                                            foreach($sql as $key) {
                                                                $costTotal+=$key['price']*$key['quantity'];
                                                                $prodsNum+=1;
                                                            }
                                                        ?>
                                                        <span><?php echo $prodsNum; ?> Product(s) </span>
                                                        <span>&#8226; $<?php echo $costTotal; ?></span>
                                                    </div>
                                                </div>
                                                <span class="activity-card-date">
                                                    <i class="far fa-clock"></i>
                                                    <?php
                                                        $order_date = $row['order_date'];
                                                        $current_date = date('Y-m-d h:i:s');

                                                        $diffrenceTime = 0;

                                                        if(round(abs(strtotime($current_date)-strtotime($order_date))/60) < 60){
                                                            echo round(abs(strtotime($current_date)-strtotime($order_date))/60). ' Minutes(s) Ago';   
                                                        }
                                                        else if(round(abs(strtotime($current_date)-strtotime($order_date))/3600) < 24){
                                                            echo round(abs(strtotime($current_date)-strtotime($order_date))/3600). ' Hours(s) Ago';   
                                                        }
                                                        else if(round(abs(strtotime($current_date)-strtotime($order_date))/86400) < 30){
                                                            echo round(abs(strtotime($current_date)-strtotime($order_date))/86400). ' Day(s) Ago';   
                                                        } else {
                                                            echo round(abs(strtotime($current_date)-strtotime($order_date))/2592000). ' Month(s) Ago'; 
                                                        }
                                                    ?>
                                                </span>
                                            </header>
                                            <div class="activity-card-body">
                                                <div class="order-status">
                                                    <?php
                                                        switch ($row['order_status']) {
                                                            case 1:
                                                                echo '<span class="order-indicator hold"></span>On Hold';
                                                                break;
                                                            case 2:
                                                                echo '<span class="order-indicator failed"></span>Payment Failed';
                                                                break;
                                                            case 3:
                                                                echo '<span class="order-indicator refunded"></span>Refunded';
                                                                break;
                                                            case 4:
                                                                echo '<span class="order-indicator delivred"></span>Processing';
                                                                break;
                                                            default:
                                                                break;
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </section>
                                        <?php

                                                }
                                            } catch(PDOException $e){
                                                echo "Error: " . $e->getMessage();
                                            }

                                        ?>
                                        <a href="#" class="activity-panel-link-all">Show all orders</a>
                                    </div>
                                </div>
                            </div>
                            <div class="activity-panel-wrapper" tabindex="1" role="tabpanel" aria-label="Stock">
                                <div class="activity-panel-content" id="activity-panel-orders">
                                    <div class="activity-panel-header">
                                        <h3 class="activity-panel-header-title">Stock</h3>
                                    </div>
                                    <div>
                                        <?php
                                            try {
                                                $stmt = $db->prepare("SELECT * FROM products WHERE owner_id=:user_id AND quantity<=10");
                                                $stmt->execute(['user_id'=>$_SESSION['id']]);
                                                foreach($stmt as $row) {

                                        ?>
                                        <section class="order-activity-card">
                                            <div>
                                                <div class="stock-panel-wrapper">
                                                    <a href="#">
                                                        <img class="product-img" src="http://localhost/ShopMeex/images/items/<?php echo $row['photo'];?>">
                                                    </a>
                                                    <div>
                                                        <h3 class="product-title">
                                                            <a href="#"><?php echo $row['name'];?></a>
                                                        </h3>
                                                        <form method="POST" style="display: flex;flex-direction: column; align-items: flex-start;">
                                                            <span class="stock-status">
                                                                <span class="editable"><?php echo $row['quantity'];?></span>
                                                                <input class="stock-value" name="stock-value" type='text' style='display:none' value="<?php echo $row['quantity'];?>">&nbsp;in stock
                                                                <input type="hidden" name="prod_id" value="<?php echo $row['id'];?>">
                                                            </span>
                                                            <button type="submit" name="update-stock" class="update-stock">Update Stock</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <?php

                                                }
                                            } catch(PDOException $e){
                                                echo "Error: " . $e->getMessage();
                                            }

                                        ?>
                                        <a href="edit.php?post_type=product" class="activity-panel-link-all">Show Stock Status</a>
                                    </div>
                                </div>
                            </div>
                            <div class="activity-panel-wrapper" tabindex="2" role="tabpanel" aria-label="Reviews">
                                <div class="activity-panel-content" id="activity-panel-orders">
                                    <div class="activity-panel-header">
                                        <h3 class="activity-panel-header-title">Reviews</h3>
                                    </div>
                                    <div>
                                        <?php
                                            try {
                                                $stmt = $db->prepare("SELECT *, review.id AS review_id FROM review LEFT JOIN products ON review.product_id=products.id LEFT JOIN (SELECT *, users.id AS client_id FROM users) AS clients ON review.user_id=clients.id WHERE owner_id=:user_id ORDER BY review.date DESC");
                                                $stmt->execute(['user_id'=>$_SESSION['id']]);
                                                foreach($stmt as $row) {

                                        ?>
                                        <section class="order-activity-card">
                                            <div>
                                                <div class="stock-panel-wrapper">
                                                    <a target="_blank" href="product.php?product=<?php echo $row['slug'] ?>">
                                                        <img class="product-img" src="images/items/<?php echo $row['photo'] ?>">
                                                        <img class="user-img" src="images/users/<?php echo $row['picture'];?>">
                                                    </a>
                                                    <header class="activity-card-header">
                                                        <h4 class="activity-card-title">
                                                            <a target="_blank" href="product.php?product=<?php echo $row['slug'] ?>"><?php echo ucwords($row['name']); ?></a>
                                                            reviewed by <a href=""><?php echo ucwords($row['firstname'].' '.$row['lastname']); ?></a>
                                                        </h4>
                                                        <div class="activity-card-subtitle">
                                                            <div id="reviews">
                                                                <div class="star-rating" aria-label="Rated 2 out of 5">
                                                                    <span style="width:<?php echo (($row['rating']*100)/5).'%';?>">
                                                                        Rated <strong class="rating">2</strong>
                                                                        out of 5
                                                                    </span>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div>
                                                                <span><?php echo $row['comment'] ?></span>
                                                            </div>
                                                        </div>
                                                        <span class="activity-card-date">
                                                            <i class="far fa-clock"></i>
                                                        <?php
                                                            $review_date = $row['date'];
                                                            $current_date = date('Y-m-d h:i:s');

                                                            $diffrenceTime = 0;

                                                            if(round(abs(strtotime($current_date)-strtotime($review_date))/60) < 60){
                                                                echo round(abs(strtotime($current_date)-strtotime($review_date))/60). ' Minutes(s) Ago';   
                                                            }
                                                            else if(round(abs(strtotime($current_date)-strtotime($review_date))/3600) < 24){
                                                                echo round(abs(strtotime($current_date)-strtotime($review_date))/3600). ' Hours(s) Ago';   
                                                            }
                                                            else if(round(abs(strtotime($current_date)-strtotime($review_date))/86400) < 30){
                                                                echo round(abs(strtotime($current_date)-strtotime($review_date))/86400). ' Day(s) Ago';   
                                                            } else {
                                                                echo round(abs(strtotime($current_date)-strtotime($review_date))/2592000). ' Month(s) Ago'; 
                                                            }
                                                        ?>
                                                        </span>
                                                    </header>
                                                </div>
                                            </div>
                                        </section>
                                         <?php

                                                }
                                            } catch(PDOException $e){
                                                echo "Error: " . $e->getMessage();
                                            }

                                        ?>
                                        <a href="#" class="activity-panel-link-all">Show all reviews</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="layout-primary">
                            <div class="primary-wrapper">