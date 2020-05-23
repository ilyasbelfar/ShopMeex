
<?php //include 'includes/session.php';
include 'includes/conn.php';?>
        <?php
              $conn = $pdo->open();
              if (isset($_POST['keyword'])) {
                    $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM products WHERE name LIKE :keyword OR description LIKE :keyword");
                    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
                    $row = $stmt->fetch();
                    if($row['numrows'] < 1){
                        echo'
                          <div class="top-row">
	            					<div class="container-top-row flex ">
	            						<span class="items-founds " id="number-res-search"><span>No results found for '.$_POST['keyword'].'</span></span>
	            						<div class="change-view flex">
	            							<form class="select-form flex">
	            								<select>
	            									<option> nouveuax</option>
	            									<option> en tendanse </option>
	            									<option> moin prix </option>
	            									<option> bla blaa blaa </option>
	            								</select>
	            							</form>
	            							<div class="flex">
	            								<button class="select-list-view">
	            									<a href="#"><i class="fa fa-bars"></i></a>
	            							    </button>	            									

	            								<button class="select-grid-view selected">
	            									<a href="#"><i class="fa fa-th"></i></a>
	            								</button>
	            							</div>
	            							
	            						</div>
	            					</div>
	            					
	            				</div>
                        ';
                    }
                    else{
                          echo'
                          <div class="top-row">
	            					<div class="container-top-row flex ">
	            						<span class="items-founds " id="number-res-search"><span>Search results for'.$_POST['keyword'].'</span></span>
	            						<div class="change-view flex">
	            							<form class="select-form flex">
	            								<select>
	            									<option> nouveuax</option>
	            									<option> en tendanse </option>
	            									<option> moin prix </option>
	            									<option> bla blaa blaa </option>
	            								</select>
	            							</form>
	            							<div class="flex">
	            								<button class="select-list-view">
	            									<a href="#"><i class="fa fa-bars"></i></a>
	            							    </button>	            									

	            								<button class="select-grid-view selected">
	            									<a href="#"><i class="fa fa-th"></i></a>
	            								</button>
	            							</div>
	            							
	            						</div>
	            					</div>
	            					
	            				</div>
                                 <article class="grid-view"> 
	            					<div class="wraapper flex flexwrap">
                        ';
                        try{
                            $inc = 3;	
                            $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE :keyword");
                            $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);

                            foreach ($stmt as $row) {
                            $highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['name']);
                            $image = (!empty($row['photo'])) ? 'images/items/'.$row['photo'] : 'images/Logo.jpg';

                            echo '
                           
                                    <div class="product-view-grid">
                                        <div class="container-product">
                                                <div class="wrapimage">
                                                    <span>new</span>
                                                    <img src="'.$image.'">
                                                </div>
                                                <div class="info">
                                                    <p> lorem ipsum dolor sit amet, </p>
                                                    <span class="new-price" style="
                                                            color: green;
                                                        "> <span class="price" style="
                                                            color: #269e39c2;
                                                            /* letter-spacing: .1em; */
                                                            font-size: 1.3em;
                                                            padding: 0;
                                                            margin: 0;
                                                        ">152</span> <span class="coin" style="
                                                            color: #269e39c2;
                                                            font-size: .8em;
                                                        ">DA</span></span>
                                                 <span class="old-price" style="
                                                            font-size: .5em;
                                                        "> <span class="price" style="
                                                            font-size: 1.8em;
                                                            color: #f6560e;
                                                        ">152</span> <span class="coin" style="
                                                            color: #f6560e;
                                                        ">DA</span> </span>
                                                    <div class="rating">
                                                        <ul class="pos-rate">
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                            </ul>
                                                        <ul class="neg-rate">
                                                             <li><a> <i class="fa fa-star"></i></a></li>
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                            <li><a> <i class="fa fa-star"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   
                            ';
                                }
                            echo' </div>
                                </article>';
                                

                        }catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
} 
                    }
                }
              
                ?>
