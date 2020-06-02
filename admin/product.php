<?php include 'includes/session.php';
$where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['category'];
    $where = 'WHERE category_id ='.$catid;
  }
?>
<?php include 'includes/header-admin.php'; ?>
<body>
<div>
 <?php include 'includes/sidebar.php';?>
  <div class="content">
        <?php
            include 'includes/topbar.php';
      ?>
      <main class="main-content">
        <div class="main-content">

    <!-- Main content -->
              <?php
               if(isset($_SESSION['error'])){
          echo "
            <div style=\"background-color: #dd4b39;color: #fff;padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 3px;font-size: .8em;\" class=\"modal-error\">
              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
              <h4 style=\"padding: 5px;font-size: 1.3em;\"><i class=\"icon fa fa-warning\"></i> Error!</h4>
              ".$_SESSION['error']."
            </div>";
          unset($_SESSION['error']);
        }
                if(isset($_SESSION['success'])){
                        echo"<div class=\"modal-succes\" style=\"background-color: #00a65a !important;font-size: .7em; color: #fff !important; border-color: #008d4c; border-radius: 3px;padding-right: 35px;padding:  15px;margin-bottom: 20px;border: 1px solid transparent;\">
                            <button style='color: #000;position: relative;top: -2px;float: right;font-size: 21px;font-weight: 700;line-height: 1;right: -5px;opacity: .2;'type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">×</button>
                            <h4 style='font-weight: 600;margin-right: 10px;    font-size: 1.4em;padding: 0 0 10px 0;'><i class=\"icon fa fa-check\"></i> Success!</h4>".$_SESSION['success'].
                            "</div>";
                        unset($_SESSION['success']);
                    }
                ?>
         
                
              <div class="user-show">
                <div class="container">
                    <div class="head  head-prod">
                      <a onclick="addnewprod()" data-toggle="modal"  id="addproduct"><i class="fa fa-plus"></i> New</a>
                      <div class="pull-right" style="margin-right: -16px">
                        <form class="form-inline">
                          <div class="form-group">
                            <label>Category: </label>
                            <select class="form-control input-sm" id="select_category">
                              <option value="0">ALL</option>
                              <?php
                                $conn = $pdo->open();

                                $stmt = $conn->prepare("SELECT * FROM category");
                                $stmt->execute();

                                foreach($stmt as $crow){
                                  $selected = ($crow['id'] == $catid) ? 'selected' : ''; 
                                  echo "
                                    <option value='".$crow['id']."' ".$selected.">".$crow['name']."</option>
                                  ";
                                }

                                $pdo->close();
                              ?>
                            </select>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="row flex"> 
                        <div class="dataTables_length" id="example1_length">
                            <label>Show 
                                <select name="example1_length" aria-controls="example1">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> 
                            </label>
                        </div>
                        <div class="forserach" style="padding: 0 10px;">
                            <div id="example1_filter" class="dataTables_filter">
                                <label>Search:
                                    <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="content-box">
                      <table id="example1" class="table table-bordered">
                        <thead>
                          <th>Name</th>
                          <th>Photo</th>
                          <th>Description</th>
                          <th>Price</th>
                          <th>Views Today</th>
                          <th>Tools</th>
                        </thead>
                        <tbody>
                          <?php
                            $conn = $pdo->open();

                            try{
                              $now = date('Y-m-d');
                              $stmt = $conn->prepare("SELECT * FROM products $where");
                              $stmt->execute();
                              foreach($stmt as $row){
                                $image = (!empty($row['photo'])) ? '../images/'.$row['photo'] : '../images/noimage.jpg';
                                $counter = ($row['date_view'] == $now) ? $row['counter'] : 0;
                                echo "
                                  <tr>
                                    <td class='text'>".$row['name']."</td>
                                    <td class='flex'>
                                      <img src='".$image."' height='30px' width='30px'>
                                      <span class='pull-right'><a onClick=\"edphot('".$row['id']."','".$row['name']."')\" class='photo' data-toggle='modal' ><i class='fa fa-edit'></i></a></span>
                                    </td>
                                    <td class='view'><a onClick=\"descr('".$row['name']."','".$row['description']."')\" data-toggle='modal'  data-id='".$row['id']."'><i class='fa fa-search'></i> View</a></td>
                                    <td class='text'>&#36; ".number_format($row['price'], 2)."</td>
                                    <td class='text'>".$counter."</td>
                                    <td class='tools'>
                                      <button onClick=\"edprod('".$row['id']."','".$row['name']."','".$row['category_id']."','".$row['price']."','".$row['description']."')\" ><i class='fa fa-edit'></i> Edit</button>
                                      <button onClick=\"delproduct('".$row['id']."','".$row['name']."')\"><i class='fa fa-trash'></i> Delete</button>
                                    </td>
                                  </tr>
                                ";
                              }
                            }
                            catch(PDOException $e){
                              echo $e->getMessage();
                            }

                            $pdo->close();
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
        
          </div>
    </main>
    </div>
</div>
    <?php include "includes/product_modal.php"?>
    
    
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/dist/Chart.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <?php include "includes/user.php"?>

</body>