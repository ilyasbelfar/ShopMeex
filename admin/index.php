<!DOCTYPE html>
<?php 
session_start();  
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./table.php"; 

?>
 

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
		<div class="sidebar">
			<div class="sidebar-container"> .
				<div class="sidebar-logo">
					<div class="peers flex flexnowrap">
						<div class="peer ">
							<a class="sidebar-link" href="#">
								<div class="peers1 flex">
									<div class="peer1">  
										<div class="logo">
											<img width="40px" height="40px" src="images/Logo-header.png" alt="">
										</div>
									</div>
									<div class="title flex">
										<h5 class="logo-text">Administrator</h5>
									</div>
								</div>
							</a>
						</div>
                        <div class="peer2">
                            <div class="mobile-toggle">
                                    <a href="#">
                                        <i class="ti-arrow-circle-left ">
                                            
                                        </i>
                                    </a>
                            </div>
                        </div>
					</div>
				</div>
                <ul class="sidebar-menu scrollable pos-r ps ps--active-y">
    					<li class="nav-item mT-30 active">
    						<a class="sidebar-link <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
    							<span class="icon-holder">
    								<i class="c-blue-500 ti-home"></i> 
    							</span>
    							<span class="title">Dashboard
    							</span>
    						</a>
    					</li>
    					<li class="nav-item">
    						<a class="sidebar-link" href="#">
    							<span class="icon-holder">
    								<i class="c-brown-500 ti-email">
    								</i> 
    							</span>
    							<span class="title">Email</span>
    						</a>
    					</li>
    					<li class="nav-item">
    						<a class="sidebar-link" href="#">
    							<span class="icon-holder">
    								<i class="c-blue-500 ti-share">
    									
    								</i> 
    							</span>
    							<span class="title">Compose</span>
    						</a>
    					</li>
    					<li class="nav-item">
    						<a class="sidebar-link" href="#">
    							<span class="icon-holder">
    								<i class="c-deep-orange-500 ti-calendar"></i> 
    							</span>
    							<span class="title">Calendar</span>
    						</a>
    					</li>
    					<li class="nav-item">
    						<a class="sidebar-link" href="#">
    							<span class="icon-holder">
    								<i class="c-deep-purple-500 ti-comment-alt"></i> 
    							</span>
    							<span class="title">Chat</span>
    						</a>
    					</li>
    					<li class="nav-item">
    						<a class="sidebar-link" href="#">
    							<span class="icon-holder">
                                    <i class="c-indigo-500 ti-bar-chart">
    								</i> 
                                </span>
                                <span class="title">Charts</span>
    						</a>
    					</li>
    					<li class="nav-item">
    						<a class="sidebar-link" href="#">
    							<span class="icon-holder">
    								<i class="c-light-blue-500 ti-pencil">
    								</i> 
    							</span>
    							<span class="title">Forms
    							</span>
    						</a>
    					</li>
    					<li class="nav-item dropdown">
    						<a class="sidebar-link" href="#">
    							<span class="icon-holder">
    								<i class="c-pink-500 ti-palette">
    								</i> 
    							</span>
    							<span class="title">UI Elements</span>
    						</a>
    					</li>
    					<li class="nav-item dropdown">
    						<a class="dropdown-toggle" href="javascript:void(0);">
    							<span class="icon-holder">
    								<i class="c-orange-500 ti-layout-list-thumb">
    									
    								</i> 
    							</span>
    							<span class="title">Tables</span> 
    							<span class="arrow">
    								<i class="ti-angle-right"></i>
    							</span>
    						</a>
    						<ul class="dropdown-menu hiding">
    							<li><a class="sidebar-link" href="#">Basic Table</a>
    							</li>
    							<li>
    								<a class="sidebar-link" href="#">Data Table</a>
    							</li>
    						</ul>
    					</li>
    					<li class="nav-item dropdown">
    						<a class="dropdown-toggle" href="javascript:void(0);">
    							<span class="icon-holder"><i class="c-purple-500 ti-map"></i> 
    							</span>
    							<span class="title">Maps
    							</span> 
    							<span class="arrow"><i class="ti-angle-right"></i>
    							</span>
    						</a>
    						<ul class="dropdown-menu hiding">
    							<li><a href="#">Google Map</a>
    							</li>
    							<li><a href="#">Vector Map</a>
    							</li>
    						</ul>
    					</li>
    					<li class="nav-item dropdown">
    						<a class="dropdown-toggle" href="javascript:void(0);">
    							<span class="icon-holder"><i class="c-red-500 ti-files"></i> 
    							</span>
    							<span class="title">Pages</span> 
    							<span class="arrow"><i class="ti-angle-right"></i></span>
    						</a>
    						<ul class="dropdown-menu hiding">
    							<li><a class="sidebar-link" href="#">404</a>
    							</li>
    							<li><a class="sidebar-link" href="#">500</a>
    							</li>
    							<li><a class="sidebar-link" href="#">Sign In</a>
    							</li>
    							<li><a class="sidebar-link" href="#">Sign Up</a>
    							</li>
    						</ul>
    					</li>
    					<li class="nav-item dropdown">
    						<a class="dropdown-toggle" href="javascript:void(0);">
    							<span class="icon-holder"><i class="c-teal-500 ti-view-list-alt"></i> 
    							</span>
    							<span class="title">Multiple Levels</span> 
    							<span class="arrow"><i class="ti-angle-right"></i></span>
    						</a>
    						<ul class="dropdown-menu hiding">
    							<li class="nav-item dropdown">
    								<a href="javascript:void(0);">
    								<span>Menu Item</span></a>
    							</li>
    							<li class="nav-item dropdown">
    								<a href="javascript:void(0);"><span>Menu Item</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
    								<ul class="dropdown-menu hiding">
    									<li>
    										<a href="javascript:void(0);">Menu Item</a>
    									</li>
    									<li><a href="javascript:void(0);">Menu Item</a>
    									</li>
    								</ul>
    							</li>
    						</ul>
    					</li>
                    
                </ul>
            </div>
            </div>
            
            <div class="content">        
                <div class="header flex">
                    <div class="header-container">
                        <ul class="nav-left">
                            <li>
                                <a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);">
                                    <i class="ti-menu"></i>
                                </a>
                            </li>
                            <li class="search-box">
                                <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                                    <i class="search-icon ti-search pdd-right-10"></i> 
                                    <i class="search-icon-close ti-close pdd-right-10 hiding">
                                        
                                    </i>
                                </a>
                            </li>
                            <li class="search-input hiding">
                                <input class="form-control" type="text" placeholder="Search...">
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="notifications dropdown">
                                <span class="counter bg-pink">3</span> 
                                <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown">
                                    <i class="ti-bell">
                                        
                                    </i>
                                </a>
                                <ul class="dropdown-menu">
                                    
                                </ul>
                            </li>
                            <li class="notifications dropdown">
                                <span class="counter bg-pink">3</span> 
                                <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown">
                                    <i class="ti-email"></i>
                                </a>
                                <ul class="dropdown-menu">
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                                     <div class="peer "><img class="" src="images/avata/1.jpj" alt="">
                                        </div>
                                   <div class="peer"><span class="">mohamed</span>
                                  </div>
                               </a>
                               <!-- <ul class="dropdown-menu">
                                <li><a href="#" class=""><i class="ti-settings mR-10"></i> <span>Setting</span></a>
                                </li>
                                <li><a href="#" class=""><i class="#"></i> <span>Profile</span></a>
                                </li>
                                <li><a href="#" class=""><i class="ti-email mR-10"></i> <span>Messages</span></a>
                                </li>
                                <li role="separator" class="divider">
                                </li>
                                <li><a href="#" class="#"><i class=""></i> <span>Logout</span></a>
                                </li>
                                </ul> -->
                            </li>
                        </ul>
                    </div>
                </div>
                <main class="main-content">
                <div class="main-content">
                    <div class="row row1 ">
    							<div class="row">
    								<div class="row-content">
                                        <div class="layers">
    										<div class="layer">											
                                                <h6 class="title">Total Visits</h6>
    										</div>
    										<div class="layer">
    											<div class="peers ">
    												<div class="peer">
                                                        <canvas id="app-sale1" height="20" width="55"></canvas>
    												</div>
    												<div class="peer">
    													<span class="info">+10%</span>
    												</div>
    											</div>
    										</div>
    									</div>
    								</div>
    								<div class="row-content">
                                        <div class="layers">
    										<div class="layer">											
                                                <h6 class="title">Total Visits</h6>
    										</div>
    										<div class="layer">
    											<div class="peers ">
    												<div class="peer">
                                                        <canvas id="app-sale2" height="20" width="55"></canvas>
    												</div>
    												<div class="peer">
    													<span class="info">+10%</span>
    												</div>
    											</div>
    										</div>
    									</div>
    								</div>
                                    <div class="row-content">
                                        <div class="layers">
    										<div class="layer">											
                                                <h6 class="title">Total Visits</h6>
    										</div>
    										<div class="layer">
    											<div class="peers ">
    												<div class="peer">
                                                        <canvas id="app-sale3" height="20" width="55"></canvas>
    												</div>
    												<div class="peer">
    													<span class="info">+10%</span>
    												</div>
    											</div>
    										</div>
    									</div>
    								</div>
                                    <div class="row-content">
                                        <div class="layers">
    										<div class="layer">											
                                                <h6 class="title">Total Visits</h6>
    										</div>
    										<div class="layer">
    											<div class="peers ">
    												<div class="peer">
                                                        <canvas id="app-sale4" height="20" width="55"></canvas>
    												</div>
    												<div class="peer">
    													<span class="info">+10%</span>
    												</div>
    											</div>
    										</div>
    									</div>
    								</div>
                    </div>
    					</div>               
    							
    						</div>
    					</div>
              <div class="row2 ">
              <h2>Other Admins</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="admin_list">
            
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<script type="text/javascript" src="./js/admin.js"></script>
                       
