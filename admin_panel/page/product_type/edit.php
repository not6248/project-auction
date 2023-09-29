<?php
if (isset($_POST['pd_type_name']) && !empty($_POST['pd_type_name'])) {
  $pd_type_name = $_POST['pd_type_name'];
  $pd_type_id = $_GET['pd_type_id'];

  $sql_check = "SELECT * FROM product_type WHERE pd_type_name = '$pd_type_name' AND pd_type_id != '$pd_type_id'";
  $query_check = mysqli_query($conn, $sql_check);
  $row_check = mysqli_num_rows($query_check);

  if ($row_check > 0) {
    $alert = '<script>';
    $alert .= 'alert("ชื่อประเภทสินค้าซ้ำ กรุณากรอกใหม่อีกครั้ง");';
    $alert .= 'window.location.href = "?page=product_type&function=update&pd_type_id=' . $pd_type_id . '";';
    $alert .= '</script>';
    echo $alert;
    exit();
  } else {
    $sql = "UPDATE product_type SET pd_type_name = '$pd_type_name' WHERE pd_type_id =" . $_GET['pd_type_id'];
    if (mysqli_query($conn, $sql)) {
      $alert = '<script>';
      $alert .= 'alert("แก้ไขสำเร็จ");';
      $alert .= 'window.location.href = "?page=' . $_GET['page'] . '";';
      $alert .= '</script>';
      echo $alert;
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}

$sql = "SELECT * FROM product_type WHERE pd_type_id = " . $_GET['pd_type_id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
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
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">ฟอร์มสำหรับแก้ไขประเภทสินค้า</h3>
            </div>
            <div class="card-body">
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อประเภทสินค้า</label>
                  <input name="pd_type_name" type="text" class="form-control" placeholder="ตัวอย่าง: kerry" value="<?= $row['pd_type_name'] ?>" required="required">
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card-footer">
              <button name="add_dlvt" type="submit" class="btn btn-warning">บันทึก</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>