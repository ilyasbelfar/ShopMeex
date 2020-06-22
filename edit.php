<?php

include 'includes/session.php';

$pageTitle = '';
$breadcrumbSlug = '';
$breadcrumbName = '';

if (isset($_GET['post_type'])) {
    if ($_GET['post_type'] == 'product') {
        $pageTitle = 'Products';
        $breadcrumbSlug = 'edit.php?post_type=product';
        $breadcrumbName = 'Products';
    } elseif ($_GET['post_type'] == 'order') {
        $pageTitle = 'Orders';
        $breadcrumbSlug = 'edit.php?post_type=order';
        $breadcrumbName = 'Orders';
    } elseif ($_GET['post_type'] == 'review') {
        $pageTitle = 'Reviews';
        $breadcrumbSlug = 'edit.php?post_type=review';
        $breadcrumbName = 'Reviews';
    } elseif($_GET['post_type'] == 'coupon') {
        $pageTitle = 'Coupons';
        $breadcrumbSlug = 'edit.php?post_type=coupon';
        $breadcrumbName = 'Coupons';
    }
} else {
    $pageTitle = 'Products';
    $breadcrumbSlug = 'edit.php?post_type=product';
    $breadcrumbName = 'Products';
}

$prodEditErrors = '';

include 'pre-seller-panel.php';

if (isset($_GET['p'])) {
            $pagenum = $_GET['p'];
        } else {
            $pagenum = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pagenum-1) * $no_of_records_per_page;

if (isset($_POST['save']))
{

    $product_id = $_POST['prod_id'];
    $product_title = $_POST['prod_name'];
    $product_slug = $_POST['prod_slug'];
    $product_cat = $_POST['prod_cat'];
    $product_inventory = $_POST['stock_status'];
    $product_price = $_POST['prod_price'];
    $product_description = $_POST['prod_desc'];

    // Validate Slug
    $stmt = $db->prepare('SELECT * from products where slug=?');
    $stmt->bindValue(1, $product_slug);
    $stmt->execute();
    $count = $stmt->rowCount();

    $cpt = 0;

    if ($count > 0)
    {
        foreach ($stmt as $row)
        {
            if ($row['id'] != $product_id)
            {
                $cpt += 1;
            }
        }
        if ($cpt != 0)
        {
            $prodEditErrors .= "<div class='errors' role='alert'><strong>Slug</strong>&nbsp;you have entered is already taken by another product!</div>";
        }
        else
        {
            $prodEditErrors = "";
        }
    }
    if ($cpt == 0)
    {
        try
        {
            $sql = $db->prepare('UPDATE products SET category_id=?, name=?, description=?, price=?, slug=?, quantity=? WHERE id=?');
            $sql->bindValue(1, $product_cat);
            $sql->bindValue(2, $product_title);
            $sql->bindValue(3, $product_description);
            $sql->bindValue(4, $product_price);
            $sql->bindValue(5, $product_slug);
            $sql->bindValue(6, $product_inventory);
            $sql->bindValue(7, $product_id);
            if($sql->execute()) {
                $prodEditErrors .= "<div class='message' role='alert'><strong>".$product_title."'s Infos</strong>&nbsp;has been updated!</div>";
            }
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    if (isset($_FILES['prod_pics']) && array_sum($_FILES['prod_pics']['error']) == 0) {
        if (count($_FILES['prod_pics']['name']) > 3) {
            $totalfiles = 3;
        } else {
            $totalfiles = count($_FILES['prod_pics']['name']);
        }

        $cpt_upload_success = 0;

        $target_dir = "images/items/";
        $picture = '';

        for($i=0; $i<$totalfiles; $i++) {
            switch ($i) {
                case 0:
                    $picture = 'photo';
                    break;

                case 1:
                    $picture = 'photo1';
                    break;

                case 2:
                    $picture = 'photo2';
                    break;
                
                default:
                    $picture = 'photo';
                    break;
            }
            $target_file = $target_dir . basename($_FILES["prod_pics"]["name"][$i]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["prod_pics"]["tmp_name"][$i]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $prodEditErrors.="<div class='message' role='alert'><strong>Sorry,</strong>&nbsp;".basename($_FILES["prod_pics"]["name"][$i])." is not an image!</div>";
                    $uploadOk = 0;
                }

            // Check if file already exists
                if (file_exists($target_file)) {
                    $prodEditErrors.="<div class='errors' role='alert'><strong>Sorry,</strong>&nbsp;".basename($_FILES["prod_pics"]["name"][$i])." already exists in our database!</div>";
                    $uploadOk = 0;
                }

            // Check file size
                if ($_FILES["prod_pics"]["size"][$i] > 2097152) {
                    $prodEditErrors.="<div class='message' role='alert'><strong>Sorry,</strong>&nbsp;try to upload image file(s) less than 2MB!</div>";
                    $uploadOk = 0;
                }

            // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "bmp") {
                    $prodEditErrors.="<div class='message' role='alert'><strong>Sorry,</strong>&nbsp;only JPG, JPEG, PNG, BMP & GIF files are allowed!</div>";
                    $uploadOk = 0;
                }

            // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                      $prodEditErrors.="<div class='errors' role='alert'><strong>".ucwords($product_title)."'s Picture</strong>&nbsp; was not updated!</div>";
                    // if everything is ok, try to upload file
                    } else {
                      if (move_uploaded_file($_FILES["prod_pics"]["tmp_name"][$i], $target_file)) {
                        try
                            {
                                $sql = $db->prepare("UPDATE products SET ".$picture."=? WHERE owner_id=? AND id=?");
                                $sql->bindValue(1, basename($_FILES["prod_pics"]["name"][$i]));
                                $sql->bindValue(2, $_SESSION['id']);
                                $sql->bindValue(3, $product_id);
                                if ($sql->execute()) {
                                    $cpt_upload_success+=1;
                                }
                            }
                            catch(PDOException $e)
                            {
                                echo "Error: " . $e->getMessage();
                            }
                      } else {
                        $prodEditErrors.="<div class='errors' role='alert'><strong>Sorry,</strong>&nbsp;there was an error uploading ".basename($_FILES["prod_pics"]["name"][$i])."!</div>";
                      }
                    }
        }
        if ($cpt_upload_success == $totalfiles) {
            $prodEditErrors.="<div class='message' role='alert'><strong>".ucwords($product_title)."'s Picture(s)</strong>&nbsp;has been updated!</div>";
        }
    } else {
        $prodEditErrors.="<div class='errors' role='alert'><strong>Sorry,</strong>&nbsp;File(s) already exists in our database!</div>";
    }
}

if (isset($_POST['hold'])) {
		$orderID = $_POST['orderID'];
		$orderStatus = 1;
		try
        {
            $sql_status = $db->prepare('UPDATE placed_orders SET order_status=? WHERE order_id=?');
            $sql_status->bindValue(1, $orderStatus);
            $sql_status->bindValue(2, $orderID);
            $sql_status->execute();

            $prodEditErrors.="<div class='message' role='alert'><strong>Order Status</strong>&nbsp;has been updated!</div>";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
	}

	if (isset($_POST['failed'])) {
		$orderID = $_POST['orderID'];
		$orderStatus = 2;
		try
        {
            $sql_status = $db->prepare('UPDATE placed_orders SET order_status=? WHERE order_id=?');
            $sql_status->bindValue(1, $orderStatus);
            $sql_status->bindValue(2, $orderID);
            $sql_status->execute();

            $prodEditErrors.="<div class='message' role='alert'><strong>Order Status</strong>&nbsp;has been updated!</div>";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
	}

	if (isset($_POST['refunded'])) {
		$orderID = $_POST['orderID'];
		$orderStatus = 3;
		try
        {
            $sql_status = $db->prepare('UPDATE placed_orders SET order_status=? WHERE order_id=?');
            $sql_status->bindValue(1, $orderStatus);
            $sql_status->bindValue(2, $orderID);
            $sql_status->execute();

            $prodEditErrors.="<div class='message' role='alert'><strong>Order Status</strong>&nbsp;has been updated!</div>";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
	}

	if (isset($_POST['processing'])) {
		$orderID = $_POST['orderID'];
		$orderStatus = 4;
		try
        {
            $sql_status = $db->prepare('UPDATE placed_orders SET order_status=? WHERE order_id=?');
            $sql_status->bindValue(1, $orderStatus);
            $sql_status->bindValue(2, $orderID);
            $sql_status->execute();

            $prodEditErrors.="<div class='message' role='alert'><strong>Order Status</strong>&nbsp;has been updated!</div>";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
	}

    if (isset($_POST['delete'])) {
        $productID = $_POST['productID'];
        $prodName = $_POST['prod_nam'];
        try
        {
            $sql = $db->prepare('DELETE FROM products WHERE id=?');
            $sql->bindValue(1, $productID);
            $sql->execute();
            $prodEditErrors.="<div class='message' role='alert'><strong>".$prodName."</strong>&nbsp;has been deleted!</div>";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    if (isset($_POST['save_coupon_changes'])) {
        $couponID = $_POST['coupon_id'];
        $couponCode = $_POST['coupon_code'];
        $discountPerc = $_POST['discount'];
        $prod_idd = $_POST['product_name'];
        $usageLimit = $_POST['usage_limit'];
        $endTime = date_format(date_create($_POST['ending_time']), 'Y-m-d H:i:s');

        // Validate Coupon Code
        $stmt = $db->prepare('SELECT * from coupons where coupon_code=?');
        $stmt->bindValue(1, $couponCode);
        $stmt->execute();
        $count = $stmt->rowCount();

        $cpt = 0;

        if ($count > 0)
        {
            foreach ($stmt as $row)
            {
                if ($row['id'] != $couponID)
                {
                    $cpt += 1;
                }
            }
            if ($cpt != 0)
            {
                $prodEditErrors .= "<div class='errors' role='alert'><strong>Coupon Code</strong>&nbsp;you have entered is already taken by another product!</div>";
            }
            else
            {
                $prodEditErrors = "";
            }
        }
        if ($cpt == 0)
        {
            try
            {
                $sql = $db->prepare('UPDATE coupons SET coupon_code=?, discount=?, product_id=?, usage_limit=?, end_time=? WHERE id=?');
                $sql->bindValue(1, $couponCode);
                $sql->bindValue(2, $discountPerc);
                $sql->bindValue(3, $prod_idd);
                $sql->bindValue(4, $usageLimit);
                $sql->bindValue(5, $endTime);
                $sql->bindValue(6, $couponID);
                $sql->execute();
                $prodEditErrors .= "<div class='message' role='alert'><strong>Coupon Code</strong>&nbsp;Updated Successfully!</div>";
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }
    }

?>


	<div class="notices">
		<?php echo $prodEditErrors; ?>
    </div>

	<div id="my_products" class="row big_container">
		<div class="col-table-03">
                                        <div class="col-table-03-card">
                                            <div class="col-table-03-card-content">
                                                <div class="card-title">My Products</div>
                                                <div class="latest-transaction-container my-products">
                                                	
                                                    <table width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="product_thumb">
                                                                	<i class="far fa-image"></i>
                                                                </th>
                                                                <th>Name</th>
                                                                <th width="20%">Description</th>
                                                                <th>Slug</th>
                                                                <th>Stock</th>
                                                                <th>Price</th>
                                                                <th>Categories</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        	<?php

        														if(isset($_SESSION['id'])) {
        															try {

                                                                        $sql_1 = $db->prepare("SELECT COUNT(*) AS nbProds, owner_id FROM products WHERE owner_id=? ORDER BY owner_id");
                                                                        $sql_1->bindValue(1, $_SESSION['id']);
                                                                        $sql_1->execute();
                                                                        $result=$sql_1->fetch(PDO::FETCH_ASSOC);
                                                                        $total_rows = $result['nbProds'];
                                                                        $total_pages = ceil($total_rows / $no_of_records_per_page);

	        															$stmt = $db->prepare("SELECT *, products.name AS prod_nm, products.id AS prod_ident FROM products LEFT JOIN category ON products.category_id=category.id WHERE owner_id=:user_id ORDER BY prod_ident LIMIT $offset, $no_of_records_per_page");
											                            $stmt->execute(['user_id'=>$_SESSION['id']]);
											                            foreach($stmt as $row) {

                                                        	?>
                                                            <tr class="produ_infos">
                                                                <td class="product_thumb">
                                                                    <a class="thumb" target="_blank" href="product.php?product=<?php echo $row['slug'];?>">
                                                                    	<img src="images/items/<?php echo $row['photo'];?>" alt="<?php echo $row['prod_nm'];?>" width="150" height="150" sizes="(max-width: 150px) 100vw, 150px">
                                                                    </a>
                                                                </td>
                                                                <td width="18%" class="product-nom">
                                                                	<strong>
                                                                		<a target="_blank" class="prod-title" href="product.php?product=<?php echo $row['slug'];?>"><?php echo ucwords($row['prod_nm']);?></a>
                                                                	</strong>
                                                                	<div class="prod_actions">
                                                                		<span class="id">ID: <?php echo $row['prod_ident'];?> | </span>
                                                                		<span class="edit">
                                                                			<a id="quick_edit" href="#">Edit</a> | 
                                                                		</span>
                                                                		<span class="trash">
                                                                			<a href="#" class="submitdelete">Trash</a> | 
                                                                		</span>
                                                                		<span class="view">
                                                                			<a target="_blank" href="product.php?product=<?php echo $row['slug'];?>">View</a> | 
                                                                		</span>
                                                                	</div>
                                                            	</td>
                                                            	<td width="20%">
                                                            		<p><?php echo $row['description'];?></p>
                                                        		</td>
                                                        		<td>
                                                        			<?php echo $row['slug'];?>
                                                        		</td>
                                                                <td>
                                                                	<span class="prod-stock <?php 
                                                                	$stock_manner = '';
                                                                	if($row['quantity'] > 10) {
                                                                		echo 'in_stock';
                                                                		$stock_manner = 'In Stock';
                                                                	} else{
                                                                		echo 'out_stock';
                                                                		$stock_manner = 'Out Of Stock';
                                                                	} ?>"><?php echo $stock_manner;?></span>
                                                                </td>
                                                                <td>$<?php echo $row['price'];?></td>
                                                                <td>
                                                                	<a href="#"><?php echo $row['name'];?></a>
                                                                </td>
                                                                <td class="publishing_date">
                                                                	Published<br>
                                                                	<span title="<?php echo $row['publication_date'];?>"><?php echo date_format(date_create($row['publication_date']),"d F, Y");?></span>
                                                                </td>
                                                                <td class="confirmation_modal" colspan="8">
                                                                    <section>
                                                                        <header>
                                                                            <h4 class="modal-title">Delete Product</h4>
                                                                            <span class="close"><i class="fas fa-times"></i></span>
                                                                        </header>
                                                                        <article>
                                                                                <p>Are you sure you want to delete this product?</p>
                                                                                <p class="little-warning"><small>This action cannot be undone.</small></p>
                                                                        </article>
                                                                        <footer>
                                                                            <button type="button" value="cancel">Cancel</button>
                                                                            <form method="POST">
                                                                                <input type="hidden" name="productID" value="<?php echo $row['prod_ident'];?>">
                                                                                <input type="hidden" name="prod_nam" value="<?php echo ucwords($row['prod_nm']);?>">
                                                                                <button type="submit" name="delete" value="delete">Delete</button>
                                                                            </form>
                                                                        </footer>
                                                                    </section>
                                                                </td>
                                                                <td class="confirmation_wrapper">
                                                                    <div class="modal_wrapper"></div>
                                                                </td>
                                                            </tr>
                                                            <tr class="produ_edit">
                                                            	<td colspan="8">
                                                                    <form method="POST" id="products_edit" enctype="multipart/form-data">
                                                                		<div class="produ_edit_container row">
                                                                			<input type="hidden" name="prod_id" value="<?php echo $row['prod_ident'];?>">
                                                                			<div class="col-401">
    																			<div class="form-group">
    																				<label for="prod_name">Product Name</label>
    																				<input id="prod_name" name="prod_name" type="text" placeholder="" value="<?php echo ucwords($row['prod_nm']);?>" required="">
    																			</div>
    																		</div>
    																		<div class="col-401">
    																			<div class="form-group">
    																				<label for="prod_slug">Product Slug</label>
    																				<input id="prod_slug" name="prod_slug" type="text" placeholder="" value="<?php echo $row['slug'];?>" required="">
    																				<p class="error"></p>
    																			</div>
    																		</div>
    																		<div class="col-401">
    																			<div class="form-group">
    																				<label for="prod_cat">Category</label>
    																				<select name="prod_cat">
    																					<option <?php if ($row['id'] == 1 ) echo 'selected'; ?> value="1">Digital Goods</option>
    																					<option <?php if ($row['id'] == 2 ) echo 'selected'; ?> value="2">Clothes</option>
    																					<option <?php if ($row['id'] == 3 ) echo 'selected'; ?> value="3">Health & Care</option>
    																					<option <?php if ($row['id'] == 4 ) echo 'selected'; ?> value="4">Home Interior</option>
    																					<option <?php if ($row['id'] == 5 ) echo 'selected'; ?> value="5">Toys & Games</option>
    																				</select>
    																			</div>
    																		</div>
    																		<div class="col-401">
    																			<div class="form-group">
    																				<label for="stock_status">Product Inventory</label>
    																				<input id="stock_status" name="stock_status" type="text" placeholder="" value="<?php echo $row['quantity'];?>" required="">
    																				<p class="error"></p>
    																			</div>
    																		</div>
    																		<div class="col-401">
    																			<div class="form-group">
    																				<label for="prod_price">Price</label>
    																				<input id="prod_price" name="prod_price" type="text" placeholder="" value="<?php echo $row['price'];?>" required="">
    																				<p class="error"></p>
    																			</div>
    																		</div>
    																		<div class="col-15">
    																			<div class="form-group message">
    																				<label for="prod_desc">Product Description</label>
    																				<textarea style="background-color: rgba(66,72,81,0.03);" id="prod_desc" name="prod_desc" placeholder="" required=""><?php echo $row['description'];?></textarea>
    																			</div>
    																		</div>
    																		<div class="col-401 uploads">
    																			<div class="form-group">
    																				<label id="prod_pics_label" for="prod_pics">Product Images</label>
                                                                                    <input name="prod_pics[]" id="prod_pics" multiple="multiple" type="file">
    																				<div class="upload_zone">
    																					
    																					<div class="upload_msg">
    																						<div>
    																							<i class="fas fa-cloud-upload-alt"></i>
    																						</div>
    																						<h4>Click here to upload.</h4>
    																					</div>
    																				</div>
    																				<div class="upload_zone_previews">
    																				</div>
    																			</div>
    																		</div>
    																		<button class="" type="submit" name="save">Save Changes</button>
    																		<a href="#" class="cancel">Cancel</a>
                                                                		</div>
                                                            	   </form>
                                                                </td>
                                                            </tr>

                                                            <?php

                                                            			}
	                                                            	} catch(PDOException $e){
											                        	echo "Error: " . $e->getMessage();
											                        }
										                        }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="table_bottom">
                                                        <div class="hint-text">Showing <b>1 </b>to <b><?php echo $no_of_records_per_page; ?></b> out of <b><?php echo $total_rows; ?></b> products</div>
                                                        <ul class="pagination">
                                                            <li class="page-item <?php if($pagenum <= 1){ echo 'disabled'; } ?>"><a href="<?php if($pagenum <= 1){ echo ''; } else { echo "?post_type=product&p=".($pagenum - 1); } ?>">Previous</a></li>
                                                            <?php
                                                                for ($i=1; $i <=$total_pages; $i++) { 
                                                                    echo '<li class="page-item ';
                                                                    if($pagenum == $i){ echo 'active'; };
                                                                    echo '"><a href="?post_type=product&p='.$i.'" class="page-link">'.$i.'</a></li>';
                                                                }
                                                            ?>
                                                            <li class="page-item <?php if($pagenum >= $total_pages){ echo 'disabled'; } ?>"><a href="<?php if($pagenum >= $total_pages){ echo ''; } else { echo "?post_type=product&p=".($pagenum + 1); } ?>" class="page-link">Next</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
	</div>

	<div id="my_orders" class="row big_container">
		<div class="col-table-03">
	        <div class="col-table-03-card">
	            <div class="col-table-03-card-content">
	                <div class="card-title">Orders</div>
	                <div class="latest-transaction-container my-products orders">
	                	
	                    <table width="100%">
	                        <thead>
	                            <tr>
	                                <th>Order</th>
	                                <th>Date</th>
	                                <th>Status</th>
	                                <th>Total</th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                        	<?php

									if(isset($_SESSION['id'])) {
										try {
                                            $sql_1 = $db->prepare("SELECT DISTINCT order_id, product_id, COUNT(DISTINCT order_id) AS nbOrders FROM orders_items LEFT JOIN (SELECT id, owner_id FROM products) AS products ON orders_items.product_id = products.id WHERE owner_id =?");
                                            $sql_1->bindValue(1, $_SESSION['id']);
                                            $sql_1->execute();
                                            $result=$sql_1->fetch(PDO::FETCH_ASSOC);
                                            $total_rows = $result['nbOrders'];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);
											$stmt = $db->prepare("SELECT * FROM placed_orders LEFT JOIN (SELECT DISTINCT order_id AS OrderID, product_id, quantity FROM orders_items GROUP BY order_id) AS orders_items ON orders_items.OrderID=placed_orders.order_id LEFT JOIN (SELECT *, users.id AS client_id FROM users) AS clients ON placed_orders.order_email=clients.email LEFT JOIN (SELECT *, products.id AS prod_id FROM products) AS prods ON orders_items.product_id=prods.prod_id WHERE owner_id=:user_id ORDER BY order_id LIMIT $offset, $no_of_records_per_page");
                                            $stmt->execute(['user_id'=>$_SESSION['id']]);
				                            foreach($stmt as $row) {
				                            	$costTotal = 0;

	                        	?>
	                            <tr class="order_infos main-row">
	                            	<td>
	                            		<div class="order_title">
	                            			<strong>#<?php echo $row['order_id']; ?> <?php echo ucwords($row['firstname'].' '.$row['lastname']); ?></strong>
		                            		<a href="#" class="order_preview">
		                            			<i class="far fa-eye"></i>
		                            		</a>
	                            		</div>
	                            	</td>
	                            	<td>
	                            		<span style="text-decoration: dotted underline;" title="<?php echo $row['order_date'];?>"><?php echo date_format(date_create($row['order_date']),"d F, Y");?>
	                            	</td>
	                            	<td>
	                            		<?php
                                            switch ($row['order_status']) {
                                                case 1:
                                                    echo '<span class="order_progress hold">On Hold</span>';
                                                    break;
                                                case 2:
                                                    echo '<span class="order_progress failed">Payment Failed</span>';
                                                    break;
                                                case 3:
                                                    echo '<span class="order_progress refunded">Refunded</span>';
                                                    break;
                                                case 4:
                                                    echo '<span class="order_progress delivred">Processing</span>';
                                                    break;
                                                default:
                                                    break;
                                            }
                                        ?>
	                            	</td>
	                            	<?php
	                                    $sql = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, price, owner_id FROM products) AS products ON orders_items.product_id=products.id WHERE order_id=:orderIdent AND owner_id=:userID");
	                                    $sql->execute(['orderIdent'=>$row['order_id'], 'userID'=>$_SESSION['id']]);
	                                    foreach($sql as $key) {
	                                        $costTotal+=$key['price']*$key['quantity'];
	                                    }
	                            	?>
	                            	<td>
	                            		<span>$<?php echo $costTotal; ?></span>
	                            	</td>
	                            </tr>
	                            <tr class="order_view">
	                            	<td colspan="4">
	                            		<section class="order_det">
	                            			<header>
	                            				<h1>Order #<?php echo $row['order_id'] ?></h1>
	                            				<?php
		                                            switch ($row['order_status']) {
		                                                case 1:
		                                                    echo '<span class="order_progress hold">On Hold</span>';
		                                                    break;
		                                                case 2:
		                                                    echo '<span class="order_progress failed">Payment Failed</span>';
		                                                    break;
		                                                case 3:
		                                                    echo '<span class="order_progress refunded">Refunded</span>';
		                                                    break;
		                                                case 4:
		                                                    echo '<span class="order_progress delivred">Processing</span>';
		                                                    break;
		                                                default:
		                                                    break;
		                                            }
		                                        ?>
	                            				<a href="#" class="close_modal"><i class="fas fa-times"></i></a>
	                            			</header>
	                            			<article>
	                            				<div class="order-preview-addresses">
	                            					<div class="order_dets_container">
	                            						<h2>Billing Details</h2>
	                            						<span><?php echo ucwords($row['firstname'].' '.$row['lastname']); ?></span><br>
	                            						<span><?php echo $row['address'] ?></span><br>
	                            						<span><?php echo $row['state'] ?></span><br>
	                            						<span><?php echo $row['country'] ?></span><br>
	                            						<strong>Email</strong><br>
	                            						<a href="mailto:<?php echo $row['order_email'] ?>"><?php echo $row['order_email'] ?></a><br>
	                            						<strong>Phone</strong><br>
	                            						<a href="tel:<?php echo $row['contact_info'] ?>"><?php echo $row['contact_info'] ?></a><br>
	                            					</div>
	                            				</div>
	                            				<div class="order-table-details">
	                            					<table cellspacing="0">
													    <thead>
													        <tr>
													            <th>Product</th>
													            <th>Quantity</th>
													            <th>Total</th>
													        </tr>
													    </thead>
													    <tbody>
													    	<?php
							                                    $statement = $db->prepare("SELECT * FROM orders_items LEFT JOIN (SELECT id, name, price, owner_id FROM products) AS products ON orders_items.product_id=products.id WHERE order_id=:orderIdent AND owner_id=:userID");
							                                    $statement->execute(['orderIdent'=>$row['order_id'], 'userID'=>$_SESSION['id']]);
							                                    foreach($statement as $k) {
							                                        
							                                    
							                            	?>
													        <tr>
													            <td><?php echo ucwords($k['name']); ?></td>
													            <td><?php echo $k['quantity']; ?></td>
													            <td>$<?php echo $k['price']*$k['quantity']; ?></td>
													        </tr>
													        <?php
													        	}
													        ?>
													    </tbody>
													</table>
	                            				</div>
	                            			</article>
	                            			<footer>
	                            				<div class="order_actions">
	                            					<form method="POST" style="display: flex;flex-wrap: wrap;">
	                            						<span>Change Order Status:&nbsp;</span>
	                            						<input type="hidden" name="orderID" value="<?php echo $row['order_id'] ?>">
                                                        <div style="display: inline-block;">
	                            						<?php
	                            							if ($row['order_status'] != 1) {
	                            								echo '<button type="submit" name="hold">On Hold</button>';
	                            							}
	                            							if ($row['order_status'] != 2) {
	                            								echo '<button type="submit" name="failed">Payment Failed</button>';
	                            							}
	                            							if ($row['order_status'] != 3) {
	                            								echo '<button type="submit" name="refunded">Refunded</button>';
	                            							}
	                            							if ($row['order_status'] != 4) {
	                            								echo '<button type="submit" name="processing">Processing</button>';
	                            							}
                            							?>
                                                        </div>
                            						</form>
	                            				</div>
	                            			</footer>
	                            		</section>
	                            		<div class="modal-close"></div>
	                            	</td>
	                            </tr>
	                            <?php
                                    
	                        			}
	                            	} catch(PDOException $e){
			                        	echo "Error: " . $e->getMessage();
			                        }
		                        }

	                            ?>
	                        </tbody>
	                    </table>
                        <div class="table_bottom">
                            <div class="hint-text">Showing <b>1 </b>to <b><?php echo $no_of_records_per_page; ?></b> out of <b><?php echo $total_rows; ?></b> orders</div>
                            <ul class="pagination">
                                <li class="page-item <?php if($pagenum <= 1){ echo 'disabled'; } ?>"><a href="<?php if($pagenum <= 1){ echo ''; } else { echo "?post_type=order&p=".($pagenum - 1); } ?>">Previous</a></li>
                                <?php
                                    for ($i=1; $i <=$total_pages; $i++) { 
                                        echo '<li class="page-item ';
                                        if($pagenum == $i){ echo 'active'; };
                                        echo '"><a href="?post_type=order&p='.$i.'" class="page-link">'.$i.'</a></li>';
                                    }
                                ?>
                                <li class="page-item <?php if($pagenum >= $total_pages){ echo 'disabled'; } ?>"><a href="<?php if($pagenum >= $total_pages){ echo ''; } else { echo "?post_type=order&p=".($pagenum + 1); } ?>" class="page-link">Next</a></li>
                            </ul>
                        </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

    <div id="my_reviews" class="row big_container">
        <div class="col-table-03">
            <div class="col-table-03-card">
                <div class="col-table-03-card-content">
                    <div class="card-title">Reviews</div>
                    <div class="latest-transaction-container my-products reviews">
                        
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th class="product_thumb">
                                        <i class="far fa-image" aria-hidden="true"></i>
                                    </th>
                                    <th>Product</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th>Reviewer</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    if(isset($_SESSION['id'])) {
                                        try {
                                            $sql_1 = $db->prepare("SELECT product_id, COUNT(*) AS nbReview FROM review LEFT JOIN (SELECT id, owner_id FROM products) AS products ON review.product_id = products.id WHERE owner_id = ?");
                                            $sql_1->bindValue(1, $_SESSION['id']);
                                            $sql_1->execute();
                                            $result=$sql_1->fetch(PDO::FETCH_ASSOC);
                                            $total_rows = $result['nbReview'];
                                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                                            $stmt = $db->prepare("SELECT * FROM review LEFT JOIN (SELECT id AS prodIdent, name, slug, owner_id, photo FROM products) AS products ON review.product_id = products.prodIdent LEFT JOIN (SELECT id AS userID, firstname, lastname FROM users) AS users ON users.userID = review.user_id WHERE owner_id =:user_id ORDER BY review.id ASC LIMIT $offset, $no_of_records_per_page");
                                            $stmt->execute(['user_id'=>$_SESSION['id']]);
                                            foreach($stmt as $row) {

                                ?>
                                <tr class="review_infos main-row">
                                    <td class="product_thumb">
                                        <a class="thumb" target="_blank" href="product.php?product=<?php echo $row['slug']; ?>">
                                            <img src="images/items/<?php echo $row['photo']; ?>" alt="<?php echo $row['name']; ?>" width="150" height="150" sizes="(max-width: 150px) 100vw, 150px">
                                        </a>
                                    </td>
                                    <td width="18%" class="product-nom">
                                        <strong>
                                            <a target="_blank" class="prod-title" href="product.php?product=<?php echo $row['slug']; ?>"><?php echo ucwords($row['name']);  ?></a>
                                        </strong>
                                    </td>
                                    <td width="20%">
                                        <p><?php echo $row['comment']  ?></p>
                                    </td>
                                    <td>
                                        <ul class="rating-stars">
                                            <li style="width:<?php echo (($row['rating']/5)*100); ?>%" class="stars-active">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span><?php echo ucwords($row['firstname'].' '.$row['lastname']); ?></span>
                                    </td>
                                    <td>
                                        <span style="text-decoration: dotted underline;" title="<?php echo $row['date'] ?>"><?php echo date_format(date_create($row['date']),"d F, Y");?></span>
                                    </td>
                                </tr>
                                <?php
                                    
                                        }
                                    } catch(PDOException $e){
                                        echo "Error: " . $e->getMessage();
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                        <div class="table_bottom">
                            <div class="hint-text">Showing <b>1 </b>to <b><?php echo $no_of_records_per_page; ?></b> out of <b><?php echo $total_rows; ?></b> reviews</div>
                            <ul class="pagination">
                                <li class="page-item <?php if($pagenum <= 1){ echo 'disabled'; } ?>"><a href="<?php if($pagenum <= 1){ echo ''; } else { echo "?post_type=review&p=".($pagenum - 1); } ?>">Previous</a></li>
                                <?php
                                    for ($i=1; $i <=$total_pages; $i++) { 
                                        echo '<li class="page-item ';
                                        if($pagenum == $i){ echo 'active'; };
                                        echo '"><a href="?post_type=review&p='.$i.'" class="page-link">'.$i.'</a></li>';
                                    }
                                ?>
                                <li class="page-item <?php if($pagenum >= $total_pages){ echo 'disabled'; } ?>"><a href="<?php if($pagenum >= $total_pages){ echo ''; } else { echo "?post_type=review&p=".($pagenum + 1); } ?>" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="my_coupons" class="row big_container">
        <div class="col-table-03">
            <div class="col-table-03-card">
                <div class="col-table-03-card-content">
                    <div class="card-title">Coupons</div>
                    <div class="latest-transaction-container my-products coupons">
                        
                        <table width="100%">
                            <thead>
                                <tr>
                                    <th>Coupon</th>
                                    <th>Discount(%)</th>
                                    <th>Product</th>
                                    <th>Usage Limit</th>
                                    <th>Time Used</th>
                                    <th>Starting Time</th>
                                    <th>Ending Time</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($_SESSION['id'])) {
                                        try {
                                            $stmt = $db->prepare("SELECT * FROM coupons LEFT JOIN (SELECT id AS prodIdent, name, slug, owner_id FROM products) AS products ON coupons.product_id = products.prodIdent WHERE owner_id =:sellerID");
                                            $stmt->execute(['sellerID'=>$_SESSION['id']]);
                                            foreach($stmt as $k) {
                                ?>
                                <tr class="coupon_info main-row">
                                    <td style="font-weight: 600;"><?php echo strtoupper($k['coupon_code']); ?></td>
                                    <td><?php echo $k['discount']; ?></td>
                                    <td>
                                        <a target="_blank" href="product.php?product=<?php echo $k['slug'] ?>"><?php echo ucwords($k['name']); ?></a>
                                    </td>
                                    <td><?php echo $k['usage_limit']; ?></td>
                                    <td><?php echo $k['time_used']; ?></td>
                                    <td title="<?php echo $k['start_time'] ?>" style="text-decoration: dotted underline;"><?php echo date_format(date_create($k['start_time']),"d F, Y"); ?></td>
                                    <td title="<?php echo $k['end_time'] ?>" style="text-decoration: dotted underline;"><?php echo date_format(date_create($k['end_time']),"d F, Y"); ?></td>
                                    <td>
                                        <button class="edit_coupon" type="button">Edit</button>
                                    </td>
                                </tr>
                                <tr class="coupon_edit">
                                        <td colspan="8">
                                            <form method="POST" style="display: flex;flex-wrap: wrap;">
                                                <div class="col-401" style="flex: 0 0 100%; max-width: 100%">
                                                    <div class="form-group">
                                                        <label for="coupon_code">Coupon Code <span>*</span></label>
                                                        <input type="hidden" name="coupon_id" value="<?php echo $k['id'] ?>">
                                                        <input id="coupon_code" name="coupon_code" type="text" placeholder="Coupon Code" value="<?php echo $k['coupon_code'] ?>" required="">
                                                        <p class="error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-401">
                                                    <div class="form-group">
                                                        <label for="discount">Discount(%)</label>
                                                        <input id="discount" name="discount" type="text" placeholder="" value="<?php echo $k['discount'] ?>" required="">
                                                        <p class="error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-401">
                                                    <div class="form-group">
                                                        <label for="product_name">Product</label>
                                                        <select name="product_name">
                                                        <?php
                                                            try {
                                                                $sql_2 = $db->prepare("SELECT id, name, owner_id FROM products WHERE owner_id =?");
                                                                $sql_2->bindValue(1, $_SESSION['id']);
                                                                $sql_2->execute();
                                                                foreach($sql_2 as $key) {
                                                                    echo '<option value="'.$key['id'].'"';
                                                                    if ($key['id'] == $k['prodIdent']) {
                                                                        echo " selected";
                                                                    }
                                                                    echo '>'. $key['name'] . '</option>'."\n";
                                                                }
                                                            } catch (PDOException $e) {
                                                                echo "Error: " . $e->getMessage();
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-401">
                                                    <div class="form-group">
                                                        <label for="usage_limit">Usage Limit</label>
                                                        <input id="usage_limit" name="usage_limit" type="text" placeholder="" value="<?php echo $k['usage_limit'] ?>" required="">
                                                        <p class="error"></p>
                                                    </div>
                                                </div>
                                                <div class="col-401">
                                                    <div class="form-group">
                                                        <label for="ending_time">Ending Time</label>
                                                        <input type="datetime-local" name="ending_time" id="ending_time" value="<?php echo substr_replace(preg_replace('/\s+/', '', $k["end_time"]), "T", 10, 0); ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required="">
                                                    </div>
                                                </div>
                                                <button style="margin-left: 15px;" class="" type="submit" name="save_coupon_changes">Save Changes</button>
                                                <a style="margin-left: 8px;" href="#" class="cancel">Cancel</a>
                                            </form>
                                    </td>
                                </tr>
                                <?php
                                            }
                                        } catch(PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php 

    include 'post-seller-panel.php';

?>