<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<fieldset>
	<legend>User Data</legend>
	<form name="f1" method="post" action="<?php $_PHP_SELF ?>">
	<input type="number" min="1" max="100" name="row" placeholder="Row" required/><br><br>
	<input type="number" min="1" max="100" name="col" placeholder="Col" required/><br><br>
	<input type="submit" name="submit" value="Generate Table"><input type="reset" name="rest" value="Cancel">
	</form>
</fieldset>
</body>
</html>
<?php
if(isset($_POST['submit'])){

$row = $_POST['row'];
$col = $_POST['col'];

echo "<table border='4' align='center'>";

for ($i=0; $i < $row; $i++) { 

	echo "<tr width=300 height=150>";

	for ($j=0; $j < $col; $j++) { 

		echo "<td width=300 height=150></td>";
	}
	echo "</tr>";
}
echo "</table>";
}
?>