<?php
$server="localhost";
$username="root";
$password="";
$db="gemito_sales";

$connect1=mysqli_connect($server,$username,$password,$db);

$query="SELECT * FROM user";
$request=mysqli_query($connect1,$query);

include "header.php";
?>

<table border="1" cellpadding="10">
	<caption>ALL USER</caption>
	<tr>
		<td>S/N</td>
		<td>NAME</td>
		<td>GENDER</td>
		<td>EMAIL</td>
		<td>PASSWORD</td>
		<td>DATE</td>
	</tr>
	<?php  
	$c=1;
	while($data=mysqli_fetch_array($request)){ ?>
		<tr>
			<td><?php echo $c; ?></td>
			<td><?php echo $data['name']; ?></td>
			<td><?php echo $data['gender']; ?></td>
			<td><?php echo $data['email']; ?></td>
			<td><?php echo $data['password']; ?></td>
			<td><?php echo $data['date']; ?></td>
		</tr>
	<?php $c++;} ?>

</table>

