<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="../FontAwesome/css/all.css">
    <script src="js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
    <link rel="stylesheet" type="text/css" href="../FontAwesome/css/themify.css">
    <link rel="stylesheet" type="text/css" href="css/reapeatingStyle.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="css/color/color.css">
    <script type="text/javascript" src="js/dist/Chart.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
     <style>
    @font-face {
    font-family : themify;
    src : url(fonts/themify/themify.eot);
    src : url(fonts/themify/themify.eot?#iefix) format('embedded-opentype'),
          url(fonts/themify/themify.woff) format('woff'),
          url(fonts/themify/themify.ttf) format('truetype');
         }
    </style>
</head>
   
<body>
<!--
	<script type="text/javascript">
		window.addEventListener('load', () => {
			const loader = document.getElementById('loader');
			setTimeout(() => {
				loader.classList.add('fadeOut');
			}, 300);
		});
	</script>
-->
    <div>
        <?php
            include 'includes/sidebar.php';
        ?>
        <div class="content">  
            <?php
            include 'includes/topbar.php';
            ?>
            <main class="main-content"> 
                <div class="main-content">
                    <div class="user-content">
                        <div class="tit flex">
                            <h1>users</h1>
                            <ul class="nav flex">
                                <li><i class="fa fa-chevron-up"></i>
                                </li>
                                <li><i class="fa fa-wrench"></i></li>
                                <li><i class="fa fa-trash"></i></li>
                                <li><i class="fa fa-plus"></i></li>
                            </ul>
                        </div>
                        <div class="user-table-head flex">
                            <div class="table-length">
                                <label>Show 
                                    <select name="dataTable_length" aria-controls="dataTable" class="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> 
                                </label>
                            </div>
                            <div class="table-search">
                                <label>Search:<input type="search" class="" placeholder="" aria-controls="dataTable"></label>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr role="row">
                                     <th style="width: 200px;">Email</th>
                                      <th style="width: 150px">Name</th>
                                      <th style="width: 150px;">Status</th>
                                      <th style="width: 150px;">Date Added</th>
                                      <th style="width: 150px;" >Tools</th>
                            </tr></thead>
                            <tbody>
                                <tr role="row" class="odd">
                                    <td >hfhfhf</td>
                                    <td>kfjfkjf</td>
                                    <td>fqljfkf</td>
                                    <td>15/15/5552</td>
                                    <td>kqfjkhqj</td>
                                    </tr>
                                <tr role="row" class="even">
                                    <td >hfhfhf</td>
                                    <td>kfjfkjf</td>
                                    <td>fqljfkf</td>
                                    <td>15/15/5552</td>
                                    <td>kqfjkhqj</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div> 
                    <div class="change row hide">
                    <div class="col-50">
                        <div class="title-box">
                            <h2>change</h2>
                        </div>
                        <form action="register.php" method="post">
                            <div class="form-group" style="display: flex;align-items: center;">
                                <label style="margin-right: 1.5rem;">change to:<span>*</span></label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="typeid" value="Buyer" required="">
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
                                        <input id="fname" name="firstname" type="text" placeholder="First Name" value="" required="" pattern="[a-zA-Z\s]+" data-text="First Name">
                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="lname">Last Name<span>*</span></label>
                                        <input name="lastname" type="text" placeholder="Last Name" id="lname" value="" required="" pattern="[a-zA-Z\s]+" data-text="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail<span>*</span></label>
                                <input name="email" type="email" placeholder="ex. name@mail.com" id="email" value="" required="" data-text="ex. name@mail.com" style="color: red; border: 1px solid red;">
                                                            </div>
                            <div class="row">
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="pass">Password<span>*</span></label>
                                        <input id="pass" name="password" type="password" placeholder="Password" required="" data-text="Password">
                                        <p class="error-form"></p>                                    </div>
                                </div>
                                <div class="col-401">
                                    <div class="form-group">
                                        <label for="repass">Repeat Password<span>*</span></label>
                                        <input name="repassword" type="password" placeholder="Repeat Password" id="repass" required="" data-text="Repeat Password">

                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group">
                                <label for="addresss">Address<span>*</span></label>
                                <input name="address" type="text" placeholder="Address" id="addresss" value="" required="">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number<span>*</span></label>
                                <input name="number" type="tel" placeholder="Phone number" id="phone" value="" pattern="[0-9]*" required="">
                            </div>

                            <div class="form-group" style="display: flex;align-items: center;">
                                <label style="margin-right: 1.5rem;">Gender:<span>*</span></label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" type="radio" name="gender" value="Male" required="">
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
                                    <input id="check2" type="checkbox" class="custom-control-input" value="agree" required="">
                                    <div class="custom-control-label"> I agree with <a target="_blank" href="conditions.php">Terms &amp; Conditions</a></div>
                                </label>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn" style="width: 100%;
    text-align: center;pointer-events: none; opacity: 0.5; cursor: not-allowed; user-select: none;">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </main>
        </div>
    </div>
     

    
        
    
    
    
    <script> 
       

        
        
    </script>
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/dist/Chart.js"></script>
    <script type="text/javascript" src="js/user.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    

</body>
</html>