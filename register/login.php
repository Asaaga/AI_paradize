<?php
include_once('dbh.php');

if(isset($_POST['login'])){
	$username = $_POST['uid'];
	$password = $_POST['pwd'];

	$sql = "SELECT * FROM users";

	$query = mysqli_query($conn,$sql);

	while($rows = mysqli_fetch_assoc($query)){

		if($rows['uid'] == $username AND $rows['pwd'] == $password){
			header("Location: dashboard.php");
			exit();
		}
		else{
			header("Location: login.php?error");
			exit();
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		body{
		background-color: lightblue;
	}
	.container{
		margin-top: 40px;
		height: 300px;
		width: 250px;
		background-color: ghostwhite;
		margin: auto;
		text-align: center;
		border-radius: 10px;
	}
		input{
			padding: 10px 10px 10px 10px;
			margin-top: 20px;
		}
				a{
			text-decoration: none;
			color: blue;
			font-family: Arial;
			font-size: 20px;
		}

	</style>
</head>
<body>
	<div class="container">
		<form action="#" method="POST">
			<h2>Login to see Voters</h2>
			<input type="text" name="uid" placeholder="Enter Username"><br><br>
			<input type="password" name="pwd" placeholder="Enter Password"><br><br>
			<input type="submit" name="login" value="Login"><a href="index.php">Sign Up</a>
		</form>
	</div>
</body>
</html>