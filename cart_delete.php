<?php
	include 'includes/session.php';

	
	$output = array('error'=>false);
	$id = $_POST['id'];

	if(isset($_SESSION['id'])){
		try{
			$stmt = $db->prepare("DELETE FROM cart WHERE id=:id");
			$stmt->execute(['id'=>$id]);
			$output['message'] = 'Deleted';
			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['productid'] == $id){
				unset($_SESSION['cart'][$key]);
				$output['message'] = 'Deleted';
			}
		}
	}

	$db=null;
	echo json_encode($output);

?>