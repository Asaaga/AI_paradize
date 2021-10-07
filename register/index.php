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
		width: 450px;
		background-color: ghostwhite;
		margin: auto;
		text-align: center;
		border-radius: 10px;
	}
	.container .head{
		margin-top: 20px;
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
<form action="reg.php" method="POST">
	<div class="head"><h2>Register and Vote</h2></div>
	<input type="text" name="uid" placeholder="Enter Name">
	<input type="email" name="email" placeholder="Enter Email"><br><br>
	<input type="password" name="pwd" placeholder="Enter Password">
	<input type="password" name="conpwd" placeholder="confilm Password"><br>
	<input type="submit" name="submit" value="Sign Up"><a href="login.php">Login</a>
	<label>vote<input type="checkbox" required="required"></label>
</form>
</div>
</body>
</html>