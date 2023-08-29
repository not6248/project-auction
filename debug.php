<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';
?>

<body>
  <h1>ทดสอบ</h1><br>
  <a class="btn btn-primary" href="admin_panel">Admin Login (no login bypass)</a>
  <a type="" class="btn btn-secondary " href="debug.php?LoginByPass">Admin Login (login bypass)</a>
  <a class="btn btn-success " href="admin_panel/login.php">Admin Login Page</a>
  <a class="btn btn-info" href="./">User Page</a>
  <br>

  <?php
  unset($_SESSION['admin_login']);
  if (isset($_GET['LoginByPass'])) {
    echo 'ทดสอบ';
    $_SESSION['admin_login'] = "";
    header("location: admin_panel");
  }
  ?>

  <br><br>
  <?php
 
  if (!empty($_SESSION)) {
    echo '<pre style="font-size:20px">';
    var_dump($_SESSION);
    echo '</pre>';
  } else {
    echo "SESSION empty";
  }
  ?>

  <?php 
  if (isset($_POST['clear_session'])) {
    session_unset();
    session_destroy();
    echo '<script>window.location.href = "./debug.php";</script>';

}
  ?>

  <form method="post">
    <input type="submit" name="clear_session" value="Clear Session">
  </form>
  <?php include 'includes/scripts.php'; ?>
</body>

</html>


<!-- 
session_unset($_SESSION['user_login']);
session_unset($_SESSION['username'] );
session_destroy(); 
-->