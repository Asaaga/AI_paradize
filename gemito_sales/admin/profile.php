
<?php 
include "header.php";

$server="localhost";
$username="root";
$password="";
$db="gemito_sales";

$connect1=mysqli_connect($server,$username,$password,$db);
$email=$_SESSION['id'];
$query="SELECT * FROM login WHERE email='$email' ";

$result=mysqli_query($connect1,$query);
$rs=mysqli_fetch_array($result);
?>

<form action="#" method="post">

	<label>Email: </label>
	<input type="email" name="email" value="<?php echo $rs['email']?>"><br>

	<label>Password: </label>
	<input type="text" name="password" value="<?php echo $rs['password']?>"><br>

</form>