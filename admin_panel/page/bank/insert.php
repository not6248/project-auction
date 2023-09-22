<?php
if (isset($_POST['add_bank']) && !empty($_POST)) {
  $bank_name = $_POST['bank_name'];

  //check
  if (!empty($bank_name)) {
    $sql1 = "SELECT * FROM bank WHERE bank_name = '$bank_name'";
    $query1 = mysqli_query($conn, $sql1); //bank_name
    $row_bank_name = mysqli_num_rows($query1);
    if ($row_bank_name > 0) {
      echo '<script>
            alert("มีธนาคารนี้แล้ว");
            window.location.href = "?page=bank&function=add";
            </script>';
      exit();
    } else {
      $sql = "INSERT INTO bank (bank_name)
              VALUES ('$bank_name')";
      if (mysqli_query($conn, $sql)) {
        $alert = '<script>';
        $alert .= 'alert("เพิ่มธนาคารสำเร็จ");';
        $alert .= 'window.location.href = "?page=bank";';
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
          <h1 class="m-0">ธนาคาร</h1>
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
              <h3 class="card-title">ฟอร์มสำหรับธนาคาร</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <!-- Start Form -->
              <form action="" method="POST">
                <div class="form-group">
                  <label>ชื่อธนาคาร</label>
                  <input name="bank_name" type="text" class="form-control" placeholder="ตัวอย่าง: พร้อมเพย์" value="<?php echo isset($_POST['protype_name']) && !empty($_POST['protype_name']) ? ($_POST['protype_name']) : ''; ?>" required="required">
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button name="add_bank" type="submit" class="btn btn-success">บันทึก</button>
              </form>
              <!-- Form End  -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>