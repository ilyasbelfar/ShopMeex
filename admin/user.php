<?php include 'includes/session.php'; ?>
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
        <?php
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
                
                include 'includes/menu.php';
                ?>
          </div>
    </main>
    </div>
</div>
    <?php include "includes/user-modal.php" ?>
    
    <script type="text/javascript" src="js/admin.js"></script>
    <script type="text/javascript" src="js/dist/Chart.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <?php include "includes/user.php"?>
</body>