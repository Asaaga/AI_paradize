<?php

$conn = mysqli_connect("localhost","root","","login_system");

mysqli_query($conn, "login_system");

if(!$conn){
	die("not connected");
}
