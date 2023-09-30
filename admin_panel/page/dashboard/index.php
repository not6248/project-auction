<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
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
    <div class="container-fluid"></div>
    <div class="row">
      <!-- ====================================================================== -->
      <?php 
      $sql="SELECT COUNT(*) AS count_pd FROM product;";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner pb-3">
            <h3><?=$row['count_pd']?></h3>
            <p>สินค้าทั้งหมดภายในเว็บไซต์</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-boxes-stacked"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner pb-3">
            <h3>150</h3>
            <p>สินค้าที่กำลังประมูล</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-gavel"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner pb-3">
            <h3>150</h3>
            <p>สินค้าที่จบการประมูลยังไม่ชำระเงิน</p>
          </div>
          <div class="icon">
          <i class="fa-solid fa-user-clock"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner pb-3">
            <h3>150</h3>
            <p>สินค้าที่ชำระเงินแล้ว</p>
          </div>
          <div class="icon">
          <i class="fa-solid fa-circle-check"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <?php 
      $sql = "SELECT COUNT(*) AS count_user FROM login WHERE user_type != 0;";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner pb-3">
            <h3><?=$row['count_user']?></h3>
            <p>ผู้ใช้ทั้งหมด</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner pb-3">
            <h3>53<sup style="font-size: 20px">%</sup></h3>
            <p>รายได้ ทั้งหมดตั้งแต่เปิด</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-dollar-sign"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
    </div>
    <div class="row">
      <div class="col-lg-4">

        </div>


      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->