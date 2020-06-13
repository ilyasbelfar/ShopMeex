<?php
    include 'includes/session.php';

    $pageTitle = '';
    $breadcrumbSlug = '';
    $breadcrumbName = '';

    if (isset($_GET['post_type'])) {
        if ($_GET['post_type'] == 'product') {
            $pageTitle = 'Add Product';
            $breadcrumbSlug = 'new-post.php?post_type=product';
            $breadcrumbName = 'Add Product';
        } elseif($_GET['post_type'] == 'coupon') {
            $pageTitle = 'Add Coupon';
            $breadcrumbSlug = 'new-post.php?post_type=coupon';
            $breadcrumbName = 'Add Coupon';
        }
    } else {
            $pageTitle = 'Add Product';
            $breadcrumbSlug = 'new-post.php?post_type=product';
            $breadcrumbName = 'Add Product';
    }

    $prodEditErrors = '';

    include 'pre-seller-panel.php';

    if (isset($_POST['add_prod'])) {
        $newProdName = $_POST['newprod_name'];
        if (isset($_POST['newprod_slug']) && !empty($_POST['newprod_slug'])) {
            $newProdSlug = $_POST['newprod_slug'];
        } else {
            $randNum = mt_rand(1,10000);
            $name = strtolower(str_replace(' ', '-',$newProdName));
            $newSlug = $name.'-'.$randNum;
            $newProdSlug = $newSlug;
        }
        $newProdCat = $_POST['newprod_cat'];
        $newProdQty = $_POST['newprod_qty'];
        $newProdPrice = $_POST['newprod_price'];
        if (isset($_POST['newprod_weight']) && !empty($_POST['newprod_weight'])) {
            $newProdWeight = $_POST['newprod_weight'];
        } else {
            $newProdWeight = 'N/A';
        }
        $newProdColors = $_POST['newprod_colors'];
        $newProdModel = $_POST['newprod_model'];
        if (isset($_POST['newprod_width']) && !empty($_POST['newprod_width'])) {
            $newProdWidth = $_POST['newprod_weight'];
        } else {
            $newProdWidth = 'N/A';
        }
        if (isset($_POST['newprod_height']) && !empty($_POST['newprod_height'])) {
            $newProdWidth = $_POST['newprod_height'];
        } else {
            $newProdHeight = 'N/A';
        }
        $newProdDesc = $_POST['newprod_desc'];

        // Validate Slug
        $stmt = $db->prepare('SELECT * from products where slug=?');
        $stmt->bindValue(1, $newProdSlug);
        $stmt->execute();
        $count = $stmt->rowCount();

        $cpt = 0;

        if ($count > 0)
        {
            $cpt += 1;
            $prodEditErrors .= "<div class='errors' role='alert'><strong>Slug</strong>&nbsp;you have entered is already taken by another product!</div>";
        } else {
            $prodEditErrors = '';
        }

        if ($cpt == 0)
        {
            try
            {
                $sql = $db->prepare('INSERT INTO products(category_id, name, description, weight, dimensions, price, slug, colors, owner_id, model, date_view, counter, sold_cmp, total_rating, quantity, publication_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $sql->bindValue(1, $newProdCat);
                $sql->bindValue(2, $newProdName);
                $sql->bindValue(3, $newProdDesc);
                $sql->bindValue(4, $newProdWeight);
                $sql->bindValue(5, $newProdWidth." x ".$newProdHeight);
                $sql->bindValue(6, $newProdPrice);
                $sql->bindValue(7, $newProdSlug);
                $sql->bindValue(8, $newProdColors);
                $sql->bindValue(9, $_SESSION['id']);
                $sql->bindValue(10, $newProdModel);
                $sql->bindValue(11, date("Y-m-d"));
                $sql->bindValue(12, 0);
                $sql->bindValue(13, 0);
                $sql->bindValue(14, 0);
                $sql->bindValue(15, $newProdQty);
                $sql->bindValue(16, date("Y-m-d H:i:s"));
                if($sql->execute()) {
                    $prodEditErrors .= "<div class='message' role='alert'><strong>".$newProdName."</strong>&nbsp;has been added!</div>";
                }
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }

        if (isset($_FILES['newprod_pics']) && array_sum($_FILES['newprod_pics']['error']) == 0) {
             $stmt = $db->prepare('SELECT id, owner_id FROM products ORDER BY id DESC LIMIT 1');
             $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);

            if (count($_FILES['newprod_pics']['name']) > 3) {
                $totalfiles = 3;
            } else {
                $totalfiles = count($_FILES['newprod_pics']['name']);
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
                $target_file = $target_dir . basename($_FILES["newprod_pics"]["name"][$i]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["newprod_pics"]["tmp_name"][$i]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $prodEditErrors.="<div class='message' role='alert'><strong>Sorry,</strong>&nbsp;".basename($_FILES["newprod_pics"]["name"][$i])." is not an image!</div>";
                        $uploadOk = 0;
                    }

                // Check if file already exists
                    if (file_exists($target_file)) {
                        $prodEditErrors.="<div class='errors' role='alert'><strong>Sorry,</strong>&nbsp;".basename($_FILES["newprod_pics"]["name"][$i])." already exists in our database!</div>";
                        $uploadOk = 0;
                    }

                // Check file size
                    if ($_FILES["newprod_pics"]["size"][$i] > 2097152) {
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
                          if (move_uploaded_file($_FILES["newprod_pics"]["tmp_name"][$i], $target_file)) {
                            try
                                {
                                    $sql = $db->prepare("UPDATE products SET ".$picture."=? WHERE owner_id=? AND id=?");
                                    $sql->bindValue(1, basename($_FILES["newprod_pics"]["name"][$i]));
                                    $sql->bindValue(2, $result['owner_id']);
                                    $sql->bindValue(3, $result['id']);
                                    if ($sql->execute()) {
                                        $cpt_upload_success+=1;
                                    }
                                }
                                catch(PDOException $e)
                                {
                                    echo "Error: " . $e->getMessage();
                                }
                          } else {
                            $prodEditErrors.="<div class='errors' role='alert'><strong>Sorry,</strong>&nbsp;there was an error uploading ".basename($_FILES["newprod_pics"]["name"][$i])."!</div>";
                          }
                        }
            }
            if ($cpt_upload_success == $totalfiles) {
                $prodEditErrors.="<div class='message' role='alert'><strong>".ucwords($product_title)."'s Picture(s)</strong>&nbsp;has been updated!</div>";
            }
        } else {
            $prodEditErrors.="<div class='errors' role='alert'><strong>Sorry,</strong>&nbsp;File(s) uploading has failed!</div>";
        }
    }

    if (isset($_POST['add_coupon'])) {
        $couponCod = str_replace(' ', '',$_POST['newcoupon_code']);
        $newDiscount = $_POST['newdiscount'];
        $identProdDiscounted = $_POST['newproduct_name'];
        $newUsageLimit = $_POST['newusage_limit'];
        $newEndingTime = date_format(date_create($_POST['newending_time']), 'Y-m-d H:i:s');

        // Validate Coupon Code
        $stmt = $db->prepare('SELECT * from coupons where coupon_code=?');
        $stmt->bindValue(1, $couponCod);
        $stmt->execute();
        $count = $stmt->rowCount();

        $cpt_2 = 0;

        if ($count > 0)
        {
            $cpt_2 += 1;
            $prodEditErrors .= "<div class='errors' role='alert'><strong>Coupon Code</strong>&nbsp;you have entered is already taken by another product!</div>";
        } else {
            $prodEditErrors = '';
        }

        if ($cpt_2 == 0)
        {
            try
            {
                $sql = $db->prepare('INSERT INTO coupons(coupon_code, discount, product_id, usage_limit, time_used, start_time, end_time) VALUES (?, ?, ?, ?, ?, ?, ?)');
                $sql->bindValue(1, $couponCod);
                $sql->bindValue(2, $newDiscount);
                $sql->bindValue(3, $identProdDiscounted);
                $sql->bindValue(4, $newUsageLimit);
                $sql->bindValue(5, '0');
                $sql->bindValue(6, date('Y-m-d H:i:s'));
                $sql->bindValue(7, $newEndingTime);
                if($sql->execute()) {
                    $prodEditErrors .= "<div class='message' role='alert'><strong>Coupon Code</strong>&nbsp;has been added!</div>";
                }
            }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
        }

    }

?>

<div class="notices seller-notices">
    <?php echo $prodEditErrors; ?>
</div>
<div id="new_product" class="add-products big_container">
    <h4>Fill informations below</h4>
    <div class="row">
        <div class="col-table-03">
            <div class="col-table-03-card">
                <form method="POST" id="products_edit" enctype="multipart/form-data">
                    <div class="produ_edit_container row">
                        <input type="hidden" name="prod_id" value="">
                        <div class="col-401">
                            <div class="form-group">
                                <label for="newprod_name">Product Name</label>
                                <input id="newprod_name" name="newprod_name" type="text" placeholder="" value="" required="">
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="newprod_slug">Product Slug</label>
                                <input id="newprod_slug" name="newprod_slug" type="text" placeholder="" value="">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="newprod_cat">Category</label>
                                <select name="newprod_cat">
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
                                <label for="newprod_qty">Product Quantity</label>
                                <input id="newprod_qty" name="newprod_qty" type="text" placeholder="" value="" required="">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="newprod_price">Price</label>
                                <input id="newprod_price" name="newprod_price" type="text" placeholder="" value="" required="">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="newprod_weight">Product Weight(kg)</label>
                                <input id="newprod_weight" name="newprod_weight" type="text" placeholder="" value="">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="newprod_colors">Product Colors</label>
                                <input id="newprod_colors" name="newprod_colors" type="text" placeholder="" value="" required="">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-401">
                            <div class="form-group">
                                <label for="newprod_model">Model</label>
                                <input id="newprod_model" name="newprod_model" type="text" placeholder="" value="" required="">
                                <p class="error"></p>
                            </div>
                        </div>
                        <div class="col-401 field">
                            <div class="form-group">
                                <fieldset>
                                    <legend>Product Dimensions</legend>
                                    <p>
                                        <label for="newprod_width">Width(cm)</label>
                                        <span class="newprod_width">
                                            <input id="newprod_width" name="newprod_width" type="text" placeholder="">
                                        </span>
                                    </p>
                                    <p>
                                        <label for="newprod_height">Height(cm)</label>
                                        <span class="newprod_height">
                                            <input id="newprod_height" name="newprod_height" type="text" placeholder="">
                                        </span>
                                    </p>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-15">
                            <div class="form-group message">
                                <label for="newprod_desc">Product Description</label>
                                <textarea style="background-color: rgba(66,72,81,0.03);" id="newprod_desc" name="newprod_desc" placeholder="" required=""></textarea>
                            </div>
                        </div>
                        <div class="col-401 uploads">
                            <div class="form-group">
                                <label id="newprod_pics_label" for="newprod_pics">Product Images</label>
                                <input name="newprod_pics[]" id="newprod_pics" multiple="multiple" type="file">
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
                        <div class="col-401">
                            <div class="form-group">
                                <button class="" type="submit" name="add_prod">Add</button>
                                <button type="reset">Discard</button>
                            </div>
                        </div>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>

<div id="new_coupon" class="add-coupons big_container">
    <h4>Fill informations below</h4>
    <div class="row">
        <div class="col-table-03">
            <div class="col-table-03-card">
                <form method="POST" style="display: flex;flex-wrap: wrap;">
                    <div class="col-401" style="flex: 0 0 100%; max-width: 100%">
                        <div class="form-group">
                            <label for="newcoupon_code">Coupon Code <span>*</span></label>
                            <input id="newcoupon_code" name="newcoupon_code" type="text" placeholder="Coupon Code" value="" required="">
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-401">
                        <div class="form-group">
                            <label for="newdiscount">Discount(%) <span>*</span></label>
                            <input id="newdiscount" name="newdiscount" type="text" placeholder="" value="" required="">
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-401">
                        <div class="form-group">
                            <label for="newproduct_name">Product <span>*</span></label>
                            <select name="newproduct_name">
                            <?php
                                try {
                                    $sql_2 = $db->prepare("SELECT id, name, owner_id FROM products WHERE owner_id =?");
                                    $sql_2->bindValue(1, $_SESSION['id']);
                                    $sql_2->execute();
                                    foreach($sql_2 as $key) {
                                        echo '<option value="'.$key['id'].'"';
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
                            <label for="newusage_limit">Usage Limit <span>*</span></label>
                            <input id="newusage_limit" name="newusage_limit" type="text" placeholder="" value="" required="">
                            <p class="error"></p>
                        </div>
                    </div>
                    <div class="col-401">
                        <div class="form-group">
                            <label for="newending_time">Ending Time <span>*</span></label>
                            <input type="datetime-local" name="newending_time" id="newending_time" value="<?php echo substr_replace(preg_replace('/\s+/', '', date("Y-m-d H:i:s")), "T", 10, 0); ?>" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required="">
                        </div>
                    </div>
                    <div class="col-401">
                        <div class="form-group">
                            <button class="" type="submit" name="add_coupon">Add</button>
                            <button type="reset">Discard</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    include 'post-seller-panel.php';
?>