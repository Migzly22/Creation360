<?php
//error_reporting(0);
$localhost = "localhost";
$username = "root";
$pass = "";
$dbname = "cvsu_elearning";

$conn = mysqli_connect($localhost,$username,$pass,$dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
