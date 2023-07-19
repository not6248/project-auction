<head>
    <?php session_start();
    require '../db/db_conn.php';
    if (!isset($_SESSION['admin_login'])) {
        header('location: ../');
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>
    <?php include 'link.php'; ?>
</head>