<?php
$sql = "SELECT * FROM fee WHERE fee_id = " . $_GET['fee_id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<?php
if (isset($_POST['edit_fee']) && !empty($_POST)) {
  $fee_percent = $_POST['fee_percent'];
  $fee_id = $_GET['fee_id'];
  if (!empty($fee_percent)) {
    $sql_check = "SELECT * FROM fee WHERE fee_percent = '$fee_percent' AND fee_id != '$fee_id'";
    $query_check = mysqli_query($conn, $sql_check);
    $row_check = mysqli_num_rows($query_check);
    if ($row_check > 0) {
      echo_js_alert('ชื่อค่าบริการ มีอยู่ในระบบแล้ว', 'back');
    } else {
      $chack = "SELECT * FROM `fee` WHERE fee_id = $fee_id AND fee_active = 1";
      $result = mysqli_query($conn, $chack);
      if (mysqli_num_rows($result) > 0) {
        echo_js_alert('ไม่สามารถแก้ไขค่าบริการที่กำลังเปิดใช้งานได้', 'back');
      } else {
        $sql = "UPDATE fee SET fee_percent = '$fee_percent' WHERE fee_id = $fee_id;";
        if (mysqli_query($conn, $sql)) {
          echo_js_alert('แก้ไขสำเร็จ', '?page=fee');
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    }
  }
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">ค่าบริการ</h1>
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
        <div class="col-lg-4">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับแก้ไขค่าบริการ</h3>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อค่าบริการ</label>
                  <input name="fee_percent" type="text" class="form-control" placeholder="ตัวอย่าง: 15" value="<?= $row['fee_percent'] ?>" required="required">
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <button name="edit_fee" type="submit" class="btn btn-warning">บันทึก</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>