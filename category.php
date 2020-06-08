<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ShopMeex Online Store</title>
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/productstyle.css">
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
            <header id="main-header" class="negop">
                <!-- Start Top Section -->
                <section class="top-sec">
                    <div class="container">
                        <nav>
                            <ul class="social-media">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav-items">
                                <li>
                                    <a href="#">Help</a>
                                </li>
                                <li class="dropdown-menu1">
                                    <a href="#">
                                        DZD<i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a href="#">USD</a>
                                        </li>
                                        <li>
                                            <a href="#">EUR</a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </li>
                                <li class="dropdown-menu2">
                                    <a href="#">
                                        Français<i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a href="#">Anglais</a>
                                        </li>
                                        <li>
                                            <a href="#">Arabe</a>
                                        </li>
                                    </ul>
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
                                <form method="post" action="productlist.php">
                                    <div class="search-bar-container">
                                        <select class="custom-select" name="category_name">
                                            <option value="">All types</option>
                                            <option value="special">Special</option>
                                            <option value="best">Only best</option>
                                            <option value="recent">Latest</option>
                                        </select>
                                        <input type="search" class="form-control" id="navbar-search-input" placeholder="Search Here..." name="keyword" required="">
                                        <div class="search-icon-container">
                                            <button class="search-icon" type="submit" name="submit">
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
                                            <i class="fa fa-shopping-cart"></i>
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
                                                <small class="text-muted">Sign in | Sign Up</small>
                                                <div>
                                                    My Account<i class="fa fa-angle-down"></i>
                                                </div>
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
                            <li>
                                <a href="#">
                                    <strong>Toutes Les Catégories</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <strong>Machines</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <strong>Electronique</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <strong>Electroménagie</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <strong>Services &Equipements</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <strong>Santé</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <strong>Toys &Hobbies</strong>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <strong>Home Textiles</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- begin  div separable-->
            <section class="row-separabble  negop">
                <div class="container">
                    <h2 class="title">Les Categorie Des Produits </h2>
                    <nav class="row-cat">
                        <ol>
                            <li>
                                <a href="#">Home / </a>
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
                                                <form action="category.php" method="get">
                                                <ul>
                                                     <li class="navi-item">
								            <a class="navi-link" data-toggle="tab" href="#Digital Goods" role="tab" aria-selected="false">Digital                                                     Goods</a>
								        </li>
                                        <li class="navi-item">
                                            <a class="navi-link " data-toggle="tab" href="#Clothes" role="tab" ariaselected="false">Clothes</a>
                                        </li>
                                        <li class="navi-item">
								            <a class="navi-link " data-toggle="tab" href="#Health and Care" role="tab" aria-selected="false">Health and                                             Care</a>
								        </li>
								        <li class="navi-item">
								            <a class="navi-link " data-toggle="tab" href="#Home Interior" role="tab" aria-selected="false">Home                                                     Interior</a>
								        </li>
								        <li class="navi-item">
								            <a class="navi-link " data-toggle="tab" href="#Toys and Games" role="tab" aria-selected="false">Toys and                                                     Games</a>
								        </li>	
                                                </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </article>
                                    <article>
                                        <div class="filtre-tag flex flexwrap">
                                            <p>price</p>
                                            <i class="fa fa-chevron-down "></i>
                                        </div>
                                        <div class="content-tag ">
                                            <div class="container-content-tag">
                                                <input type="range" class="custom-range" name="range-price" style="border: 0">
                                            </div>
                                            <form class="form-price flex">
                                                <div class="min flexdemi">
                                                    <labe name="min">min
    
    </label><input type="text" class="input-price" name="min" placeholder="$0">
    </div>
    <div class="max flexdemi">
        <label name="max">max</label>
        <input type="number" class="input-price" name="max" placeholder="$0">
    </div>
    </form>
    <a class="submit-price" href="#">
        <button class="submit-price">Apply</button>
    </a>
    </div></article>
    <article>
        <div class="filtre-tag flex flexwrap">
            <p>les categorie</p>
            <i class="fa fa-chevron-down "></i>
        </div>
        <div class="content-tag">
            <div class="container-content-tag flex flexwrap ">
                <label class="label-size flexpart">
                    <input type="checkbox" name="">
                    <span>L</span>
                </label>
                <label class="label-size flexpart">
                    <input type="checkbox" name="">
                    <span>X</span>
                </label>
                <label class="label-size flexpart">
                    <input type="checkbox" name="">
                    <span>XL</span>
                </label>
                <label class="label-size flexpart">
                    <input type="checkbox" name="">
                    <span>XLL</span>
                </label>
            </div>
        </div>
    </article>
    <article>
        <div class="filtre-tag flex flexwrap">
            <p>les categorie</p>
            <i class="fa fa-chevron-down "></i>
        </div>
        <div class="content-tag"></div>
    </article>
    </div></div></aside>
                        <aside class="product-view flextroisquart">
                            <div class="wrapper">
                                <div class="top-row">
                                    <div class="container-top-row">
                                       <div class="head-top-row flex">
                                            <h1> Digital Goods</h1>
                                            <form class="select-form flex">
                                                <div class="select-box flex">
                                                <div class="options-container">
                                                  <div class="option">
                                                    <input
                                                      type="radio"
                                                      class="radio"
                                                      id="pd"
                                                      name="category"
                                                    />
                                                    <label for="pd">le plus demendée</label>
                                                  </div>

                                                  <div class="option">
                                                    <input type="radio" class="radio" id="pc" name="category" />
                                                    <label for="pc">prix croissant</label>
                                                  </div>

                                                  <div class="option">
                                                    <input type="radio" class="radio" id="pdc" name="category" />
                                                    <label for="pdc">pri decoissant</label>
                                                  </div>
                                                  <div class="option">
                                                    <input type="radio" class="radio" id="nv" name="category" />
                                                    <label for="nv">nouvelearrivage</label>
                                                  </div>
                                                  <div class="option">
                                                    <input type="radio" class="radio" id="mieux" name="category" />
                                                    <label for="mieux">mieux notée</label>
                                                  </div>

                                                  
                                                </div>

                                                <div class="option-selected">
                                                  le plus demendée
                                                </div>
                                              </div>                                            
                                           </form>
                                       </div>
                                       <div class="bottom-top-row flex">
                                        <span class="items-founds " id="number-res-search">
                                            20 items 
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
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-col">
                                            <div class="single-product">
                                                <div class="product-img">
                                                    <a href="product.php?product=mouse">
                                                        <img src="images/items/Photo1.jpg">
                                                        <img class="hover-default" src="images/items/Photo1.jpg">
                                                    </a>
                                                    <div class="button-head">
                                                        <div class="product-action">
                                                            <a href="#">
                                                                <i class="ti-eye"></i>
                                                                <span>Quick View</span>
                                                            </a>
                                                            <a rel="2" class="add_to_wishlist" href="#">
                                                                <i class="ti-heart"></i>
                                                                <span>Add To Wishlist</span>
                                                            </a>
                                                            <a href="#">
                                                                <i class="ti-bar-chart-alt"></i>
                                                                <span>Add To Compare</span>
                                                            </a>
                                                        </div>
                                                        <div class="product-action-2">
                                                            <a href="#" rel="2" class="add_to_c" title="Add To Cart">
                                                                Add To Cart<i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3>
                                                        <a href="product.php?product=mouse">mouse</a>
                                                    </h3>
                                                    <div class="product-price-rating">
                                                        <span title="Price">$400.00</span>
                                                        <ul title="Rating">
                                                            <li class="stars-active">
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                            <li>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="https://kit.fontawesome.com/5d49be4ed0.js" crossorigin="anonymous"></script>
    </body></html>
