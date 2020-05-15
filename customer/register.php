<?php
    
    include 'includes/session.php';
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }

    //define variables and set to empty values

    $fname=$lname=$email=$fullname=$username=$address=$pass=$repass=$gender=$number="";

    $repassErr=$emailInsErr=$username_Err="";

        
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    //Check if user coming from HTTP Post REQUEST

    if ($_SERVER['REQUEST_METHOD']=='POST'){
    
        $typeidString=$_POST['typeid'];
        $fname=test_input($_POST['firstname']);
        $lname=test_input($_POST['lastname']);
        $email=test_input($_POST['email']);
        $pass=$_POST['password'];
        $repass=$_POST['repassword'];
        $address=test_input($_POST['address']);
        $number=test_input($_POST['number']);
        $gender=$_POST['gender'];
        
        // Validate email
    
        // Prepare a select statement
        $stmt=$db->prepare('SELECT email from users where email=?');
        $stmt->bindValue(1, $email);
        $stmt->execute();
        $count=$stmt->rowCount();

        //If count>0 this mean the DataBase contain Record about this email

        if ($count>0){  
            $emailInsErr="Email Already Taken!";
        }

        // Close statement
        
        unset($stmt);
        
        $fullname = $fname.' '.$lname;
        
        //generate a username from Full name
        function generate_username($string_name="New User", $rand_no){
            global $db;
            while(true) {
        		$username_parts = array_filter(explode(" ", strtolower($string_name))); //explode and lowercase name
        		$username_parts = array_slice($username_parts, 0, 2); //return only first two arry part
        	
        		$part1 = (!empty($username_parts[0]))?substr($username_parts[0], 0,8):""; //cut first name to 8 letters
        		$part2 = (!empty($username_parts[1]))?substr($username_parts[1], 0,5):""; //cut second name to 5 letters
        		$part3 = ($rand_no)?rand(0, $rand_no):"";
        		
        		$user_name = $part1. str_shuffle($part2). $part3; //str_shuffle to randomly shuffle all characters 
        		
                $stmt=$db->prepare('SELECT email from users where username=?');
                $stmt->bindValue(1, $user_name);
                $stmt->execute();
                $count=$stmt->rowCount();
                
                if ($count==0){
                    return $user_name;
                }
            }
        }
        $username = generate_username($fullname, 200);
   
        // Validate confirm password

        if($pass != $repass){
            $repassErr = "Password didn't match.";
         }


        //Insert into DataBase
        
        if (empty($emailInsErr) && empty($repassErr)){

            $salt="^%r8yuyg";//create our salt; salt is special String added to password // way of encrption on database;
            $pass = sha1(filter_var($pass.$salt, FILTER_SANITIZE_STRING));// sha1 function to transform the password into long String; known as hashing method;
            $sql="insert into users (username,email,password,type,firstname,lastname,address,contact_info,gender) values(?,?,?,?,?,?,?,?,?)";
            $stmt = $db->prepare($sql);
            if ($typeidString=="Seller") {
                $typeid=2;
            }
            else if ($typeidString=="Buyer"){
                $typeid=3;
            }
            else {
                $typeid=4;
            }
            //Gender
            if ($gender=="Male") {
                $gender=2;
            }
            else if ($gender=="Female"){
                $gender=3;
            }
            else {
                $gender=4;
            }
            
            $stmt->bindValue(1,$username);
            $stmt->bindValue(2,$email);
            $stmt->bindValue(3,$pass);
            $stmt->bindValue(4,$typeid);
            $stmt->bindValue(5,$fname);
            $stmt->bindValue(6,$lname);
            $stmt->bindValue(7,$address);
            $stmt->bindValue(8,$number);
            $stmt->bindValue(9,$gender);
           
            
            $stmt->execute();
            
            
        
         // Close statement
            
            unset($stmt);
            
            
        $stmt = $db->query("SELECT `id` FROM `users` WHERE `email` = '$email'");
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
         
        // Store data in session variables
                            
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id['id'];
            $_SESSION["email"] = $email;
            $_SESSION["username"]=$username;
            
        //Redirect to user Dashborad
            header('location:dashboarduser.php');
            
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register | ShopMeex Online Store</title>
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
                            <a href="../index.php">
                                <img src="images/Logo-header.png" class="logo">
                            </a>
                        </div>

                        <div class="search-bar">
                            <form>
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
                                    <a href="cart.php" class="widget-header1" id="icone-carte">
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
                                                        <a href="../cart.php" class="forward-cart">View cart</a>
                                                        <a href="../checkout.php" class="forward-checkout">Checkout</a>
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

    <!-- Start Account -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="wrapper">
                <div class="col-35">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.html">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="register.html">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="my-account">
        <div class="container">
            <div class="wrapper" style="overflow: hidden;">
                <div class="section-title">
                    <h2>My Account</h2>
                    <p style="font-size: 14px;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered lebmid alteration in some ledmid form</p>
                </div>
                <div class="row">
                    <div class="col-50">
                        <div class="title-box">
                            <h2>Register</h2>
                        </div>
                        <form action="register.php" method="post">
                            <div class="form-group" style="display: flex;align-items: center;">
                                <label style="margin-right: 1.5rem;">I am a:<span>*</span></label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input"  type="radio" name="typeid" value="Buyer" required="">
                                    <i class="custom-control-label"> Buyer </i>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="typeid" value="Seller" required="">
                                    <i class="custom-control-label"> Seller </i>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="typeid" value="Both" required="">
                                    <i class="custom-control-label"> Both </i>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="fname">First Name<span>*</span></label>
                                        <input id="fname" name="firstname" type="text" placeholder="First Name" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>" required pattern="[a-zA-Z\s]+">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span>*</span></label>
                                        <input name="lastname" type="text" placeholder="Last Name" id="lname" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>" required pattern="[a-zA-Z\s]+" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail<span>*</span></label>
                                <input name="email" type="email" placeholder="ex. name@mail.com" id="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" required >
                                <?php echo "<p class=error>$emailInsErr</p>"; ?>
                            </div>
                            <div class="row">
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="pass">Password<span>*</span></label>
                                        <input id="pass" name="password" type="password" placeholder="Password" required>
                                        <?php echo "<p class=error-form>$repassErr</p>"; ?>
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="repass">Repeat Password<span>*</span></label>
                                        <input name="repassword" type="password" placeholder="Repeat Password" id="repass" required>

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label for="addresss">Address<span>*</span></label>
                                <input name="address" type="text" placeholder="Address" id="addresss" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number<span>*</span></label>
                                <input name="number" type="tel" placeholder="Phone number" id="phone" value="<?php if (isset($_POST['number'])) echo $_POST['number']; ?>" pattern="[0-9]*" required>
                            </div>

                            <div class="form-group" style="display: flex;align-items: center;">
                                <label style="margin-right: 1.5rem;">Gender:<span>*</span></label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input"  type="radio" name="gender" value="Male" required="">
                                    <i class="custom-control-label"> Male </i>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="gender" value="Female" required="">
                                    <i class="custom-control-label"> Female </i>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="gender" value="Other" required="">
                                    <i class="custom-control-label"> Other </i>
                                </label>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="check2" class="float-left custom-control custom-checkbox">
                                    <input id="check2" type="checkbox" class="custom-control-input" value="agree" required>
                                    <div class="custom-control-label"> I agree with <a target="_blank" href="conditions.php">Terms & Conditions</a></div>
                                </label>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn">Register</button>
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
