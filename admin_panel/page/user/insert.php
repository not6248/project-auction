<?php
if (isset($_POST['add_user']) && !empty($_POST)) {

  //if user signup button
  $username   = mysqli_real_escape_string($conn, $_POST['username']);
  $email      = mysqli_real_escape_string($conn, $_POST['email']);
  $password   = mysqli_real_escape_string($conn, $_POST['password']);
  $c_password = mysqli_real_escape_string($conn, $_POST['c_password']);
  $user_type  = mysqli_real_escape_string($conn, $_POST['user_type']);

  if (!$username) {
    echo_js_alert("กรุณากรอกชื่อผู้ใช้", "back");
  } elseif (!($email)) {
    echo_js_alert("กรุณากรอกอีเมล", "back");
  } elseif (!($password)) {
    echo_js_alert("กรุณากรอกรหัสผ่าน", "back");
  } elseif (!($c_password)) {
    echo_js_alert("กรุณายืนยันรหัสผ่าน", "back");
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo_js_alert("รูปแบบอีเมลไม่ถูกต้อง", "back");
  } elseif (strlen($password) > 20 || strlen($password) < 5) {
    echo_js_alert("รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร", "back");
  } elseif ($password != $c_password) {
    echo_js_alert("รหัสผ่านไม่ตรงกัน", "back");
  }

  $check_email = mysqli_prepare($conn, "SELECT user_email FROM login WHERE user_email = ?");
  mysqli_stmt_bind_param($check_email, "s", $email);
  mysqli_stmt_execute($check_email);
  $result = mysqli_stmt_get_result($check_email);


  if (mysqli_num_rows($result) > 0) {
    echo_js_alert("มีอีเมลนี้อยู่ในระบบแล้ว", "back");
    // echoJson_status_msg("warning", "มีอีเมลนี้อยู่ในระบบแล้ว คลิกที่ปุ่ม เพื่อเข้าสู่ระบบ");
    // $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signin.php'>คลิ๊กที่นี่</a> เพื่อเข้าสู่ระบบ";
  } elseif (!isset($_SESSION['error'])) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_begin_transaction($conn);

    $stmt1 = mysqli_prepare($conn, "INSERT INTO login (username,password,user_type,user_email,email_verified_status ) VALUES (?,?,?,?,1)");
    mysqli_stmt_bind_param($stmt1, "ssis", $username, $passwordHash, $user_type, $email);
    $execute1 = mysqli_stmt_execute($stmt1);

    $last_user_id = mysqli_insert_id($conn);

    $stmt2 = mysqli_prepare($conn, "INSERT INTO user_detail (ud_id, user_id) VALUES (?,?)");
    mysqli_stmt_bind_param($stmt2, "ii", $last_user_id, $last_user_id);
    $execute2 = mysqli_stmt_execute($stmt2);

    if ($execute1 && $execute2) {
      // เรียกใช้ mysqli_commit เมื่อทุกคำสั่ง SQL ทำงานสำเร็จ
      mysqli_commit($conn);
      echo_js_alert("บันทึกข้อมูลสำเร็จ", "?page=user");
    }
  } else {
    mysqli_rollback($conn);
    echo_js_alert("เกิดข้อผิดพลาดในการบันทึกข้อมูล", "back");
    // echoJson_status_msg("error", "เกิดข้อผิดพลาดในการบันทึกข้อมูล");
  }
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ข้อมูลผู้ใช้</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับกรอกข้อมูลผู้ใช้</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อผู้ใช้</label>
                  <input name="username" type="text" class="form-control" placeholder="Username" value="" required="required">
                </div>
                <div class="form-group">
                  <label>รหัสผ่าน</label>
                  <input name="password" type="password" class="form-control" placeholder="Password" value="" required="required">
                </div>
                <div class="form-group">
                  <label>ยืนยันรหัสผ่าน</label>
                  <input name="c_password" type="password" class="form-control" placeholder="Password" value="" required="required">
                </div>
                <div class="form-group">
                  <label for="user_type">ประเภทผู้ใช้</label><br>
                  <select name="user_type" id="" class="custom-select w-25" required>
                    <option selected disabled value="">= เลือกประเภทผู้ใช้ =</option>
                    <option value="1">ผู้ซื้อ</option>
                    <option value="2">ผู้ซื้อ และ ขาย</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>อีเมล์ผู้ใช้</label>
                  <input name="email" type="email" class="form-control" placeholder="Email" value="" required="required">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button name="add_user" type="submit" class="btn btn-success">บันทึก</button>
              </form>
              <!-- Form End  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>