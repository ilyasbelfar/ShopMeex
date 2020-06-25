<?php
    include "includes/session.php";
   if (isset($_GET['category'])) {
    $slug=$_GET['category'];
    
    }
    else {
        $slug="Digital-Goods";
    }


    try {


       



        $stmt = $db->prepare("SELECT * from category WHERE slug = :slug");
        $stmt->execute(['slug' => $slug]);//id category;
        if ($stmt->rowCount()==0) {
            header("location: 404.php");
            exit();
        }
        $category = $stmt->fetch();

        $stmt = $db-> query("SELECT * FROM category");
        $categories=$stmt->fetchAll();


         if ($_SERVER['REQUEST_METHOD']=='POST'){
                $stmt=$db->prepare("SELECT * from products where category_id=:catid AND price <=:max AND price >=:min ");
                $stmt->execute(['catid'=>$category['id'],'max'=>$_POST['max'],'min'=>$_POST['min']]);
                $products= $stmt->fetchAll();
                $numberproduct=$stmt->rowCount();

        }
        else {
            $stmt=$db->prepare("SELECT * from products where category_id=:catid  ");
            $stmt->execute(['catid'=>$category['id']]);
            $products= $stmt->fetchAll();
            $numberproduct=$stmt->rowCount();
    }

        
    } catch (Exception $e) {
        echo "There is some problem in connection: " . $e->getMessage();
        
    }



?>











<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $category['name']; ?> | ShopMeex Online Store</title>
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/productstyle.css">
        <link rel="stylesheet" type="text/css" href="css/souscat.css">
        <link rel="stylesheet" type="text/css" href="FontAwesome/css/all.css">
        <link rel="stylesheet" type="text/css" href="css/reapeatingstyle.css">
        <link rel="stylesheet" type="text/css" href="css/category.css">
        <link rel="stylesheet" type="text/css" href="css/color/color.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="FontAwesome/css/themify.css">
        <link rel="stylesheet" type="text/css" href="css/reapeatingStyle.css">
        <link rel="stylesheet" type="text/css" href="css/popup.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <style>
            @font-face {
                font-family : themify;
                src : url(fonts/themify/themify.eot);
                src : url(fonts/themify/themify.eot?#iefix) format('embedded-opentype'), url(fonts/themify/themify.woff) format('woff'), url(fonts/themify/themify.ttf) format('truetype');
            </style>
        


            <?php 
        // inlude the header 

        include 'includes/header.php';


    ?>


            <!-- begin  div separable-->
            <section class="row-separabble  negop">
                <div class="container">
                    <h2 class="title"><?php echo $category['name']; ?> </h2>
                    <nav class="row-cat">
                        <ol>
                            <li>
                                <a href="index.php">Home / </a>
                                <a href="#"><?php echo $category['name']; ?></a>
                            </li>
                            <li></li>
                            <li></li>
                        </ol>
                    </nav>
                </div>
            </section>
            <!-- End  div separable-->
            <!-- begin  main -->
            <section class="product-area negop">
                <div class="maincontainer">
                    <div class="wrapper flex ">
                       <aside class="filter-area flexquart">
                            <div class="container">
                                <div class="wrapper flex ">
                                    <article>
                                        <div class="filtre-tag flex flexwrap">
                                            <p>Categories</p>
                                            <i class="fa fa-chevron-down "></i>
                                        </div>


                                        <div class="content-tag ">
                                            <div class="container-content-tag ">
                                              
                                        <ul id="catsou-pan">


                                    <?php 
                                    <!--foreach ($categories as $row ){   
                                      echo  
                                      "<li class='navi-item'>
                                            <a class='navi-link' data-toggle='tab' href='".'category.php?category='.$row['slug']."' role='tab' ariaselected='false'>".$row['name']."</a>
<ul class=" hide cmohul">
                                                            <li > blalala</li>
                                                            <li > blalala</li>
                                                            <li > blalala</li>
                                                            <li > blalala</li>
                                                </ul>
                                        </li>";
                                    }

                                ?>
                                     
                                    </ul>

                                                
                                            </div>
                                        </div>



                                    </article>
                                    <article>
                                        <div class="filtre-tag flex flexwrap">
                                            <p>Filter By Price</p>
                                            <i class="fa fa-chevron-down "></i>
                                        </div>
                                        <div class="content-tag ">
                                            <div class="container-content-tag">
                                                <input type="range" class="custom-range" name="range-price" style="border: 0">
                                            </div>
                                            <form style="    flex-wrap: wrap;justify-content: center"class="form-price flex" action="category.php" method="post">
                                                <div class="min flexdemi">
                                                    <label name="min">min
    
      </label><input type="text" class="input-price" name="min" placeholder="$0">
    </div>
    <div class="max flexdemi">
        <label name="max">max</label>
        <input type="number" class="input-price" name="max" placeholder="$0">
    </div>

    <a style="padding: 0 0 10px 0;" class="submit-price" href="#">
        <button style="padding:0" type="submit" class="submit-price">Apply</button>
    </a>
</form>

    </div></article>
  
    
    </div></div></aside>
                        <aside class="product-view flextroisquart">
                            <div class="wrapper">
                                <div class="top-row">
                                    <div class="container-top-row">
                                       <div class="head-top-row flex">
                                            <h1> <?php echo $category['name'] ?></h1>
                                            
                                       </div>
                                       <div class="bottom-top-row flex">
                                        <span class="items-founds " id="number-res-search">
                                            <?php echo $numberproduct ?> items 
                                        </span>
                                        <div class="change-view flex">
                                            
                                            <div class="flex">
                                                <button class="select-list-view">
                                                    <a href="#">
                                                        <i class="fa fa-bars"></i>
                                                    </a>
                                                </button>
                                                <button class="select-grid-view selected">
                                                    <a href="#">
                                                        <i class="fa fa-th"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <article class="grid-view">
                                    <div class="wraapper flex flexwrap">

                                         <?php 
                    foreach($products as $row) {
                      echo "<div class='tab-col'>
                            <div class='single-product'>
                                <div class='product-img'>
                                    <a href='product.php?product=".$row['slug']."'>
                                        <img src='images/items/".$row['photo']."'>
                                        <img class='hover-default' src='images/items/".$row['photo']."'>
                                    </a>
                                    <div class='button-head'>
                                        <div class='product-action'>
                                            <a href='#'>
                                                <i class='ti-eye'></i>
                                                <span>Quick View</span>
                                            </a>


                                            <a   rel=".$row['id']." class='add_to_wishlist'  href='#'  >
                                               <i class='ti-heart' ></i>
                                                <span>Add To Wishlist</span>
                                            </a>




                                            <a href='#'>
                                                <i class='ti-bar-chart-alt'></i>
                                                <span>Add To Compare</span>
                                            </a>
                                        </div>











                                        <div class='product-action-2'>
                                 

                           
            
                       
                        <a href='#' rel=".$row['id']." class='add_to_c' title='Add To Cart'>Add To Cart<i class='fa fa-shopping-cart'></i></a>
           





                            </div>









                                    </div>
                                </div>
                                <div class='product-content'>
                                    <h3>
                                    <a href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                                                                    </h3>
                                    <div class='product-price-rating'>
                                        <span title='Price'>$".number_format($row['price'], 2)."</span>
                                        <ul title='Rating'>
                                            <li class='stars-active'>";

                                            for ($i=1;$i<=$row['total_rating']+6;$i++){
                                                echo "<i class='fa fa-star'></i>\n";
                                            }
                                                

                                            echo "</li>
                                            <li>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>" ;  }
                        ?>


                                    </div>
                                </article>
                                <article class="list-view flex marginbottom">
                                    <div class="container">
                                        <div class="wrapper flex">
                                            <aside class="product-image flexquart ">
                                                <a href="#">
                                                    <img src="images/items/12.jpg">
                                                </a>
                                            </aside>
                                            <article class="prod-def flexdemi">
                                                <a class="prod-name" href="#">Product Name
                                                </a>
                                                <div class="rating flex down">
                                                    <ul class="pos-rate">
                                                        <li>
                                                            <a href="#">
                                                                <i class="orange fa fa-star"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="neg-rate up">
                                                        <li>
                                                            <a href="#">
                                                                <i class="grix fa fa-star"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <small class="review">
                                                        <span>128</span>
                                                        review
                                                    
                                                    </small>
                                                    <div class="order">
                                                        <i class="fa fa-clipboard-check"></i>
                                                        <small class="order">
                                                            <span>99</span>
                                                            order
                                                        
                                                        </small>
                                                    </div>
                                                </div>
                                                <p style="display: block;">The largest Apple Watch display yet. Electrical heart sensor. Re-engineered Digital Crown with haptic feedback. Entirely familiar, yet completely redesigned, Apple Watch Series 4 resets the standard for what a watch can be.
                                                </p>
                                            </article>
                                            <aside class="Shop flexquart flex flexwrap ">
                                                <div class="newprice">
                                                    <h2>
                                                        54 <span>$</span>
                                                    </h2>
                                                </div>
                                                <div class="oldprice">
                                                    <p>
                                                        54 <span>$</span>
                                                    </p>
                                                </div>
                                                <p class="green">free shipping</p>
                                                <div>
                                                    <div>
                                                        <a class="order">
                                                            <button>Order
                                                                </button>
                                                        </a>
                                                        <button class="Details">Details
                                                            </button>
                                                    </div>
                                                    <a class="wish-list">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </article>
                                <article class="list-view flex marginbottom">
                                    <div class="container">
                                        <div class="wrapper flex">
                                            <aside class="product-image flexquart ">
                                                <a href="#">
                                                    <img src="images/items/12.jpg">
                                                </a>
                                            </aside>
                                            <article class="prod-def flexdemi">
                                                <a class="prod-name" href="#">Product Name
                                                </a>
                                                <div class="rating flex down">
                                                    <ul class="pos-rate">
                                                        <li>
                                                            <a href="#">
                                                                <i class="orange fa fa-star"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="neg-rate up">
                                                        <li>
                                                            <a href="#">
                                                                <i class="grix fa fa-star"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <small class="review">
                                                        <span>128</span>
                                                        review
                                                    
                                                    </small>
                                                    <div class="order">
                                                        <i class="fa fa-clipboard-check"></i>
                                                        <small class="order">
                                                            <span>99</span>
                                                            order
                                                        
                                                        </small>
                                                    </div>
                                                </div>
                                                <p style="display: block;">The largest Apple Watch display yet. Electrical heart sensor. Re-engineered Digital Crown with haptic feedback. Entirely familiar, yet completely redesigned, Apple Watch Series 4 resets the standard for what a watch can be.
                                                </p>
                                            </article>
                                            <aside class="Shop flexquart flex flexwrap ">
                                                <div class="newprice">
                                                    <h2>
                                                        54 <span>$</span>
                                                    </h2>
                                                </div>
                                                <div class="oldprice">
                                                    <p>
                                                        54 <span>$</span>
                                                    </p>
                                                </div>
                                                <p class="green">free shipping</p>
                                                <div>
                                                    <div>
                                                        <a class="order">
                                                            <button>Order
                                                                </button>
                                                        </a>
                                                        <button>Details
                                                                </button>
                                                    </div>
                                                    <a class="wish-list">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </article>
                                <article class="list-view flex marginbottom">
                                    <div class="container">
                                        <div class="wrapper flex">
                                            <aside class="product-image flexquart ">
                                                <a href="#">
                                                    <img src="images/items/12.jpg">
                                                </a>
                                            </aside>
                                            <article class="prod-def flexdemi">
                                                <a class="prod-name" href="#">Product Name
                                                </a>
                                                <div class="rating flex down">
                                                    <ul class="pos-rate">
                                                        <li>
                                                            <a href="#">
                                                                <i class="orange fa fa-star"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star orange"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="neg-rate up">
                                                        <li>
                                                            <a href="#">
                                                                <i class="grix fa fa-star"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i class="fa fa-star grix"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <small class="review">
                                                        <span>128</span>
                                                        review
                                                    
                                                    </small>
                                                    <div class="order">
                                                        <i class="fa fa-clipboard-check"></i>
                                                        <small class="order">
                                                            <span>99</span>
                                                            order
                                                        
                                                        </small>
                                                    </div>
                                                </div>
                                                <p style="display: block;">The largest Apple Watch display yet. Electrical heart sensor. Re-engineered Digital Crown with haptic feedback. Entirely familiar, yet completely redesigned, Apple Watch Series 4 resets the standard for what a watch can be.
                                                </p>
                                            </article>
                                            <aside class="Shop flexquart flex flexwrap ">
                                                <div class="newprice">
                                                    <h2>
                                                        54 <span>$</span>
                                                    </h2>
                                                </div>
                                                <div class="oldprice">
                                                    <p>
                                                        54 <span>$</span>
                                                    </p>
                                                </div>
                                                <p class="green">free shipping</p>
                                                <div>
                                                    <div>
                                                        <a class="order">
                                                            <button>Order
                                                                </button>
                                                        </a>
                                                        <button>Details
                                                                </button>
                                                    </div>
                                                    <a class="wish-list">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </aside>
                        </div></div></section>
    <!-- end main -->
    <!-- End Header -->
    <!-- Start NewsLetter -->
    <div class="newsletter-area negop">
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
    <footer id="main-footer" class="negop">
        <div class="container">
            <section class="footer-sections">
                <div class="wrapper">
                    <aside>
                        <h3>Brands</h3>
                        <ul>
                            <li>
                                <a href="#">Adidas</a>
                            </li>
                            <li>
                                <a href="#">Puma</a>
                            </li>
                            <li>
                                <a href="#">Fila</a>
                            </li>
                            <li>
                                <a href="#">Nike</a>
                            </li>
                            <li>
                                <a href="#">Samsung</a>
                            </li>
                        </ul>
                    </aside>
                    <aside>
                        <h3>Company</h3>
                        <ul class="ul-2">
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Service</a>
                            </li>
                            <li>
                                <a href="#">Inventory</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                            <li>
                                <a href="#">Conditions</a>
                            </li>
                        </ul>
                    </aside>
                    <aside>
                        <h3>Help</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope"></i>
                                    Contact Us
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-money-check"></i>
                                    Money Refund
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-info-circle"></i>
                                    Order Status
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-shopping-bag"></i>
                                    Shipping Info
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-share"></i>
                                    Open Dispute
                                
                                </a>
                            </li>
                        </ul>
                    </aside>
                    <aside>
                        <h3>Account</h3>
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-user-circle"></i>
                                    User Login
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-user-plus"></i>
                                    User Register
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-cog"></i>
                                    Account Settings
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-cart-plus"></i>
                                    My Orders
                                
                                </a>
                            </li>
                        </ul>
                    </aside>
                    <aside>
                        <h3>Social Media</h3>
                        <ul class="social-media">
                            <li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-facebook"></i>
                                    Facebook
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                    Twitter
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                    Instagram
                                
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-phone"></i>
                                    N° Phone
                                
                                </a>
                            </li>
                        </ul>
                    </aside>
                </div>
            </section>
        </div>
        <div class="copyrights-payments">
            <div class="container">
                <p class="rights">
                    &copy;
                    <a href="#">
                        <span class="span-1">Shop</span>
                        <span class="span-2">Meex</span>
                    </a>
                    , All Rights Reserved. &reg;
                </p>
                <div class="payments-bg">
                    <img src="images/payment.png">
                </div>
            </div>
        </div>
    </footer>
    <div class="popupcontainer">
        <div class="c1"></div>
        <div class="c2"></div>
        <div class="details">
            <div class="container">
                <i class="search-icon-close ti-close"></i>
                <div class="info">
                    <a href="#">
                        <span class="buyer-name">By Dell Company  </span>
                    </a>
                    <h2>Off-White Odsy-1000 Low-Top Sneakers</h2>
                    <div class="rating">
                        <ul class="rating-star">
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
                        <small class="reviews">132 reviews</small>
                        <small class="orders">132 orders </small>
                    </div>
                    <div class="priceside">
                        <var class="price">$815.00</var>
                        <span class="contity">/per kg</span>
                    </div>
                    <p>Here goes description consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco </p>
                    <ul>
                        <li>Best performance  </li>
                        <li>5 years warranty for this product</li>
                        <li>blaaa bla blaaa</li>
                    </ul>
                    <dl class="flex flexwrap ">
                        <dt class="Model">Model#</dt>
                        <dd class="Model">Odsy-1000</dd>
                        <br>
                        <dt class="Color">Color</dt>
                        <dd class="Color">Brown</dd>
                        <br>
                        <dt class="Delivery">Delivery</dt>
                        <dd class="Delivery">Algerie, and Europe </dd>
                    </dl>
                    <div class="bottom">
                        <div class="more">
                            <a href="product.php">
                                <button>
                                    <span>more</span>
                                </button>
                            </a>
                        </div>
                        <div class="buy">
                            <button>
                                <span>Get one
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="image">
                    <img src="images/items/10.jpg">
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer -->
    <script>
        const selected = document.querySelector(".option-selected");
const optionsContainer = document.querySelector(".options-container");

const optionsList = document.querySelectorAll(".option");

selected.addEventListener("click", () => {
  optionsContainer.classList.toggle("active-option");
});

optionsList.forEach(o => {
  o.addEventListener("click", () => {
    selected.innerHTML = o.querySelector("label").innerHTML;
    optionsContainer.classList.remove("active-option");
  });
});
        </script>
    <script src="js/popup.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/product.js"></script>
        <script>
           
            xulnav = $(' #catsou-pan li');
                xulnav.each(function(){
                    $(this).hover(function() {
                        $(this).children().each(function(e){
                            if($(this).hasClass('cmohul')){
                                $(this).addClass('showsouscat');                           
                                $(this).removeClass('hide');                           
                            }
                        });
                    },function() {
                        $(this).children().each(function(e){
                            if($(this).hasClass('cmohul')){
                                $(this).addClass('hide');                           
                                $(this).removeClass('showsouscat');                           
                            }
                        });
                    }
                    );
                });
        </script>
    <script src="https://kit.fontawesome.com/5d49be4ed0.js" crossorigin="anonymous"></script>
    <?php include 'includes/script.php'; ?>
    </body></html>
