<?php
if (isset($_POST['add_prefix_name']) && !empty($_POST)) {
  $prefix_name = $_POST['prefix_name'];

  //check
  if (!empty($prefix_name)) {
    $sql1 = "SELECT * FROM prefix WHERE prefix_name = '$prefix_name'";
    $query1 = mysqli_query($conn, $sql1); //prefix_name
    $row_prefix_name = mysqli_num_rows($query1);
    if ($row_prefix_name > 0) {
      echo_js_alert('มีคำนำหน้านี้แล้ว', '?page=prefix&function=add');
    } else {
      $sql = "INSERT INTO prefix (prefix_name)
              VALUES ('$prefix_name')";
      if (mysqli_query($conn, $sql)) {
        echo_js_alert('เพิ่มสำเร็จ', '?page=prefix');
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับเพิ่มคำนำหน้า</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อคำนำหน้า</label>
                  <input name="prefix_name" type="text" class="form-control" placeholder="ตัวอย่าง: นาย" value="<?php echo isset($_POST['protype_name']) && !empty($_POST['protype_name']) ? ($_POST['protype_name']) : ''; ?>" required="required">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button name="add_prefix_name" type="submit" class="btn btn-success">บันทึก</button>
              </form>
              <!-- Form End  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>