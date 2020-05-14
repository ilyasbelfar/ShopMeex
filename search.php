<?php //include 'includes/session.php'; >
include 'includes/conn.php';?>
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
			<link rel="stylesheet" type="text/css" href="css/color/color.css">
            <script src="js/jquery-3.4.1.min.js"></script>
            <link rel="stylesheet" type="text/css" href="FontAwesome/css/themify.css">
            <link rel="stylesheet" type="text/css" href="css/reapeatingStyle.css">
            <link rel="stylesheet" type="text/css" href="css/popup.css">
            <style>
            @font-face {
            font-family : themify;
            src : url(fonts/themify/themify.eot);
            src : url(fonts/themify/themify.eot?#iefix) format('embedded-opentype'),
                  url(fonts/themify/themify.woff) format('woff'),
                  url(fonts/themify/themify.ttf) format('truetype');
            </style>
		</head>



<body class="product-area negop">
<div class="maincontainer">

	
	 
	  <div class="wrapper flex">
	    <div class="product-view flextroisquart">

	      <!-- Main content -->
	      <section class="wrapper">
	        <div class="top-row">
	        	<div class="container-top-row flex">
	            <?php
	            
	       			$conn = $pdo->open();
	       			if (isset($_POST['keyword'])) {

	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword");
	       			$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '<h1 class="page-header">No results found for <i>'.$_POST['keyword'].'</i></h1>';
	       			}
	       			else{
	       				echo '<h1 class="page-header">Search results for <i>'.$_POST['keyword'].'</i></h1>';
		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
						    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
					 
						    foreach ($stmt as $row) {
						    	$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
						    	$image = (!empty($row['photo'])) ? 'images/items/'.$row['photo'] : 'images/Logo.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='container-top-row flex'>
	       								<div class='list-view flex marginbottom'>
		       								<div class='container'>
		       									<img src='".$image."' width='100%' height='230px' class='product-image flexquart'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$highlighted."</a></h5>
		       								</div>
		       								<div class='container-top-row flex'>
		       									<b>&#36; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='container-top-row flex'></div><div class='container-top-row flex'></div></div>"; 
							if($inc == 2) echo "<div class='container-top-row flex'></div></div>";
							
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}
					}}


					$pdo->close();
				

	       		?> 
	        	</div>
	        	<div class="col-sm-3">
	        		
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	
</div>


</body>
</html>