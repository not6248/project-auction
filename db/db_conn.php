<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auction_pmn";

$conn = mysqli_connect($servername,$username,$password,$dbname);

mysqli_set_charset($conn, "utf8");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
  // echo "Connected successfully";


  include 'function.php';
  include 'variable.php';
?>