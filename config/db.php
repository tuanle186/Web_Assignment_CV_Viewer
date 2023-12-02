<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "cv_information";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
?>
