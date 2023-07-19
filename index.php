<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';
session_start(); ?>

<body>
  <h1>ทดสอบ</h1><br>
  <a class="btn btn-primary" href="admin_panel">Admin Login (no login bypass)</a>
  <a type="" class="btn btn-primary" href="index.php?LoginByPass">Admin Login (login bypass)</a>
  <a class="btn btn-primary" href="admin_panel/login.php">Admin Login Page</a>
  <a class="btn btn-primary" href="admin_panel">User Page</a>
  <?php include 'includes/scripts.php'; ?>

  <?php
  unset($_SESSION['admin_login']);
  if (isset($_GET['LoginByPass'])) {
    echo 'ทดสอบ';
    $_SESSION['admin_login'] = "";
    header("location: admin_panel");
  }

  ?>
</body>

</html>