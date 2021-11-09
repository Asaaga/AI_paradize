<?php
session_start();
include_once('conn.php');

$sql = "SELECT * FROM reg WHERE id = 1";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1){

	while($row = mysqli_fetch_assoc($result)){

	if(isset($_SESSION['id'])){
		if($_SESSION['id'] == 1){

			echo "U are Logged In as user"." ".$row['username'];
		}
		else{
			echo "You are not logged in!";
		}
	}

	}
}



?>
<form action="login.php" method="POST">
	<button type="submit" name="submit" value="submit">Login</button>
</form>
<form action="logout.php" method="POST">
	<button type="submit" name="submit" value="submit">Log out</button>
</form>