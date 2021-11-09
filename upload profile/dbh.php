<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "imgupload";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(!$conn){
	die("not connected");
}
?>