<?php
	include 'includes/session.php';
	

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['id'])){
		try{
			$stmt = $db->prepare("SELECT *, cart.quantity AS cq , cart.id As cartid FROM cart LEFT JOIN products ON products.id=cart.product_id	 WHERE user_id=:user_id");
			$stmt->execute(['user_id'=>$user['id']]);
			$output['count']=$stmt->rowCount();
			$cmp=0;
			foreach($stmt as $row){
				
				$cmp++;
				if ($cmp>5){
					break;
				}
				
				$output['list'] .= "
					<li class='product-item'>

                      

                        <button type='button' data-id='".$row['cartid']."' class='remove-item-button' ></button>

                        <a href='product.php?product=".$row['slug']."' class='item-details'>
                       	<img width='300' height='300' src='images/items/".$row['photo']."' class='attachment-woocommerce_thumbnail size-woocommerce_thumbnail' alt='' srcset='images/items/".$row['photo']."' sizes='(max-width: 300px) 100vw, 300px'>".$row['name']."
                        </a>
                        <div class='clearfix'></div>    
                        <span class='quantitys'>".$row['cq']."× <span>$<span class='total-amount'>".number_format($row['price'], 2)."</span></span></span>   

                    </li>
                    <div class='seperator-line'></div>";






















			}
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		if(empty($_SESSION['cart'])){
			$output['count'] = 0;
		}
		else{
			foreach($_SESSION['cart'] as $row){
				$output['count']++;
				$stmt = $db->prepare("SELECT * from products WHERE  id=:id");
				$stmt->execute(['id'=>$row['productid']]);
				$product = $stmt->fetch();
				
				if($output['count'] <6 ){
				$output['list'] .= " 

				<li class='product-item'>
                       
                        <button type='button' data-id='".$row['productid']."' class='remove-item-button' ></button>

						<a href='product.php?product=".$product['slug']."' class='item-details'>
                       	<img width='300' height='300' src='images/items/".$product['photo']."' class='attachment-woocommerce_thumbnail size-woocommerce_thumbnail' alt='' srcset='images/items/".$product['photo']."' sizes='(max-width: 300px) 100vw, 300px'>".$product['name']."
                        </a>
                        <div class='clearfix'></div>    
                        <span class='quantitys'> ".$row['quantity']."× <span>$<span class='total-amount'>".$product['price']." </span></span></span>    
                </li>
				<div class='seperator-line'></div>
				"  ;}
				
			}
		}
	}

	$db=null;
	echo json_encode($output);

?>
