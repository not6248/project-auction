<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php';
?>

<body>
  <div class="container">

    <script>
      const startTime = new Date("2023-09-05 10:00:00").getTime();
      const endTime = new Date("2023-09-15 12:00:00").getTime();
      // countdown_time("time_test", startTime, endTime);
    </script>


    <h1>ทดสอบ</h1><br>
    <!-- <div id="time_test"></div> -->
    <a class="btn btn-primary" href="admin_panel">Admin Login (no login bypass)</a>
    <a type="" class="btn btn-secondary " href="debug.php?LoginByPass">Admin Login (login bypass)</a>
    <a class="btn btn-success " href="admin_panel/login.php">Admin Login Page</a>
    <a class="btn btn-info" href="./">User Page</a>
    <a class="btn btn-primary" href="../project-bc-store-main/admin/"><i class="fa-solid fa-computer"></i> bc-store-main-ADMIN</a>
    <br>

      <?php 
      echo os_sts_user("0",$os_name_arr);
      echo "<br>";
      echo os_sts_user("1",$os_name_arr);
      echo "<br>";
      
      ?>

    <?php
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


    <div>
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
    }


    // echo "<br>";
    // echo "<pre>";
    // print_r($pd_condition_arr);
    // echo "</pre>";

    // echo "<br>";
    // echo "<pre>";
    // print_r($status_name_arr);
    // echo "</pre>";
    ?>
    <br>
    <div class="input-group">
      <input type="text" size="10" class="form-control pe-1 text-end" aria-label="Dollar amount (with dot and two decimal places)">
      <span class="input-group-text px-1">0</span>
      <span class="input-group-text px-1">฿</span>
    </div>




  </div>



  <?php include 'includes/scripts.php'; ?>
</body>

</html>


<!-- 
session_unset($_SESSION['user_login']);
session_unset($_SESSION['username'] );
session_destroy(); 
-->