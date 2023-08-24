<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';
?>

<body>
  <h1>ทดสอบ</h1><br>
  <a class="btn btn-primary" href="admin_panel">Admin Login (no login bypass)</a>
  <a type="" class="btn btn-primary" href="debug.php?LoginByPass">Admin Login (login bypass)</a>
  <a class="btn btn-primary" href="admin_panel/login.php">Admin Login Page</a>
  <a class="btn btn-primary" href="admin_panel">User Page</a>

  <br><br><br>
  <form action="send_mail.php" method="post">
    Email <input type="email" name="email"> <br>
    หัวเรื่อง <input type="text" name="subject"><br>
    ข้อความ <input type="text" name="message"><br>
    <button type="submit" name="send">ส่ง</button>
  </form>
  <?php include 'includes/scripts.php'; ?>

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
</body>

</html>


<!-- 
session_unset($_SESSION['user_login']);
session_unset($_SESSION['username'] );
session_destroy(); 
-->