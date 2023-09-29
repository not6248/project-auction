<?php
$sql = "SELECT * FROM prefix WHERE prefix_id = " . $_GET['prefix_id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<?php
// ($_POST);
if (isset($_POST['edit_prefix_name']) && !empty($_POST)) {
  $prefix_name = $_POST['prefix_name'];
  $prefix_id = $_GET['prefix_id'];
  if (!empty($prefix_name)) {
    $sql_check = "SELECT * FROM prefix WHERE prefix_name = '$prefix_name' AND prefix_id != '$prefix_id'";
    $query_check = mysqli_query($conn, $sql_check);
    $row_check = mysqli_num_rows($query_check);
    if ($row_check > 0) {
      echo_js_alert('ชื่อคำนำหน้า มีอยู่ในระบบแล้ว','back');
      // $alert = '<script>';
      // $alert .= 'alert("ชื่อคำนำหน้า กรุณากรอกใหม่อีกครั้ง");';
      // $alert .= 'window.location.href = "?page=bank&function=update&prefix_id=' . $prefix_id . '";';
      // $alert .= '</script>';
      // echo $alert;
    } else {
      $sql = "UPDATE prefix SET prefix_name = '$prefix_name'
              WHERE prefix_id =" . $_GET['prefix_id'];
      if (mysqli_query($conn, $sql)) {
        echo_js_alert('แก้ไขสำเร็จ','?page=prefix');
        // $alert = '<script>';
        // $alert .= 'alert("แก้ไขสำเร็จ");';
        // $alert .= 'window.location.href = "?page=' . $_GET['page'] . '";';
        // $alert .= '</script>';
        // echo $alert;
        // exit();
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);
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
          <h1 class="m-0">คำนำหน้า</h1>
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
              <h3 class="card-title">ฟอร์มสำหรับแก้ไขคำนำหน้า</h3>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อคำนำหน้า</label>
                  <input name="prefix_name" type="text" class="form-control" placeholder="ตัวอย่าง: kerry" value="<?= $row['prefix_name'] ?>" required="required">
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <button name="edit_prefix_name" type="submit" class="btn btn-warning">บันทึก</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>