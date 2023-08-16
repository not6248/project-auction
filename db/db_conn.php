<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auction_pmn";

$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
  // echo "Connected successfully";




  function echoJson_status_msg($status, $msg)
{
    echo json_encode(array("status" => $status, "msg" => $msg));
    exit();
}
?>