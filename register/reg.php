<?php
include_once('dbh.php');

if(isset($_POST['submit'])){
	$username = $_POST['uid'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$conpwd = $_POST['conpwd'];


	if(empty($username) || empty($email) || empty($pwd)){
		header("Location: index.php?error=empty field");
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: index.php?invalidemail");
		exit();
	}
	else if($pwd != $conpwd){
		header("Location: index.php?error=confirm password");
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]/",$username)){
		header("Location: index.php?signup error");
		exit();
	}
	else{
		$sql = "SELECT uid FROM users WHERE uid =?";

		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$sql)){

			header("Location: index.php? sql error");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, 's', $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$checkresult = mysqli_stmt_num_rows($stmt);

			if($checkresult > 0){
				header("location: index.php? username already exit");
				exit();
			}

			else{
				$sql = "INSERT INTO users (uid,email,pwd) VALUES(?, ?, ?)";

				$stmt = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: index.php? error");
					exit();
				}
				else{

					$passwordhash = password_hash($pwd, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,'sss', $username, $email, $passwordhash);
					mysqli_stmt_execute($stmt);

					header("Location: login.php");
					exit();
				}
			}
		}


	}
}
else{
	header("Location: login.php");
	exit();
}