<?php require 'db/db_conn.php'; ?>

<?php
session_start();
$duration = "";
$res = mysqli_query($conn, "select * from timetest");
while ($row = mysqli_fetch_array($res)) {
    $duration = $row["duration"];
}
$_SESSION["duration"] = $duration;
$_SESSION["start_time"] = date("Y-m-d H:i:s");

$end_time = $end_time = date('Y-m-d H:i:s', strtotime('+' . $_SESSION["duration"] . 'minutes', strtotime($_SESSION["start_time"])));
$_SESSION["end_time"] = $end_time;

?>

<script type="text/javascript">
    window.location="index.php";
</script>