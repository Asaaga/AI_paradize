<?php
include "header.php";

$server="localhost";
$username="root";
$password="";
$db="gemito_sales";

$connect1=mysqli_connect($server,$username,$password,$db);

$query="SELECT * FROM purchase";
$request=mysqli_query($connect1,$query);

?>
<table border="1" cellpadding="10">
	<caption>MY PURCHASE</caption>
	<tr>
		<td>S/N</td>
		<td>USERNAME</td>
		<td>PRODUCT NAME</td>
		<td>COST</td>
		<td>QUANTITY</td>
		<td>TOTAL</td>
	</tr>
	<?php  
	$c=1;
	while($data=mysqli_fetch_array($request)){ ?>
		<tr>
			<td><?php echo $c; ?></td>
			<td>
				<?php 
				$id2=$data['user_id'];
				$q2="SELECT name FROM user WHERE id='$id2'";
				$r2=mysqli_query($connect1,$q2);
				$d2=mysqli_fetch_array($r2);
				echo $d2['name']; 
				?></td>
			<td>
				<?php 
				$id=$data['product_id'];
				$q="SELECT name FROM product WHERE id='$id'";
				$r=mysqli_query($connect1,$q);
				$d=mysqli_fetch_array($r);
				echo $d['name']; 
				?></td>
			<td><del>N</del><?php echo $data['cost']; ?></td>
			<td><?php echo $data['qty']; ?></td>
			<td><del>N</del><?php echo $data['total']; ?></td>
		</tr>
	<?php $c++;} ?>

</table>

