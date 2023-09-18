<?php
if (isset($_POST['add_dlvt']) && !empty($_POST)) {
  $dlvt_name = $_POST['dlvt_name'];

  //check
  if (!empty($dlvt_name)) {
    $sql1 = "SELECT * FROM delivery_type WHERE dlvt_name = '$dlvt_name'";
    $query1 = mysqli_query($conn, $sql1); //dlvt_name
    $row_dlvt_name = mysqli_num_rows($query1);
    if ($row_dlvt_name > 0) {
      echo '<script>
            alert("มีประเภทขนส่งนี้แล้ว");
            window.location.href = "?page=delivery_type&function=add";
            </script>';
      exit();
    } else {
      $sql = "INSERT INTO delivery_type (dlvt_name)
              VALUES ('$dlvt_name')";
      if (mysqli_query($conn, $sql)) {
        $alert = '<script>';
        $alert .= 'alert("เพิ่มประเภทขนส่งสำเร็จ");';
        $alert .= 'window.location.href = "?page=delivery_type";';
        $alert .= '</script>';
        echo $alert;
        exit();
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
          <h1 class="m-0">ประเภทสินค้า</h1>
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับประเภทขนส่ง</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อประเภทขนส่ง</label>
                  <input name="dlvt_name" type="text" class="form-control" placeholder="ตัวอย่าง: kerry" value="<?php echo isset($_POST['protype_name']) && !empty($_POST['protype_name']) ? ($_POST['protype_name']) : ''; ?>" required="required">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button name="add_dlvt" type="submit" class="btn btn-primary">บันทึก</button>
              </form>
              <!-- Form End  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>