<?php
    include "includes/session.php";
   if (isset($_GET['product'])) {
    $slug=$_GET['product'];
    
    }
    else {
        $slug="large-dell-inspiron-15-5000-15-6";
    }
    ////////// a coper something else where 
       if(isset($_SESSION['id'])){
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $row){
                if (isset($row['productid'])) {
                    # code...
                
                    $stmt = $db->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE user_id=:user_id AND product_id=:product_id");
                    $stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['productid']]);
                    $crow = $stmt->fetch();
                    if($crow['numrows'] < 1){
                        $stmt = $db->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)");
                        $stmt->execute(['user_id'=>$user['id'], 'product_id'=>$row['productid'], 'quantity'=>$row['quantity']]);
                    }
                    else{
                        $stmt = $db->prepare("UPDATE cart SET quantity=:quantity WHERE user_id=:user_id AND product_id=:product_id");
                        $stmt->execute(['quantity'=>$row['quantity'], 'user_id'=>$user['id'], 'product_id'=>$row['productid']]);
                    }
                }
            }
            unset($_SESSION['cart']);
        }
    }






    

    try{          

      
        
        //getting product from database
        $stmt = $db->prepare("SELECT *, products.name AS prodname, category.name AS catname, products.id AS prodid,
        category.id as catid ,category.slug as catslug FROM products LEFT JOIN category ON category.id=products.category_id WHERE products.slug = :slug");
        $stmt->execute(['slug' => $slug]);//id product;
        if ($stmt->rowCount()==0) {
            header("location: 404.php");
            exit();
        }
        $product = $stmt->fetch();
        $_SESSION['prodid']=$product['prodid'];
        //getting the number of orders for this porudct
        $stmt=$db->prepare("SELECT product_id from orders  WHERE product_id=:prodid");
        $stmt->execute(['prodid'=>$product['prodid']]);
        $nborders=$stmt->rowCount();
        
        $now = date('Y-m-d');
     
        
     
        //getting total number of reviews
        $stmt=$db->prepare("SELECT * from review WHERE product_id=:prodid  ");
        $stmt->execute(['prodid'=>$product['prodid']]);
        $nbreview= $stmt->rowCount();// return the number of ligne in table resulted;

        //getting the total_review for the product ;
        $sum=0;
        foreach ($stmt as $row){
            $sum+=$row['rating'];
        }
        if ($nbreview!=0) {
            $total_rating =intval($sum/$nbreview);
        }
        else {
            $total_rating=0;
        }
        $stmt=$db->prepare("UPDATE products SET total_rating=:totalra WHERE id=:id");
        $stmt->execute(['totalra'=>$total_rating,'id'=>$product['prodid']]);

        //getting the owner of the prodct from the data base
        $stmt=$db->prepare("SELECT * FROM users Where id=:owner");
        $stmt->execute(['owner'=>$product['owner_id']]);
        $owner=$stmt->fetch();

        //upadating the counter 
        if($product['date_view'] == $now){
            $stmt = $db->prepare("UPDATE products SET counter=counter+1 WHERE id=:id");
            $stmt->execute(['id'=>$product['prodid']]);
        }
        else{
            $stmt = $db->prepare("UPDATE products SET counter=1, date_view=:now WHERE id=:id");
            $stmt->execute(['id'=>$product['prodid'], 'now'=>$now]);
        }


        
        // getting related product 
        $stmt=$db->prepare("SELECT * from products where category_id=:catid  EXCEPT SELECT * FROM products where id=:prodid limit 8 ");
        $stmt->execute(['catid'=>$product['catid'],'prodid'=>$product['prodid']]);
        $relatedproducts= $stmt->fetchAll();



    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
        header("location: 404.php");
            
    }

    $db=null;
   
?>





<!DOCTYPE html>
<html>
    <head>
    <title><?php echo $product['prodname']; ?> | ShopMeex Online Store</title>
    <?php 
        // inlude the header 

        include 'includes/header.php';


    ?>



    <!-- Start Product Details -->

    <div class="breadcrumbs">
        <div class="container">
            <div class="wrapper">
                <div class="col-35">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="
                                    <?php
                                  echo  'category.php?category='.$product['catslug'];
                                    ?>

                                ">

                                <?php echo $product['catname'] ?><i class="ti-arrow-right"></i></a></li>
                            <li class="active"> <?php echo $product['prodname'];?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-details">
        <div class="container">
            <div class="wrapper">
                <div class="row">
                    <div class="col-8">
                        <article class="gallery-wrap">
                            <div class="img-big-wrap">
                                <div>
                                    <a  <?php echo "href='images/items/".$product['photo']."'"?> data-rel="lightcase">
                                        <img <?php echo "src='images/items/".$product['photo']."'"?>>
                                </div>
                            </div>
                            <div class="thumbs-wrap">
                            <?php
                               if (!($product['photo1']=="")) { echo "
                                <a href='images/items/".$product['photo1']."' data-lc-caption='".$product['prodname']." Model N°1' data-rel='lightcase:myCollection' class='item-thumb'>
                                    <img src='images/items/".$product['photo1']."'>
                                
                                </a>";
                            }
                              if (!($product['photo2']=="")) { echo "
                                <a href='images/items/".$product['photo2']."' data-lc-caption='".$product['prodname']." Model N°2' data-rel='lightcase:myCollection' class='item-thumb'>
                                    <img src='images/items/".$product['photo2']."'>
                                
                                </a>";
                            }?>
                            </div>
                        </article>
                    </div>
                    <div class="col-8">
                        <article class="content-body">
                            <h2 class="title"><?php echo $product['prodname']; ?></h2>
                            <div class="seperator-line"></div>
                            <div class="callout" id="callout" style="display:none">
                             <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
                                <span class="message"></span>
                                <div class="seperator-line"></div>
                             </div>
                     
                            <div class="rating-wrap">
                                <ul class="rating-stars">
                                    <li style="width:80%" class="stars-active"><?php
                                        for ($i=1;$i<=$product['total_rating'];$i++){
                                                echo "<i class='fa fa-star'></i>\n";
                                            }
                                            ?>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </li>
                                </ul>
                                <small class="label-rating text-muted"> <span  class="nbreview"><?php echo $nbreview ?> </span> REVIEWS </small>
                                <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> <?php 
                                        echo $nborders?> ORDERS </small>
                            </div>

                            <div class="mb-3">
                                <var class="price h4"><?php echo '$'. number_format($product['price'], 2); ?></var>
                            </div>
                            <div class="seperator-line"></div>
                            <h3>Description </h3><br>
                            <p class="product-description"><?php echo $product['description']; ?></p>

                            <dl class="row">
                                <dt class="col-dd">Model</dt>
                                <dd class="col-dt"><?php echo $product['model'] ?></dd>

                                <dt class="col-dd">Color</dt>
                                <dd class="col-dt"><?php echo $product['colors'] ?></dd>

                              <?php if (!$owner['firstname']=="") echo "<dt class='col-dd'>by</dt>
                                <dd class='col-dt'>".$owner['firstname']." ".$owner['lastname']." </dd>";?>
                            </dl>

                            <div class="seperator-line"></div>





























                       <form class="form-inline" id="productForm">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <div class="input-group col-sm-5">
                                        <div class="input-group-btn">
                                            <button type="button" id="minus" class="btn btn-default btn-flat btn-lg"> - </button>
                                        </div>
                                        <input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
                                        <div class="input-group-btn">
                                            <button type="button" id="add" class="btn btn-default btn-flat btn-lg"> + </button>
                                        </div>
                                        <input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                </div>
                            </form>


                         

                            <a   rel="<?php echo $product['prodid']; ?>" class='add_to_wishlist'  href='#' data-title='Remove' >
                                               <i class='ti-heart' ></i>
                                                <span>Add To Wishlist</span>
                                            </a>








































                        </article>
                        <div class="tabs-wrapper">
                            <ul class="tabs">
                                <li class="description_tab active">
                                    <a href="#tab-description">about the vendor</a>
                                </li>
                                <li class="additional_information_tab">
                                    <a href="#tab-additional_information">Additional information</a>
                                </li>
                                <li class="reviews_tab">
                                    <a href="#tab-reviews">Reviews (<span  class="nbreview"><?php echo $nbreview ?> </span>)</a>
                                </li>
                            </ul>
                            <div class="paneltbs panel-1" id="tab-description">
                                <h4>Brief History</h4>
                                <p>dell for comptuer is very know for its top class product and we are proud to ber here around </p>
                                <h4>Contact</h4>
                                <p><strong>phone number: </strong><?php echo $owner['contact_info']; ?></p>
                                <p><strong>email: </strong><a href="mailto:<?php echo $owner['email']?>"><?php echo $owner['email']; ?></a></p>
                                <p><strong>website: </strong><a target="_blank" href="https://<?php echo $owner['website']?>"><?php echo $owner['website']?></a></p>
                            </div>

                            <div class="paneltbs panel-2" id="tab-additional_information" style="display: none;">
                                <h2>Additional information</h2>
                                <table class="product-attributes">
                                    <tbody>
                                        <tr class="product-attributes-item-weight">
                                            <th class="product-attributes-item__label">Weight</th>
                                            <td class="product-attributes-item__value"><?php echo $product['weight'] ?> kg</td>
                                        </tr>
                                        <tr class="product-attributes-item-dimensions">
                                            <th class="product-attributes-item__label">Dimensions</th>
                                            <td class="product-attributes-item__value"><?php echo $product['dimensions'] ?> cm</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="paneltbs panel-3" id="tab-reviews" style="display: none;">
                                <div id="reviews" class="product-reviews">
                                    <div id="comments">
                                        
                                         <ol class="commentlist">
                                            



                                        </ol>
                                    </div>
                                    <?php 
                                        if ($nbreview>3) echo  "<a href='#'' id='collapseBtn' class='more-btn'>See More Reviews</a>" ?>

                                    

                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <span id="reply-title" class="comment-reply-title">Add a review</span>
                                                <form  method="post" id="commentform" class="comment-form" novalidate="">
                                                    <p class="comment-notes"><span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span></p>
                                                    <div class="comment-form-rating">
                                                        <label for="rating">Your rating</label>
                                                        <p class="stars">
                                                            <span>
                                                                    <a class="star-1" href="#">1</a>
                                                                    <a class="star-2" href="#">2</a>
                                                                    <a class="star-3" href="#">3</a>
                                                                    <a class="star-4" href="#">4</a>
                                                                    <a class="star-5" href="#">5</a>
                                                            </span>
                                                        </p>
                                                        <select name="rating" id="rating" required="" style="display: none;">
                                                            <option value="">Rate…</option>
                                                            <option value="5">Perfect</option>
                                                            <option value="4">Good</option>
                                                            <option value="3">Average</option>
                                                            <option value="2">Not that bad</option>
                                                            <option value="1">Very poor</option>
                                                        </select>
                                                    </div>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Your review&nbsp;<span class="required">*</span></label>
                                                        <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                                                    </p>
                                                    <input type="hidden" name="prodid" value="<?php echo $product['prodid'] ?>" >
                                                    <p class="form-submit">

                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit">



                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="related-products">
                    <h2>Related products</h2>

                   

                    
                    <div class="related-wrapper">
                    <?php 
                    foreach($relatedproducts as $row) {
                      echo "<div class='tab-col'>
                            <div class='single-product'>
                                <div class='product-img'>
                                    <a href='product.php?product=".$row['slug']."'>
                                        <img src='images/items/".$row['photo']."'>
                                        <img class='hover-default' src='images/items/".$row['photo']."'>
                                    </a>
                                    <div class='button-head'>
                                        <div class='product-action'>
                                            <a href='#'>
                                                <i class='ti-eye'></i>
                                                <span>Quick View</span>
                                            </a>


                                            <a   rel=".$row['id']." class='add_to_wishlist'  href='#'  >
                                               <i class='ti-heart' ></i>
                                                <span>Add To Wishlist</span>
                                            </a>




                                            <a href='#'>
                                                <i class='ti-bar-chart-alt'></i>
                                                <span>Add To Compare</span>
                                            </a>
                                        </div>











                                        <div class='product-action-2'>
                                 

                           
            
                       
                        <a href='#' rel=".$row['id']." class='add_to_c' title='Add To Cart'>Add To Cart<i class='fa fa-shopping-cart'></i></a>
           





                            </div>









                                    </div>
                                </div>
                                <div class='product-content'>
                                    <h3>
                                    <a href='product.php?product=".$row['slug']."'>".$row['name']."</a>
                                                                    </h3>
                                    <div class='product-price-rating'>
                                        <span title='Price'>$".number_format($row['price'], 2)."</span>
                                        <ul title='Rating'>
                                            <li class='stars-active'>";

                                            for ($i=1;$i<=$row['total_rating'];$i++){
                                                echo "<i class='fa fa-star'></i>\n";
                                            }
                                                

                                            echo "</li>
                                            <li>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                                <i class='fa fa-star'></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>" ;  }
                        ?>
                      
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- End Product Details -->
  

    <!-- Start NewsLetter -->

    <?php
        //inlcude the footer and the news letter 
        include'includes/footer.php';
    ?>
    <!-- End Footer -->

    
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/TweenMax.min.js"></script>
    <script src="js/jquery.nice-select.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.zoom.js"></script>
    <script src="https://kit.fontawesome.com/5d49be4ed0.js" crossorigin="anonymous"></script>
    <script src="js/lightcase.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {});
    </script>
    <script src="js/custom.js"></script>
    <script type="text/javascript">
        $('.img-big-wrap').zoom();
        $('a[data-rel^=lightcase]').lightcase();
    </script>



<script>
$(function(){
    $('#add').click(function(e){
        e.preventDefault();
        var quantity = $('#quantity').val();
        quantity++;
        $('#quantity').val(quantity);
    });
    $('#minus').click(function(e){
        e.preventDefault();
        var quantity = $('#quantity').val();
        if(quantity > 1){
            quantity--;
        }
        $('#quantity').val(quantity);
    });

});


 


</script>

    <?php include 'includes/script.php'; ?>
    <script >


       
 


    </script>

   
</body>

</html>
