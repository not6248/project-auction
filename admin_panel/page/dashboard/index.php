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
      $sql = "SELECT COUNT(*) AS count_pd FROM product;";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner pb-3">
            <h3><?= $row['count_pd'] ?></h3>
            <p>สินค้าทั้งหมดภายในเว็บไซต์</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-boxes-stacked"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <?php
      $sql1 = "SELECT COUNT(*) AS in_auction_count FROM `order_tb` WHERE order_status = 2;";
      $result1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($result1);
      $inAuctionCount = $row1['in_auction_count'];
      ?>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner pb-3">
            <h3><?= number_format($inAuctionCount, 0) ?></h3>
            <p>สินค้าที่กำลังประมูล</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-gavel"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <?php
      $sql2 = "SELECT COUNT(*) AS COUNT FROM last_user_bid AS l 
      INNER JOIN product AS p ON l.order_id = p.pd_id 
      INNER JOIN order_tb AS o ON o.order_id = p.pd_id
      LEFT JOIN payment as pay ON pay.pay_id = p.pd_id
      LEFT JOIN delivery AS d ON d.dlv_id = p.pd_id
      WHERE o.order_status = 3 AND (pay.pay_status IS NULL OR pay.pay_status < 3);";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      $unpaidCount = $row2['COUNT'];
      ?>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner pb-3">
            <h3><?= number_format($unpaidCount, 0) ?></h3>
            <p>สินค้าที่จบการประมูลยังไม่ชำระเงิน</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-user-clock"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <?php
      $sql3 = "SELECT COUNT(*) AS COUNT FROM last_user_bid AS l 
      INNER JOIN product AS p ON l.order_id = p.pd_id 
      INNER JOIN order_tb AS o ON o.order_id = p.pd_id
      LEFT JOIN payment as pay ON pay.pay_id = p.pd_id
      LEFT JOIN delivery AS d ON d.dlv_id = p.pd_id
      WHERE o.order_status = 3 AND (pay.pay_status IS NULL OR pay.pay_status >= 3);";
      $result3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_assoc($result3);
      $paidCount = $row3['COUNT'];
      ?>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner pb-3">
            <h3><?= number_format($paidCount, 0) ?></h3>
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
            <h3><?= $row['count_user'] ?></h3>
            <p>ผู้ใช้ทั้งหมด</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-plus"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <?php
      $sql = "SELECT * FROM order_tb AS o
      INNER JOIN product AS pd ON o.pd_id = pd.pd_id
      INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
      INNER JOIN payment AS pay ON pay.pay_id = pd.pd_id
      INNER JOIN delivery AS d ON d.dlv_id = pd.pd_id
      INNER JOIN delivery_type AS dt ON dt.dlvt_id = d.dlvt_id
      WHERE o.order_status = 3 AND pay.pay_status = 4 AND d.dlv_status = 2";
      $result = mysqli_query($conn, $sql);
      $income = '0';
      while ($rowsum = mysqli_fetch_assoc($result)) {
        $detailsum = json_decode($rowsum['order_details'], true);
        $income += $rowsum['end_price'] * ($detailsum[0]['fee_percent'] / 100);
        // $sum += $rowsum['end_price'] - ($rowsum['end_price'] * $detailsum[0]['fee_percent'] / 100);
      }
      ?>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
          <div class="inner pb-3">
            <h3><?= number_format($income, 2) ?> บาท</h3>
            <p>รายได้ ทั้งหมดตั้งแต่เปิด</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-dollar-sign"></i>
          </div>
          </a>
        </div>
      </div>
      <!-- ====================================================================== -->
      <?php
      $jsonData = array(
        array('กำลังประมูล', intval($inAuctionCount)),
        array('จบการประมูล (ยังไม่ชำระเงิน)', intval($unpaidCount)),
        array('จบการประมูล (ชำระเงินแล้ว)', intval($paidCount))
      );
      
      $jsondata = json_encode($jsonData);
      ?>

    </div>
    <div class="row">
      <div class="col-lg-4">
        <script type="text/javascript">
          google.charts.load('current', {
            'packages': ['corechart']
          });

          google.charts.setOnLoadCallback(drawChart);

          function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'ประเภท');
            data.addColumn('number', 'จำนวน');
            data.addRows(<?php echo $jsondata; ?>);

            var options = {
              'title': 'สินค้าที่กำลังประมูลแต่ละสถานะ',
              'width': 650,
              'height': 500,
              'fontSize': 16,
              'is3D': true,
              sliceVisibilityThreshold:0
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>

        <div id="chart_div"></div>
      </div>


      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->