<?php
if (isset($_POST['add_fee']) && !empty($_POST)) {
  $fee_percent = $_POST['fee_percent'];

  if (!empty($fee_percent)) {
    $sql1 = "SELECT * FROM fee WHERE fee_percent = '$fee_percent'";
    $query1 = mysqli_query($conn, $sql1); //fee_percent
    $row_fee_percent = mysqli_num_rows($query1);
    if ($row_fee_percent > 0) {
      echo_js_alert('มีค่าบริการนี้แล้ว', '?page=fee&function=add');
    } else {
      $sql = "INSERT INTO fee (fee_percent)
              VALUES ('$fee_percent')";
      if (mysqli_query($conn, $sql)) {
        echo_js_alert('เพิ่มสำเร็จ', '?page=fee');
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
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับเพิ่มค่าบริการ</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อค่าบริการ</label>
                  <input name="fee_percent" type="number" class="form-control" placeholder="ตัวอย่าง: 15" required="required">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button name="add_fee" type="submit" class="btn btn-success">บันทึก</button>
              </form>
              <!-- Form End  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>