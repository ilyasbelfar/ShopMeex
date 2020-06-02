<?php include 'includes/session.php'; ?>
<?php
  if(!isset($_GET['user'])){
    header('location: users.php');
    exit();
  }
  else{
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$_GET['user']]);
    $user = $stmt->fetch();
    $pdo->close();
  }
include 'includes/header-admin.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div >
    <?php include 'includes/sidebar.php';?>
    <div class="content">
        <?php
            include 'includes/topbar.php';
      ?>
        
        <main class="main-content">
        <div class="main-content">
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
            <div class="head ">
              <a onClick="addpro(<?php echo $user['id']; ?>)" data-toggle="modal" id="add" data-id="<?php echo $user['id']; ?>" ><i class="fa fa-plus"></i> New</a>
              <a href="user.php"><i class="fa fa-arrow-left"></i> Users</a>
            </div>
              <div class="row" style=" background-color:#fff;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    padding: 20px 10px;
    font-size: .;
    justify-content: space-between;
"><div><div class="dataTables_length" id="example1_length"><label style="
    font-size: .8em;
    font-weight: 700;
">Show <select name="example1_length" aria-controls="example1" class="form-control input-sm" style="
    padding: 3px;
    border: 0;
    outline: 0;
"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></label></div></div><div><div id="example1_filter" class="dataTables_filter"><label style="
    font-size: .8em;
    font-weight: 700;
">Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1" style="
    padding: 2px;
"></label></div></div></div>
            <div class="content-box">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();

                    try{
                      $stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart RIGHT JOIN products ON products.id=cart.product_id WHERE user_id=:user_id");
                      $stmt->execute(['user_id'=>$user['id']]);
                      foreach($stmt as $row){
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
                            <td>".$row['quantity']."</td>
                            <td>
                              <button onClick=\"edquan('".$row['name']."','".$row['quantity']."','".$user['id']."','".$row['cartid']."')\" style=\"background-color: #00ac5a;padding: 8px;font-size: .8em;border-radius: 0\"  data-id='".$row['cartid']."'><i class='fa fa-edit'></i> Edit Quantity</button>
                              <button onClick=\"delpro('".$row['name']."','".$row['cartid']."','".$user['id']."')\" style=\"border-radius: 0;font-size: .8em;background-color: #dd4b39;padding: 8px;\"
                                    data-id='".$row['cartid']."'><i class='fa fa-trash'></i> Delete</button>
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
<?php include "includes/cart_modal.php"?>

  <!-- Content Wrapper. Contains page content -->
  


    <!-- Main content -->
    
<!-- ./wrapper -->
    

    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/dist/Chart.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <?php include "includes/carts.php" ?>
<script>
$(function(){
  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('#add').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getProducts(id);
  });

  $("#addnew").on("hidden.bs.modal", function () {
      $('.append_items').remove();
  });

});

function getProducts(id){
  $.ajax({
    type: 'POST',
    url: 'products_all.php',
    dataType: 'json',
    success: function(response){
      $('#product').append(response);
      $('.userid').val(id);
    }
  });
}

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'cart_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.cartid').val(response.cartid);
      $('.userid').val(response.user_id);
      $('.productname').html(response.name);
      $('#edit_quantity').val(response.quantity);
    }
  });
}
</script>

    </body>
</html>







    <!-- Content Header (Page header) -->
<!--
    <section class="content-header">
      <h1>
        php echo $user['firstname'].' '.$user['lastname'].'`s Cart' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active">Cart</li>
      </ol>
    </section>
-->