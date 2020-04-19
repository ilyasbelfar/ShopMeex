<?php
		

		include 'includes/session.php';
		$product=$_SESSION['prodid'];
		$output = array('list'=>'');

		try{
		$stmt=$db->prepare("SELECT * , rating*20 as ratper from review left join users on review.user_id=users.id  WHERE product_id=:prodid ORDER BY review.id DESC  ");
        $stmt->execute(['prodid'=>$product]);
        $reviews = $stmt->fetchAll();

        $output['count']= $stmt->rowCount();


			foreach ($reviews as $row) {    
                                                    
			$output['list'] .=	"<li id='li-comment-11'>
                                <div id='comment-11' class='comment_container'>
                                    <img alt='' src='images/users/".$row['photo']."' srcset='
                                    images/users/".$row['photo']."' class='avatar avatar-60 photo' height='60' width='60'>
                                    <div class='clearfix'></div>
                                    <div class='comment-text'>
                                        <div class='star-rating' aria-label='Rated 4 out of 5'>
                                            <span style='width:".$row['ratper']."%'>Rated <strong class='rating'>4</strong> out of 5</span>
                                            <div class='clearfix'></div>
                                        </div>
                                        <p class='meta'>
                                            <strong class='review__author'>".$row['firstname']." ".$row['lastname']." </strong>
                                            <span class='review__dash'>–</span>
                                            <time class='review__published-date' datetime='2020-05-10T14:02:51+01:00'>".$row['date']."</time>
                                        </p>

                                        <div class='description'>
                                            <p>".$row['comment']."</p>
                                        </div>
                                    </div>
                                </div>
                            </li>  " ;
                        }
              
    	}
    	catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
        $db=null;
		echo json_encode($output);
		?>
