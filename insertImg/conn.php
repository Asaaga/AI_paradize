<?php

$server = "localhost";
$user = "root";
$password = "";
$dbname = "student_data";

$conn = mysqli_connect($server, $user, $password, $dbname);

$sql = mysqli_query($conn, $dbname);

if(!$conn){
	die("not connected");
}
?>