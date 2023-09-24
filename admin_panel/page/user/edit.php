<?php
$sql = "SELECT * FROM `login` INNER JOIN `user_detail` USING(user_id) WHERE user_id = {$_GET['user_id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$prefix = $row['prefix_id'];
$ud_id_card = $row['ud_id_card'];
$ud_idcard_img = $row['ud_idcard_img'];
?>

<?php
if (isset($_POST['update_user_submit'])) {
  $username = $_POST['username'] ?? "";
  $user_type = $_POST['user_type'] ?? "";
  $email = $_POST['email'] ?? "";
  $sql = "UPDATE login SET username='{$username}',user_type='{$user_type}',user_email='{$email}' WHERE user_id = {$_GET['user_id']}";
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo_js_alert(mysqli_error($conn), "back");
  } else {
    echo_js_alert("อัพเดทข้อมูลสำเร็จ", "back");
  }
} elseif (isset($_POST['update_pass_submit'])) {
  $password = $_POST['password'];
  $c_password = $_POST['c_password'];
  if ($password != $c_password) {
    echo_js_alert("รหัสผ่านไม่ตรงกัน", "back");
  } else {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE login SET password='{$passwordHash}' WHERE user_id = {$_GET['user_id']}";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo_js_alert(mysqli_error($conn), "back");
    } else {
      echo_js_alert("อัพเดทรหัสผ่านสำเร็จ", "back");
    }
  }
} elseif (isset($_POST['update_detail_submit'])) {
  $fname = $_POST['fname'] ?? "NULL";
  $lname = $_POST['lname'] ?? "NULL";
  $address = $_POST['address'] ?? "NULL";
  $tele = $_POST['tele'] ?? "NULL";
  $prefix = $_POST['prefix'] ?? "NULL";
  $ud_id_card = $_POST['ud_id_card'] ?? "NULL";
  $bank_id = $_POST['bank_id'] ?? "NULL";
  $bank_number = $_POST['bank_number'] ?? "NULL";
  $sql = "UPDATE user_detail SET 
  ud_fname='{$fname}',
  ud_lname='{$lname}',
  ud_address='{$address}',
  ud_phone='{$tele}',
  prefix_id={$prefix},
  ud_id_card='{$ud_id_card}',
  ud_bank_number='{$bank_number}',
  ud_bank_id={$bank_id} 
  WHERE user_id = {$_GET['user_id']}";
  // echo $sql;
  $result = mysqli_query($conn, $sql);
  if (!$result) {
    echo_js_alert(mysqli_error($conn), "back");
  } else {
    echo_js_alert("อัพเดทข้อมูลสำเร็จ", "back");
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับแก้ไขข้อมูลผู้ใช้</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form name="update_user" action="" method="POST">
                <div class="form-group">
                  <label>ชื่อผู้ใช้</label>
                  <input name="username" type="text" class="form-control" placeholder="Username" value="<?= $row['username'] ?? "" ?>" required="required">
                </div>
                <?php if ($row['user_type'] != 0) :  ?>
                  <div class="form-group">
                    <label for="user_type">ประเภทผู้ใช้</label><br>
                    <select name="user_type" id="" class="custom-select w-25" required>
                      <option selected disabled value="">= เลือกประเภทผู้ใช้ =</option>
                      <option <?= $row['user_type'] == 1 ? "selected" : "" ?> value="1">ผู้ซื้อ</option>
                      <option <?= $row['user_type'] == 2 ? "selected" : "" ?> value="2">ผู้ซื้อ และ ขาย</option>
                    </select>
                  </div>
                <?php endif ?>
                <div class="form-group">
                  <label>อีเมล์ผู้ใช้</label>
                  <input name="email" type="email" class="form-control" placeholder="Email" value="<?= $row['user_email'] ?? "" ?>" required="required">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button name="update_user_submit" type="submit" class="btn btn-primary">ยืนยันการแก้ไข</button>
              </form>
              <!-- Form End  -->
            </div>
          </div>
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับแก้ไขรหัสผ่านผู้ใช้</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form name="update_pass" action="" method="POST">
                <div class="card">
                  <div class="card-body">
                    <?=$row['password']?>
                  </div>
                </div>
                <div class="form-group">
                  <label>รหัสผ่านใหม่</label>
                  <input name="password" type="password" class="form-control" placeholder="Password" value="" required="required">
                </div>
                <div class="form-group">
                  <label>ยืนยันรหัสผ่านใหม่</label>
                  <input name="c_password" type="password" class="form-control" placeholder="Password" value="" required="required">
                </div>
            </div>
            <div class="card-footer">
              <button name="update_pass_submit" type="submit" class="btn btn-success">ยืนยันการแก้ไข</button>
              </form>
              <!-- Form End  -->
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับแก้ไขรายละเอียดผู้ใช้</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form id="profil-detail-update-form" action="" method="post">

                <!-- ชื่อ -->
                <div class="form-group">
                  <label>ชื่อ</label>
                  <input name="fname" type="text" class="form-control" placeholder="ชื่อ" value="<?= $row['ud_fname'] ?? "" ?>">
                </div>
                <!-- นามสกุล -->
                <div class="form-group">
                  <label>นามสกุล</label>
                  <input name="lname" type="text" class="form-control" placeholder="นามสกุล" value="<?= $row['ud_lname'] ?? "" ?>">
                </div>
                <!-- ที่อยู่ -->
                <div class="form-group">
                  <label>ที่อยู่ (ในการจัดส่ง)</label>
                  <input name="address" type="text" class="form-control" placeholder="ที่อยู่ (ในการจัดส่ง)" value="<?= $row['ud_address'] ?? "" ?>">
                </div>
                <!-- อีเมล์ -->
                <div class="form-group">
                  <label>เบอร์โทรศัพท์</label>
                  <input name="tele" type="number" class="form-control" placeholder="เบอร์โทรศัพท์" value="<?= $row['ud_phone'] ?>">
                </div>

                <!-- radio -->
                <?php
                $sql3 = "SELECT * FROM prefix";
                $resultprefix = mysqli_query($conn, $sql3);

                ?>
                <div class="form-group">
                  <label class="mb-1">คำนำหน้าชื่อ</label><br>
                  <div class="form-check form-check-inline">
                    <?php foreach ($resultprefix as $row_p) : ?>
                      <input class="form-check-input" type="radio" name="prefix" value="<?= $row_p['prefix_id'] ?>" <?= isset($prefix) && $prefix == $row_p['prefix_id'] ? "checked" : "" ?>>
                      <label class="form-check-label mr-2"><?= $row_p['prefix_name'] ?></label>
                      <?php endforeach ?>
                      <input class="form-check-input" type="radio" name="prefix" value="NULL" ?>
                      <label class="form-check-label mr-2">SET NULL</label>
                  </div>
                </div>

                <!-- End radio -->
                <?php
                if ($_SESSION['user_type'] == 1) {
                  $idCardMessage = "";
                  $label = "อัปโหลด รูปภาพ บัตรประชาชน";

                  if ($ud_idcard_img == NULL) {
                    $idCardMessage = "ยังไม่ทำการยืนยันบัตรประชาชน";
                  } else if ($ud_id_card == NULL) {
                    $idCardMessage = "บัตรประชาชนรอการตรวจสอบ";
                    $label = "";
                  } elseif ($ud_id_card == 0) {
                    $idCardMessage = "ภาพไม่สมบูรณ์ กรุณาอัพโหลดใหม่อีกครั้ง";
                    $label = "ภาพไม่สมบูรณ์ กรุณาอัพโหลดใหม่อีกครั้ง";
                  } else {
                    $idCardMessage = "บัตรประชาชนตรวจสอบแล้ว กรุณาเข้าสู่ระบบใหม่";
                    $label = "";
                  }
                } else {
                  $idCardMessage = "ยืนยันแล้ว";
                  $label = "ตอนนี้ คุณสามารถลงสินค้าได้แล้ว";
                }
                ?>
                <div class="mb-1 w-50">
                  <label class="mb-1">สถานะบัตรประชาชน</label><br>
                  <input class="pl-3 form-control " type="text" disabled value="<?= $idCardMessage ?>">
                  <label style="font-size: 12px;"><?= $label ?></label>
                </div>

                <div class="form-group">
                  <label>หมายเลขบัตรประชาชน</label>
                  <input name="ud_id_card" type="number" class="form-control" placeholder="หมายเลขบัตรประชาชน" value="<?= $row['ud_id_card'] ?>">
                </div>

                <?php if ($_GET['user_id'] != 2) : ?>
                  <div class="form-group mb-1 mt-3" id="bank">
                    <label class="mb-1">ธนาคาร</label><br>
                    <div class="form-check form-check-inline">
                      <?php foreach ($bank_arr as $index => $v) : ?>
                        <input value="<?= $index ?>" type="radio" class="form-check-input" name="bank_id" <?= isset($row['ud_bank_id']) && $index == $row['ud_bank_id'] ? "checked" : "" ?>>
                        <label class="form-check-label mr-2" for="prefix-1"><?= $v ?></label>
                        <?php endforeach ?>
                        <input value="NULL" type="radio" class="form-check-input" name="bank_id">
                        <label class="form-check-label mr-2" for="prefix-1">SET NULL</label>

                    </div>
                  </div>
                  <div class="form-group">
                    <label class="mb-1">เลขบัญชี</label>
                    <input type="number" name="bank_number" class="ms-0 ps-3 form-control" value="<?= $row['ud_bank_number'] ?>">
                  </div>
                <?php endif ?>
            </div>
            <div class="card-footer">
              <button name="update_detail_submit" class="btn btn-primary" type="submit" style="border-radius: 7px;">ยืนยันการแก้ไข</button>
              </form>
            </div>

            <!-- end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>