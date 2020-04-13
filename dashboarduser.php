<?php
    include 'includes/session.php';
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $getUser = $db->prepare("SELECT * FROM users WHERE email = ?");
        $getUser->execute(array($_SESSION["email"]));
        $info = $getUser->fetch();
        $emailid = $info['email'];
    }
$emailInsErr="";
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }



    if ($_SERVER['REQUEST_METHOD']=='POST') {
        if (isset($_POST['fname']))
            $fname=$_POST['fname'];
        else
            $fname=$info['firstname'];
            
        if (isset($_POST['lname']))
            $lname=$_POST['lname'];
        else
            $lname=$info['lastname'];
            
        if (isset($_POST['email'])&&($_POST['email']!=$info['email'])){
            $email=$_POST['email'];
            $stmtt=$db->prepare('SELECT email from users where email=?');
            $stmtt->execute(array($email));
            $count=$stmtt->rowCount();
            if ($count>0){  
                $emailInsErr="Email Already Taken";
                unset($stmt);
            }
            
            else 
                $_SESSION["email"] = $email;
        }
        else
            $email=$info['email'];
            
        if (isset($_POST['username']))
            $user=$_POST['username'];
        else
            $user=$info['username'];
            
        if (isset($_POST['company_name']))
            $contact=$_POST['company_name'];
            else
            $contact=$info['contact_info'];
    
        if (isset($_POST['country_name']))
            $country=$_POST['country_name'];
            else
            $country=$info['country'];
    
        if (isset($_POST['state-province']))
            $state=$_POST['state-province'];
            else
            $state=$info['state'];

        if (isset($_POST['address-1']))
            $address1=$_POST['address-1'];
            else
            $address1=$info['address'];
            
        if (isset($_POST['address-2']))
            $address2=$_POST['address-2'];
            else
            $address2=$info['address2'];
            
        if (isset($_POST['town']))
            $city=$_POST['town'];
            else
            $city=$info['city'];
        
        if (isset($_POST['zip-code']))
            $postal=$_POST['zip-code'];
            else
            $postal=$info['postal'];
        if (empty($emailInsErr)){
        $stmt=$db->prepare('UPDATE users set firstname=?,lastname=?,email=?,username=?,contact_info=?,country=?,state=?,address=?,address2=?,city=?,postal=? where email=?');
        $stmt->execute(array($fname,$lname,$email,$user,$contact,$country,$state,$address1,$address2,$city,$postal,$emailid));
        
        if ($stmt) 
            header("Location: dashboarduser.php?user=$user");
         else 
             echo '404';
        }
 }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>My Account | ShopMeex Online Store</title>
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
                                                    <span class="quantitys">1 × <span>$<span class="total-amount">7.99</span></span>
                                                    </span>
                                                </li>
                                                <li class="product-item">
                                                    <a href="#" class="remove-item-button">×</a>
                                                    <a href="#" class="item-details">
                                                        <img width="300" height="300" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg 800w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-150x150.jpg 150w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-300x300.jpg 300w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-768x768.jpg 768w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-660x660.jpg 660w" sizes="(max-width: 300px) 100vw, 300px">Basic t-shirt
                                                    </a>
                                                    <div class="clearfix"></div>
                                                    <span class="quantitys">1 × <span>$<span class="total-amount">7.99</span></span>
                                                    </span>
                                                </li>
                                                <li class="product-item">
                                                    <a href="#" class="remove-item-button">×</a>
                                                    <a href="#" class="item-details">
                                                        <img width="300" height="300" src="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" srcset="https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1.jpg 800w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-150x150.jpg 150w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-300x300.jpg 300w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-768x768.jpg 768w, https://cdn.jevelin.shufflehound.com/wp-content/uploads/2016/01/Item_1-660x660.jpg 660w" sizes="(max-width: 300px) 100vw, 300px">Basic t-shirt
                                                    </a>
                                                    <div class="clearfix"></div>
                                                    <span class="quantitys">1 × <span>$<span class="total-amount">7.99</span></span>
                                                    </span>
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

    <!-- Start Dashboard -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="wrapper">
                <div class="col-35">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="my-account.html">My Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="user-dashboard">
        <div class="container">
            <div class="wrapper">
                <div class="tabs-wrapper">
                    <ul class="tabs">
                        <li class="dashboard active">
                            <a href="#dashboard">Dashboard</a>
                        </li>
                        <li class="orders">
                            <a href="#orders">Orders</a>
                        </li>
                        <li class="downloads">
                            <a href="#downloads">Downloads</a>
                        </li>
                        <li class="addresses">
                            <a href="#addresses">Addresses</a>
                        </li>
                        <li class="acc-details">
                            <a href="#acc-details">Account Details</a>
                        </li>
                        <li class="wishlist">
                            <a href="#wishlist">Wishlist</a>
                        </li>
                        <li class="logout">
                            <a href="#logout">Log Out</a>
                        </li>
                    </ul>
                    <div class="paneltbs panel-1" id="dashboard" style="">
                        <p>Hello <strong><?php echo $_SESSION["username"]; ?></strong> (not <strong><?php echo $_SESSION["username"]; ?></strong>? <a href="logout.php">Log out</a>)</p>
                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                        <div class="myaccount-links">
                            <div class="dashboard-link">
                                <a href="#">Dashboard</a>
                            </div>
                            <div class="orders-link">
                                <a href="#">Orders</a>
                            </div>
                            <div class="downloads-link">
                                <a href="#">Downloads</a>
                            </div>
                            <div class="edit-address-link">
                                <a href="#">Addresses</a>
                            </div>
                            <div class="edit-account-link">
                                <a href="#">Account details</a>
                            </div>
                            <div class="wishlist-link">
                                <a href="#">Wishlist</a>
                            </div>
                            <div class="customer-logout-link">
                                <a href="#">Logout</a>
                            </div>
                        </div>
                    </div>

                    <div class="paneltbs panel-2" id="orders" style="display: none;">
                        <div class="alert-message"><a href="#">Browse products </a>No order has been made yet.</div>
                    </div>

                    <div class="paneltbs panel-3" id="downloads" style="display: none;">
                        <div class="alert-message"><a href="#">Browse products </a>No downloads available yet.</div>
                    </div>

                    <div class="paneltbs panel-4" id="addresses" style="display: none;">
                        <form class="form" method="post" action="dashboarduser.php">
                            <div class="row">
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="fname">First Name<span>*</span></label>
                                        <input id="fname" name="fname" type="text" placeholder="" value="<?php echo $info['firstname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span>*</span></label>
                                       <input name="lname" type="text" placeholder="" id="lname" value="<?php echo $info['lastname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="mail">Email Address<span>*<?php echo $emailInsErr; ?></span></label>
                                        <input id="mail" name="email" type="email" placeholder="" value="<?php echo $info['email']; ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="phone">Phone Number<span>*</span></label>
                                        <input id="phone" name="company_name" type="tel" placeholder="" value="<?php echo $info['contact_info']; ?>">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="country">Country<span>*</span></label>
                                        <select name="country_name" id="country">
                                            <option value="AF">Afghanistan</option>
                                            <option value="AX">Åland Islands</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegovina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="VG">British Virgin Islands</option>
                                            <option value="BN">Brunei</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos [Keeling] Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo - Brazzaville</option>
                                            <option value="CD">Congo - Kinshasa</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Côte d’Ivoire</option>
                                            <option value="HR">Croatia</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GG">Guernsey</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard Island and McDonald Islands</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong SAR China</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IM">Isle of Man</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JE">Jersey</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Laos</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macau SAR China</option>
                                            <option value="MK">Macedonia</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia</option>
                                            <option value="MD">Moldova</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="ME">Montenegro</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar [Burma]</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="KP">North Korea</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PS">Palestinian Territories</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn Islands</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Réunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russia</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="BL">Saint Barthélemy</option>
                                            <option value="SH">Saint Helena</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint Lucia</option>
                                            <option value="MF">Saint Martin</option>
                                            <option value="PM">Saint Pierre and Miquelon</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">São Tomé and Príncipe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="RS">Serbia</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia</option>
                                            <option value="KR">South Korea</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syria</option>
                                            <option value="TW">Taiwan</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TL">Timor-Leste</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="US" selected="selected">United Kingdom</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UM">U.S. Minor Outlying Islands</option>
                                            <option value="VI">U.S. Virgin Islands</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <option value="VA">Vatican City</option>
                                            <option value="VE">Venezuela</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="WF">Wallis and Futuna</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="state-province">State / Divition<span>*</span></label>
                                        <select name="state-province" id="state-province">
                                            <option value="state" selected="selected">New Yourk</option>
                                            <option>Los Angeles</option>
                                            <option>Chicago</option>
                                            <option>Houston</option>
                                            <option>San Diego</option>
                                            <option>Dallas</option>
                                            <option>Charlotte</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="adr-1">Address Line 1<span>*</span></label>
                                        <input id="adr-1" name="address-1" type="text" placeholder="" value="<?php echo $info['address']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="adr-2">Address Line 2<span>*</span></label>
                                        <input id="adr-2" name="address-2" type="text" placeholder="" value="<?php echo $info['address2']; ?>" >
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="town">Town / City<span>*</span></label>
                                       <input id="town" name="town" type="text" placeholder="" value="<?php echo $info['city']; ?>">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="zip-code">Postal Code<span>*</span></label>
                                        <input id="zip-code" name="zip-code" type="text" placeholder="" value="<?php echo $info['postal']; ?>">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <button type="submit" class="button" name="save_account_details" value="Save changes">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="paneltbs panel-5" id="acc-details" style="display: none;">
                        <form class="form" method="post" action="dashboarduser.php">
                            <div class="row">
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="fname">First Name<span>*</span></label>
                                        <input id="fname" name="fname" type="text" placeholder="" value="<?php echo $info['firstname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span>*</span></label>
                                         <input name="lname" type="text" placeholder="" id="lname" value="<?php echo $info['lastname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="mail">Email Address<span>*<?php echo $emailInsErr; ?></span></label>
                                         <input id="mail" name="email" type="email" placeholder="" value="<?php echo $info['email']; ?>" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="username">Username<span>*</span></label>
                                        <input id="username" name="username" type="text" placeholder="" value="<?php echo $info['username']; ?>">
                                    </div>
                                </div>
                                <div class="col-401 field">
                                    <div class="form-group">
                                        <fieldset>
                                            <legend>Password change</legend>
                                            <p>
                                                <label for="password_current">Current password (leave blank to leave unchanged)</label>
                                                <span class="password-input">
                                                    <input id="password_current" name="password_current" type="password" placeholder="">
                                                </span>
                                            </p>
                                            <p>
                                                <label for="password_1">New password (leave blank to leave unchanged)</label>
                                                <span class="password-input">
                                                    <input id="password_1" name="password_1" type="password" placeholder="">
                                                </span>
                                            </p>
                                            <p>
                                                <label for="password_2">Confirm new password</label>
                                                <span class="password-input">
                                                    <input id="password_2" name="password_2" type="password" placeholder="">
                                                </span>
                                            </p>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <button type="submit" class="button" name="save_account_details" value="Save changes">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="paneltbs panel-5" id="wishlist" style="display: none;">
                        <table class="shopping-cart">
                            <thead>
                                <tr class="main-heading">
                                    <th class="text-center" style="padding-left: 1.5rem;padding-right: 1.5rem"><i class="ti-trash remove-icon"></i></th>
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">UNIT PRICE</th>
                                    <th class="text-center">STOCK STATUS</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="action" data-title="Remove"><a href="#" id="remove-product"><i class="ti-trash remove-icon"></i></a></td>
                                    <td class="image" data-title="No"><img src="images/items/item1.jpg" alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="#">Women Dress</a></p>
                                        <p class="product-des">Maboriosam in a tonto nesciung eget distingy magndapibus.</p>
                                    </td>
                                    <td class="prix" data-title="Price"><span>$<span class="unit-price">110</span></span>
                                    </td>
                                    <td class="stock-status" data-title="Status">
                                        <span>In Stock</span>
                                    </td>
                                    <td class="add-card" data-title="Add To Card">
                                        <a href="#" title="Add To Cart" class="add-cart">Add To Cart<i class="fa fa-shopping-cart"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="paneltbs panel-6" id="logout" style="display: none;">
                        <h3>Logout</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End Dashboard -->

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
