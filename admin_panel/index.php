<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <?php
    $page = $_GET['page'] ?? '';
    $function = $_GET['function'] ?? "";

    switch ($page) {
      case '':
        include './page/dashboard/index.php';
        break;
      case 'user':
        include './page/user/index.php';
        break;
      case 'product':
        include './page/product/index.php';
        break;
      case 'order':
        include './page/order/index.php';
        break;
      case 'prefix':
        include './page/prefix/index.php';
        break;
      case 'product_type':
        include './page/product_type/index.php';
        break;
      case 'delivery_type':
        include './page/delivery_type/index.php';
        break;
      case 'bank':
        include './page/bank/index.php';
        break;
      case 'id_card_verified':
        if ($function == 'detail') {
          include './page/id_card_verified/detail.php';
        } else {
          include './page/id_card_verified/index.php';
        }
        break;
      case 'receipt_verified':
        if ($function == 'detail') {
          include './page/receipt_verified/detail.php';
        } else {
          include './page/receipt_verified/index.php';
        }
        break;
      default:
        include './page/not_found.php';
        break;
    }

    ?>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php include 'includes/footer.php' ?>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <?php include 'includes/scripts.php' ?>
</body>

</html>