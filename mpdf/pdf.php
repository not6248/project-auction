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
  AND DATE(od.order_create_datetime) IN ('$start', '$end');";
} elseif (isset($_POST['o2'])) {
  $sql = "SELECT *
  FROM order_tb AS od
  INNER JOIN product AS pd ON od.pd_id = pd.pd_id
  INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
  WHERE (od.order_status >= 3)
  AND DATE(od.order_create_datetime) IN ('$start', '$end');";
} elseif (isset($_POST['o3'])) {
  $sql = "SELECT *
  FROM order_tb AS od
  INNER JOIN product AS pd ON od.pd_id = pd.pd_id
  INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
  WHERE (od.order_status = 2)
  AND DATE(od.order_create_datetime) IN ('$start', '$end');";
} elseif (isset($_POST['o4'])) {
  $sql = "SELECT * FROM order_tb AS o
  INNER JOIN product AS pd ON o.pd_id = pd.pd_id
  INNER JOIN product_type AS pdt ON pd.pd_type_id = pdt.pd_type_id
  INNER JOIN payment AS pay ON pay.pay_id = pd.pd_id
  INNER JOIN delivery AS d ON d.dlv_id = pd.pd_id
  INNER JOIN delivery_type AS dt ON dt.dlvt_id = d.dlvt_id
  WHERE o.order_status = 3 AND pay.pay_status = 4 AND d.dlv_status = 2
  AND DATE(o.order_create_datetime) IN ('$start', '$end');";
}

$reslut = mysqli_query($conn, $sql);


if (mysqli_num_rows($reslut) > 0) {
} else {
  echo_js_alert("ไม่พบข้อมูลที่ค้นหา", "back");
}


// <input type="hidden" name="title" value="ตาราง : สินค้าที่ถูกประมูล">
// <label for="start" class="ml-1">จาก :</label>
// <input name="start" type="date" class="form-control col-3 ml-1" required>
// <label for="end" class="ml-1">ถึง :</label>
// <input name="end" type="date" class="form-control col-3 ml-1" required>
// <button type="submit" class="btn btn-secondary ml-2">พิมพ์ตามวันที่เลือก</button>

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
<style>
  table {
    border-collapse: collapse;
    width: 100%;
    font-size: 23px;
  }

  td,
  th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>
</head>

<body>

  <h2 style="margin-bottom: 0px;"><?= $title ?></h2>
  <h3>วันที่ <?= $start ?> ถึง <?= $end ?> </h3>

  <table>
    <tr>
      <th>ID</th>
      <th>ชื่อ</th>
      <th>ราคาราคาเริ่มต้น</th>
      <th>ราคาจบประมูล</th>
      <th>สถานะ</th>
    </tr>
    <?php foreach ($reslut as $data) : ?>
      <tr>
        <td><?= $data['pd_id'] ?></td> <!-- id product -->
        <td><?= $data['pd_name'] ?></td> <!--  product name -->
        <td><?= $data['pd_price_start'] ?></td> <!--product img -->
        <td><?= $data['end_price'] ?? "--" ?></td> <!--product type name-->
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
