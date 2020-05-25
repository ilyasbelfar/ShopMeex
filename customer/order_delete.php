<?php
	include 'includes/session.php';

	
	$output = array('error'=>false);
	$id = $_POST['id'];

	if(isset($_SESSION['id'])){
		try{
			$stmt = $db->prepare("DELETE FROM orders WHERE product_id=:id");
			$stmt->execute(['id'=>$id]);
			$output['message'] = 'Deleted from orders';
			
		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();

		}
	}
	

	$db=null;
	echo json_encode($output);

?>