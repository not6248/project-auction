<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';
session_start(); ?>

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
    ข้อความ <input type="text" name="message" ><br>
    <button type="submit" name="send" >ส่ง</button>
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
</body>

</html>