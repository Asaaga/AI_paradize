<?php

$server="localhost";
$username="root";
$password="";
$db="gemito_sales";

$connect1=mysqli_connect($server,$username,$password,$db);

if (isset($_POST['add'])) {

$name=$_POST['name'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=$_POST['password'];

// extract($_POST);

$query="INSERT INTO user(name,gender,email,password) VALUES('$name','$gender','$email','$password')";

$query2="INSERT INTO login(email,password,role) VALUES('$email','$password','2')";

$result=mysqli_query($connect1,$query);
if ($result) {
	mysqli_query($connect1,$query2);
	echo "<span style='color:green'>Registration was successful, <a href='login.php'>please click to login</a></span>";
} else {
	echo "<span style='color:red'>Registration was not successful</span>";
}
}

?>

<form action="#" method="post">
	
	<label>Name: </label>
	<input type="text" name="name"><br>
	
	<label>Gender: </label>
	<select name="gender">
		<option value="male">Male</option>
		<option value="female">Female</option>
	</select>
	<br>

	<label>Email: </label>
	<input type="email" name="email"><br>

	<label>Password: </label>
	<input type="password" name="password"><br>

	<input type="submit" name="add" value="SIGN UP">
	<input type="reset" value="CLEAR">
</form>