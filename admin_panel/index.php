<!DOCTYPE html>
<html lang="en">
<?php require '../db/db_conn.php';
include 'includes/head.php';?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include 'includes/navbar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <?php
  if(!isset($_GET['page']) && empty($_GET['page'])){
    include './page/dashboard/index.php';
  }elseif((isset($_GET['page']) && $_GET['page'] == 'product')){
    include './page/product/index.php';
  }
  else{
    include './page/not_found.php';
  };
  ?>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'includes/footer.php'?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  <?php include 'includes/scripts.php'?>
</body>
</html>
