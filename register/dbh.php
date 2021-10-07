<?php
$dbserver = "localhost";
$dbsource = "root";
$dbpwd = "";
$dbname = "registration";

$conn = mysqli_connect($dbserver, $dbsource, $dbpwd, $dbname);

$query = mysqli_query($conn, $dbname);

if(!$conn){
	die("error");
}