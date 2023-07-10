<?php
$sql = 'SELECT * FROM `products_tb`';
$query = mysqli_query($conn, $sql);
?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Product</a></li>
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
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>

              <p class="card-text">
                <?php foreach ($query as $data) : ?>
                  <?=$data['product_id']?>;
                  <?=$data['product_name']?>;
                  <?=$data['product_detail']?>;
                  <?=$data['product_price']?>;
                  <?=$data['product_img']?>;
                  <?=$data['product_count_bid']?>;
                  <?=$data['product_last_user_bid']?>;
                  <?=$data['product_condition']?>;
                  <?=$data['product_delivery_type']?>;
                  <?=$data['product_status']?>;
                  <?=$data['product_end_date']?>;
                  <?=$data['product_create_datetime']?>;
                  <br>
                <?php endforeach; ?>
                <!-- Some quick example text to build on the card title and make up the bulk of the card's
                content. -->
              </p>

              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>