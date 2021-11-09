<?php
$server="localhost";
$username="root";
$password="";
$db="gemito_sales";

$connect1=mysqli_connect($server,$username,$password,$db);

if (isset($_POST['add'])) {

$name=$_POST['name'];
$cost=$_POST['cost'];

// extract($_POST);

$query="INSERT INTO product(name,cost) VALUES('$name','$cost')";

$result=mysqli_query($connect1,$query);
if ($result) {
	echo "<span style='color:green'>Product was successful added</span>";
} else {
	echo "<span style='color:red'>Product was not successful added</span>";
}
}
include "header.php";
?>

<form action="#" method="post">
	
	<label>Name: </label>
	<input type="text" name="name"><br>

	<label>Cost: </label>
	<input type="text" name="cost"><br>
	
	<input type="submit" name="add" value="ADD PRODUCT">
	<input type="reset" value="CLEAR">
</form>