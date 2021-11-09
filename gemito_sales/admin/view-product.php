<?php
$server="localhost";
$username="root";
$password="";
$db="gemito_sales";

$connect1=mysqli_connect($server,$username,$password,$db);

$query="SELECT * FROM product";
$request=mysqli_query($connect1,$query);

include "header.php";
?>

<table border="1" cellpadding="10">
	<caption>ALL PRODUCT</caption>
	<tr>
		<td>S/N</td>
		<td>NAME</td>
		<td>COST</td>
	</tr>
	<?php  
	$c=1;
	while($data=mysqli_fetch_array($request)){ ?>
		<tr>
			<td><?php echo $c; ?></td>
			<td><?php echo $data['name']; ?></td>
			<td><del>N</del><?php echo $data['cost']; ?></td>
		</tr>
	<?php $c++;} ?>

</table>

