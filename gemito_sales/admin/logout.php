<?php 
session_start();
session_destroy();
header("location:../login.php?msg=You have successfully logged out&type=success");
?>