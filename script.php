<?php
// Your PHP script code here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "auction_time_test";
$conn = mysqli_connect($servername, $username, $password,$dbname);

$result = mysqli_query($conn,"SELECT * FROM `user_tb`");
// Sleep for 1 minute
$row = mysqli_fetch_assoc($result);
echo $row["username"];
mysqli_close($conn);
sleep(1);

// Call the PHP script itself
exec('php -f E:\Programs\laragon\www\project-auction\script.php');


while (true) {
    
    sleep(5);
}

?>