<?php
	include 'includes/session.php';

	

	$output = array('error'=>false);

	$id = $_POST['id'];
	if(isset($_POST['quantity'])){
		$quantity = $_POST['quantity'];
	}
	else{
		$quantity=1;
	}
	



	if(isset($_SESSION['id'])){

		$stmt = $db->prepare("SELECT *, COUNT(*) AS numrows , cart.quantity AS cq FROM cart WHERE user_id=:user_id AND product_id=:product_id");
		$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				
				$stmt = $db->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id, 'quantity'=>$quantity]);
				$output['message'] = 'Item added to cart';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}

		elseif ($row['numrows']==1 && $row['cq']!=$quantity) {

			try{
				
				$stmt = $db->prepare("UPDATE cart SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id ");
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id, 'quantity'=>$quantity]);
				
				$output['message'] = 'quanity have been updated';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}

				
			
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['productid']);
		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = 'Product already in cart [to update quanity you have to singin]';
		}
		else{
			$data['productid'] = $id;
			$data['quantity'] = $quantity;

			if(array_push($_SESSION['cart'], $data)){
				$output['message'] = 'Item added to cart';
			}
			else{
				$output['error'] = true;
				$output['message'] = 'Cannot add item to cart';
			}
		}

	}
	
	$db=null;
	echo json_encode($output);

?>