<?php

session_start();

include_once('dbh.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

$sql = "SELECT * FROM users";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){

	while($row = mysqli_fetch_assoc($result)){
		$id = $row['id'];

		$sqlImg = "SELECT * FROM profileimg WHERE userid = '$id'";
		$resultImg = mysqli_query($conn, $sqlImg);

		while($rowImg = mysqli_fetch_assoc($resultImg)){
			echo "<div>";
			if($rowImg['status'] == 0){

				echo "<img src='upload/profile".$id.".jfif'>";

			}
			else {
				echo "<img src='upload/profiledefault.jfif'>";
			}
			echo $row['username'];
			echo "</div>";
		}

	}
	
}
else{
	echo "There are no users yet!";
}



	if(isset($_SESSION['id'])){
		if($_SESSION['id'] == 1){
			echo "you are logged in as user 1";
		}

		echo "<form action='upload.php' method='POST' enctype='multipart/form-data'>
			<input type='file' name='file'>
			<input type='submit' name='submit' value='UPLOAD'>
			</form>";

		} 
	else{
		echo "You are not Logged in!";

		echo "<form action='login.php' method='POST'>
			<input type='text' name='first' placeholder='First Name'>

			<input type='text' name='last' placeholder='Last Name'>

			<input type='text' name='uid' placeholder='User Name'>

			<input type='password' name='pwd' placeholder='Password'>
			<button type='submit' name='submitSignup'>Sign Up</button>
				</form>";
	
	}
?>


	<p>Login as User!</p>
	<form action='login.php' method='POST'>
		<button type='submit' name='submitlogin'>Login</button>
	</form>

	<p>Logout as User!</p>
	<form action='logout.php' method='POST'>
		<button type='submit' name='submitlogout'>Logout</button>
	</form>
</body>
</html>