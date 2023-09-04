
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';
?>

<body>
  <div class="container">
    <h1>ทดสอบ</h1><br>
    <a class="btn btn-primary" href="admin_panel">Admin Login (no login bypass)</a>
    <a type="" class="btn btn-secondary " href="debug.php?LoginByPass">Admin Login (login bypass)</a>
    <a class="btn btn-success " href="admin_panel/login.php">Admin Login Page</a>
    <a class="btn btn-info" href="./">User Page</a>
    <a class="btn btn-primary" href="../project-bc-store-main/admin/"><i class="fa-solid fa-computer"></i> bc-store-main-ADMIN</a>
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

    <div class="row mt-5 mb-5">
      <h2>Email & Password</h2>
      <div class="col-3">
        <div class="card" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class=" fw-bold list-group-item">admin@admin.com</li>
            <li class="list-group-item">admin0000</li>
            <li class="list-group-item">UserType : ADMIN</li>
          </ul>
        </div>
      </div>
      <div class="col-3">
        <div class="card" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class="fw-bold list-group-item">b@hotmail.com</li>
            <li class="list-group-item">111111</li>
            <li class="list-group-item">UserType : Bider</li>
          </ul>
        </div>
      </div>
      <div class="col-3">
        <div class="card" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li class="fw-bold list-group-item">s@hotmail.com</li>
            <li class="list-group-item">111111</li>
            <li class="list-group-item">UserType : Seller</li>
          </ul>
        </div>
      </div>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
      <input type="file" name="product_img[]" id="" multiple>
      <button type="submit" name="add_img">add img</button>
    </form>

    <?php
  if (isset($_POST['add_img'])) {
    $filenames = $_FILES['product_img']['name'];
    echo "<br>";
    echo "Uploaded filenames:<br>";

    foreach ($filenames as $filename) {
      echo $filename . "<br>";
    }
    echo "<br>";
    echo "Uploaded filenames as an array:<br>";
    echo "<pre>";
    print_r($filenames);
    echo "</pre>";
  }
  ?>


  </div>



  <?php include 'includes/scripts.php'; ?>
</body>

</html>


<!-- 
session_unset($_SESSION['user_login']);
session_unset($_SESSION['username'] );
session_destroy(); 
-->