<?php
	include 'includes/session.php';

	

	$output = array('error'=>false);

	$id = $_POST['id'];
	
	



	if(isset($_SESSION['id'])){
		$stmt = $db->prepare("SELECT *, COUNT(*) AS numrows FROM wishlist WHERE user_id=:user_id AND product_id=:product_id");
		$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
			try{
				$stmt = $db->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (:user_id, :product_id)" );
				$stmt->execute(['user_id'=>$user['id'], 'product_id'=>$id]);
				$output['message'] = 'Item added to  wishlist';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Product already in wishlist';
		}
	}
	else{
		$output['message']='You need to login to add items to your wishlist';
	}
	
	
	$db=null;
	echo json_encode($output);

?>