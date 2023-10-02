<?php
require '../db/db_conn.php';
session_start();
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
if (isset($_POST['o1'])) {
  $sql = "SELECT *
  FROM order_tb AS od
  INNER JOIN product AS pd ON od.pd_id = pd.pd_id
  INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
  WHERE (od.order_status = 2 OR od.order_status = 3)
  AND (DATE(od.order_create_datetime) BETWEEN '$start' AND '$end');";
} elseif (isset($_POST['o2'])) {
  $sql = "SELECT *
  FROM order_tb AS od
  INNER JOIN product AS pd ON od.pd_id = pd.pd_id
  INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
  WHERE (od.order_status = 3)
  AND (DATE(od.order_create_datetime) BETWEEN '$start' AND '$end');";
} elseif (isset($_POST['o3'])) {
  $sql = "SELECT *
  FROM order_tb AS od
  INNER JOIN product AS pd ON od.pd_id = pd.pd_id
  INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
  WHERE (od.order_status = 2)
  AND (DATE(od.order_create_datetime) BETWEEN '$start' AND '$end');";
} elseif (isset($_POST['o4'])) {
  $sql = "SELECT * FROM order_tb AS o
  INNER JOIN product AS pd ON o.pd_id = pd.pd_id
  INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
  INNER JOIN payment AS pay ON pay.pay_id = pd.pd_id
  INNER JOIN delivery AS d ON d.dlv_id = pd.pd_id
  INNER JOIN delivery_type AS dt ON dt.dlvt_id = d.dlvt_id
  WHERE o.order_status = 3 AND pay.pay_status = 4 AND d.dlv_status = 2
  AND (DATE(o.order_create_datetime) BETWEEN '$start' AND '$end');";
}

$result = mysqli_query($conn, $sql);


if (!mysqli_num_rows($result) > 0) {
  echo_js_alert("ไม่พบข้อมูลที่ค้นหา", "back");
} else {
  $numrow = mysqli_num_rows($result);
  $totalEndPrice = 0;
  $sum = '0';
  while ($rowfetch = mysqli_fetch_assoc($result)) {
    $endPrice = $rowfetch['end_price'];
    $totalEndPrice += $endPrice;
    $detailsum = json_decode($rowfetch['order_details'], true);
    $sum += ($rowfetch['end_price'] * $detailsum[0]['fee_percent'] / 100);
  }
}


// ------------------------------------------------------------------------------------------------------
require_once("vendor/autoload.php");
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'orientation' => 'L',
  'fontDir' => array_merge($fontDirs, [
    __DIR__ . '/vendor/mpdf/mpdf/ttfonts',
  ]),
  'fontdata' => $fontData + [
    'frutiger' => [
      'R' => 'THSarabunNew.ttf',
      'I' => 'THSarabun-Italic.ttf',

    ]
  ],
  'default_font' => 'frutiger'
]);
ob_start();
?>
</head>

<body>

  <h2 style="margin-bottom: 0px;"><?= $title ?></h2>
  <h3>วันที่ <?= $start ?> ถึง <?= $end ?> </h3>

  <table>
    <tr class="thbg">
      <th></th>
      <th style="width:40%">=============== รวมทั้งหมด =============== ></th>
      <th><?= number_format($numrow, 0) ?> ชิ้น</th>
      <th><?= number_format($totalEndPrice, 0) ?> บาท </th>
      <?php if (isset($_POST['o4'])) : ?>
        <th><?=number_format($sum,2)?> บาท</th>
      <?php endif ?>
      <th></th>
    </tr>
    <tr>
      <th>ID</th>
      <th>ชื่อ</th>
      <th>ราคาราคาเริ่มต้น</th>
      <th>ราคาจบประมูล</th>
      <?php if (isset($_POST['o4'])) : ?>
        <th>ส่วนแบ่ง</th>
      <?php endif ?>
      <th>สถานะ</th>
    </tr>
    <?php foreach ($result as $data) :
      $detail = json_decode($data['order_details'], true);
    ?>
      <tr>
        <td><?= $data['pd_id'] ?></td> 
        <td><?= $data['pd_name'] ?></td> 
        <td><?= number_format($data['pd_price_start'], 0) ?> บาท</td>
        <td><?= number_format($data['end_price'], 0) ?? "--" ?> บาท</td>
        <?php if (isset($_POST['o4'])) : ?>
          <td><?= number_format($data['end_price'] * ($detail[0]['fee_percent'] / 100), 2) ?> บาท</td> <!--product type name-->
        <?php endif ?>
        <td><?= $os_name_arr[$data['order_status']] ?></td> <!--product datetime-->
      </tr>
    <?php endforeach ?>
  </table>
  <?php
  $content = ob_get_contents();
  ob_end_clean();
  $stylesheet = file_get_contents('style.css');
  $mpdf->WriteHTML($stylesheet, 1);
  $mpdf->WriteHTML($content);
  $mpdf->Output("order_id_"  . ".pdf", "I");
  exit;
