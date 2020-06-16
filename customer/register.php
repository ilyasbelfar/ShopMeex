<?php
    
    include 'includes/session.php';
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: ../index.php");
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
            $_SESSION["type"] = $typeid;
            $_SESSION["email"] = $email;
            $_SESSION["username"]=$username;
            
        //Redirect to Dashborad
            if($typeid==3){
             header('location:buyer-dashboard.php');
            }
            else if ($typeid==1){
                header('location:../admin');
            }
            else 
            {
                header('location:../seller-dashboard.php');
            }

            
        
            }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register | ShopMeex Online Store</title>
    <?php include 'includes/header.php'; ?>
        <!-- End Header -->

    <!-- Start Account -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="wrapper">
                <div class="col-35">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="../index.php">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="register.php">Register</a></li>
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

   <?php include 'includes/footer.php'; ?>

    <div class="gototop">
        <a href="#" class="gotop"><i class="fa fa-arrow-up"></i></a>
    </div>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/TweenMax.min.js"></script>
    <script src="../js/jquery.nice-select.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="https://kit.fontawesome.com/5d49be4ed0.js" crossorigin="anonymous"></script>
</body>

</html>
