<?php
	include 'includes/connect.php';
	session_start();



	if(isset($_SESSION['id'])){
	

		try{
			$stmt = $db->prepare("SELECT * FROM users WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['id']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}
	}
?>
	