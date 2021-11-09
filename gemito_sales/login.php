<?php session_start(); ?>

<?php
$server="localhost";
$username="root";
$password="";
$db="gemito_sales";

$connect1=mysqli_connect($server,$username,$password,$db);

if (isset($_POST['check'])) {

$email=$_POST['email'];
$password=$_POST['password'];

// extract($_POST);

$query="SELECT * FROM login WHERE email='$email' AND password='$password'";

$result=mysqli_query($connect1,$query);
// $rs=mysqli_num_rows($result);
$rs=mysqli_fetch_array($result);

// if ($rs > 0) {
if ($rs) {
	echo "<span style='color:green'>Login details is correct</span>";

	if ($rs['role'] == 1) {
		$_SESSION['id']=$rs['email'];
		$_SESSION['check']=1;
		header("location:admin/dashboard.php");
	} else if ($rs['role'] == 2) {
		$_SESSION['id']=$rs['email'];
		$_SESSION['check']=1;
		header("location:user/dashboard.php");
	} else{
		echo "Invalid";
	}

} else {
	echo "<span style='color:red'>Incorrect email or password, <a href='register.php'>please click to register if you are new.</a></span>";
}
}

?>
<?php
if (!empty($_GET['msg'])) {

	if ($_GET['type'] == 'error') {
	echo "<h1 style='color:red;'>".$_GET['msg']."</h1>";
	} else if ($_GET['type'] == 'success') {
	echo "<h1 style='color:green;'>".$_GET['msg']."</h1>";
	} 

}
 ?>
<form action="#" method="post">

	<label>Email: </label>
	<input type="email" name="email"><br>

	<label>Password: </label>
	<input type="password" name="password"><br>

	<input type="submit" name="check" value="LOGIN">
	<input type="reset" value="CLEAR">
</form>