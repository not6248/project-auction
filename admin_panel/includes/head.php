<head>
    <?php session_start();
    require '../db/db_conn.php';
    if (!isset($_SESSION['admin_login'])) {
        header('location: ./login.php');
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

<!-- CSS -->
    <!-- Theme style =============================================================================-->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- ------------------------------------------------------------------------------------------->
    
    <!-- Font Awesome Icons ======================================================================-->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- ------------------------------------------------------------------------------------------->
    
    <!-- datatables ==============================================================================-->
    <link rel="stylesheet" href="plugins/datatables/datatables.min.css">
    <!-- ------------------------------------------------------------------------------------------->
    
    <!-- main CSS ================================================================================-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- ------------------------------------------------------------------------------------------->
    
    <link rel="stylesheet" href="./../assets/css/sweetalert2.min.css">
<!--  -->

<!-- JS -->
    <!-- jQuery ==================================================================================-->
    <script src="plugins/jquery/jquery.min.js"></script>
     <!-- ------------------------------------------------------------------------------------------>
    <!-- นับถอยหลังเวลาประมูล ==================================================================================-->
    <script src="./../assets/js/countdown.js"></script>
     <!-- ------------------------------------------------------------------------------------------>
     <script src="./../assets/js/sweetalert2.all.min.js"></script>
<!--  -->


</head>