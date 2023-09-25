<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
  <div>

  </div>
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
        // ====================================================================================================
      case 'user':
        if ($function == 'add') {
          include './page/user/insert.php';
        } elseif ($function == 'delete') {
          include './page/user/delete.php';
        } elseif ($function == 'update') {
          include './page/user/edit.php';
        } elseif ($function == 'detail') {
          include './page/user/detail.php';
        } else {
          include './page/user/index.php';
        }
        break;
        // ====================================================================================================
      case 'product':
        if ($function == 'add') {
          include './page/product/insert.php';
        } elseif ($function == 'delete') {
          include './page/product/delete.php';
        } elseif ($function == 'update') {
          include './page/product/edit.php';
        } elseif ($function == 'detail') {
          include './page/product/detail.php';
        } else {
          include './page/product/index.php';
        }
        break;
        // ====================================================================================================
      case 'order':
        if ($function == 'detail') {
          include './page/order/detail.php';
        } else {
          include './page/order/index.php';
        }
        break;
        // ====================================================================================================
      case 'prefix':
        include './page/prefix/index.php';
        break;
        // ====================================================================================================
      case 'product_type':
        if ($function == 'add') {
          include './page/product_type/insert.php';
        } elseif ($function == 'delete') {
          include './page/product_type/delete.php';
        } elseif ($function == 'update') {
          include './page/product_type/edit.php';
        } else {
          include './page/product_type/index.php';
        }
        break;
        // ====================================================================================================
      case 'delivery_type':
        if ($function == 'add') {
          include './page/delivery_type/insert.php';
        } elseif ($function == 'delete') {
          include './page/delivery_type/delete.php';
        } elseif ($function == 'update') {
          include './page/delivery_type/edit.php';
        } else {
          include './page/delivery_type/index.php';
        }
        break;
        // ====================================================================================================
      case 'bank':
        if ($function == 'add') {
          include './page/bank/insert.php';
        } elseif ($function == 'delete') {
          include './page/bank/delete.php';
        } elseif ($function == 'update') {
          include './page/bank/edit.php';
        } else {
          include './page/bank/index.php';
        }
        break;
        // ==================================================================================================== 
      case 'id_card_verified':
        if ($function == 'detail') {
          include './page/id_card_verified/detail.php';
        } else {
          include './page/id_card_verified/index.php';
        }
        break;
        // ====================================================================================================
      case 'receipt_verified':
        if ($function == 'detail') {
          include './page/receipt_verified/detail.php';
        } else {
          include './page/receipt_verified/index.php';
        }
        break;
        // ====================================================================================================
      case 'pay_seller':
        if ($function == 'detail') {
          include './page/pay_seller/detail.php';
        } else {
          include './page/pay_seller/index.php';
        }
        break;
        // ====================================================================================================
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
