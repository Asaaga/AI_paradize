<?php
include "header.php";

$server="localhost";
$username="root";
$password="";
$db="gemito_sales";

$connect1=mysqli_connect($server,$username,$password,$db);

if (isset($_POST['add'])) {

$product_id=$_POST['product_id'];
$q1="SELECT * FROM product WHERE id='$product_id'";
$q11=mysqli_query($connect1,$q1);
$qr1=mysqli_fetch_array($q11);
$cost=$qr1['cost'];

$qty=$_POST['qty'];

$total=$cost * $qty;

$email=$_SESSION['id'];
$q2="SELECT * FROM user WHERE email='$email'";
$q21=mysqli_query($connect1,$q2);
$qr2=mysqli_fetch_array($q21);
$user_id=$qr2['id'];
// extract($_POST);

$query="INSERT INTO purchase(user_id,product_id,cost,qty,total) VALUES('$user_id','$product_id','$cost','$qty','$total')";

$result=mysqli_query($connect1,$query);
if ($result) {
	echo "<span style='color:green'>Purchase was successful added</span>";
} else {
	echo "<span style='color:red'>Purchase was not successful added</span>";
}
}

?>

<form action="#" method="post">
	
	<label>Select Product: </label>
	<select name="product_id">
		<?php  
		$query="SELECT * FROM product ";
		$result=mysqli_query($connect1,$query);
		while($rs=mysqli_fetch_array($result)){
		 ?>
	<option value="<?=$rs['id'];?>"><?=$rs['name'];?></option>
	 <?php  } ?>
	</select><br>

	<label>Enter Quantity: </label>
	<input type="number" name="qty"><br>
	
	<input type="submit" name="add" value="ADD PURCHASE">
	<input type="reset" value="CLEAR">
</form>