<head>
    <?php session_start();
    require '../db/db_conn.php';
    if (!isset($_SESSION['admin_login'])) {
        header('location: ./login.php');
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN PANEL</title>
    <link type="image/png" sizes="16x16" rel="icon" href="../assets/icon/icon-16.png">
    <link type="image/png" sizes="32x32" rel="icon" href="../assets/icon/icon-32.png">

    <!-- CSS ===================================================================================== -->
    
    <!-- Theme style =============================================================================-->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Font Awesome Icons ======================================================================-->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- datatables ==============================================================================-->
    <link rel="stylesheet" href="plugins/datatables/datatables.min.css">
    <!-- main CSS ================================================================================-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- sweetalert2 CSS =========================================================================-->
    <link rel="stylesheet" href="./../assets/css/sweetalert2.min.css">
    


    <!-- Java Script  ============================================================================-->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="dist/js/main.js"></script>
    <!-- charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- นับถอยหลังเวลาประมูล -->
    <script src="./../assets/js/countdown.js"></script>
    <!-- sweetalert2 js -->
    <script src="./../assets/js/sweetalert2.all.min.js"></script>
    <!-- sweetalert2 js -->
    <script src="dist/js/sweet.js"></script>
    


</head>