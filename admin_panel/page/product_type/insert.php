<?php
if (isset($_POST['add_dlvt']) && !empty($_POST)) {
  $pd_type_name = $_POST['pd_type_name'];

  //check
  if (!empty($pd_type_name)) {
    $sql1 = "SELECT * FROM product_type WHERE pd_type_name = '$pd_type_name'";
    $query1 = mysqli_query($conn, $sql1); //pd_type_name
    $row_pd_type_name = mysqli_num_rows($query1);
    if ($row_pd_type_name > 0) {
      echo '<script>
            alert("มีประเภทสินค้านี้แล้ว");
            window.location.href = "?page=product_type&function=add";
            </script>';
      exit();
    } else {
      $sql = "INSERT INTO product_type (pd_type_name)
              VALUES ('$pd_type_name')";
      if (mysqli_query($conn, $sql)) {
        $alert = '<script>';
        $alert .= 'alert("เพิ่มประเภทสินค้าสำเร็จ");';
        $alert .= 'window.location.href = "?page=product_type";';
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
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับประเภทสินค้า</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อประเภทสินค้า</label>
                  <input name="pd_type_name" type="text" class="form-control" placeholder="ตัวอย่าง: Collector’s Vinyls" value="<?php echo isset($_POST['protype_name']) && !empty($_POST['protype_name']) ? ($_POST['protype_name']) : ''; ?>" required="required">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button name="add_dlvt" type="submit" class="btn btn-success">บันทึก</button>
              </form>
              <!-- Form End  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>