<?php

 include 'includes/session.php';

		if(isset($_SESSION['id'])){

            $rating=$_POST['rating'];
            $comment=$_POST['comment'];
            $userid=$user['id'];
            $productid=$_POST['prodid'];
            $now = date('Y-m-d');
            $output = array('error'=>false);
            try{
           		 $stmt=$db->prepare("SELECT id FROM review WHERE product_id=:prodid AND user_id=:usid    ");
           		 $stmt->execute(['prodid'=>$productid,'usid'=>$userid]);

           		 if ($stmt->rowCount()==0){
            		$stmt=$db->prepare("insert into review (rating,comment,user_id,date,product_id) values(?,?,?,?,?)");
           			$stmt->execute([$rating,$comment,$userid,$now,$productid]);
           			$output['message'] = 'your review is been published';
                $output['error']=false;
      			}
      			else{
      				$output['message']="sorry,you already wrote a review";
      			}
      		}
      		catch(PDOException $e){
				
				$output['message'] = $e->getMessage();
			}
		}
	else {
		$output['message']='you need to login to write a review';
	}
  $db=null;
	echo json_encode($output)
?>        