<?php
include_once('dbh.php');


$sql = "SELECT * FROM users";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">
		a{
			text-decoration: none;
			color: blueviolet;
			font-size: 20px;
			font-family: Arial;
		}
	</style>
</head>
<body>
<table bgcolor="green" border="4" align="center">
	<tr>
		<th colspan="4">Voters</th>
	</tr>
	<tr>
		<th>S/N</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
	</tr>
	<?php
	while($rows = mysqli_fetch_assoc($result)){
	?>
	<tr>
		<td> <?php echo $rows['id'] ?> </td>
		<td> <?php echo $rows['uid'] ?> </td>
		<td> <?php echo $rows['email'] ?> </td>
		<td> <?php echo $rows['pwd'] ?> </td>
	</tr>
	<?php
	}
	?>
</table>

<a href="index.php">LOG OUT</a>
</body>
</html>