<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "phpsearch";

$conn = mysqli_connect($server, $username, $password, $dbname);
mysqli_query($conn, $dbname);