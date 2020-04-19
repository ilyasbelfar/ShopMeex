<?php
	include 'includes/session.php';

	if(isset($_SESSION['id'])){
		

		$stmt = $db->prepare("SELECT * , cart.quantity As cq FROM cart LEFT JOIN products on products.id=cart.product_id WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$user['id']]);

		$total = 0;
		foreach($stmt as $row){
			$subtotal = $row['price'] * $row['cq'];
			$total += $subtotal;
		}
	}

	if(isset($_SESSION['cart'])){
		$total=0;
		foreach($_SESSION['cart'] as $row){
                $stmt = $db->prepare("SELECT * FROM products WHERE id=:prodid");
                $stmt->execute(['prodid'=>$row['productid']]);
                $product= $stmt->fetch();
                $subtotal = $product['price'] * $row['quantity'];
				$total += $subtotal;

                
            }
	}	
		

	




		$db=null;
		echo json_encode($total);
	
?>