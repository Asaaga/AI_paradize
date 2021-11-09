  <?php
  session_start();
  include("includes/connection.php");
  include("includes/header.php");
  

  if(isset($_POST['login'])){
  	$username = $_POST['uname'];
  	$password = $_POST['pass']; 

  	$error = array();

  	if (empty($username)) {
  		$error['admin'] = "Enter Username";  
  	}
  	else if(empty($password)){
  		$error['admin'] = "Enter Password";
  	}

  	if(count($error) == 0){
  		$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
  		$result = mysqli_query($connect,$query);

  		if(mysqli_num_rows($result)){

  			echo "<script>alert('You have login as an admin')</script>";
  			$_SESSION['admin'] = $username;

  			header("Location: admin/index.php");

  		}

  	else{
  		echo "<script>alert('Invalid Username or password')</script>";
  	}

  }


  }



  ?>
  <!DOCTYPE html>
  <html>
  <head>
  	<title>Admin Login Page</title>
  </head>
  <body style="background-image: url(img/ad2.jpg);background-size:cover; background-repeat:no-repeat;">
  	<div style="margin-top:20px;"></div>
  <div class="container">
  	<div class="col-md-12">
  		<div class="row">
  			<div class="col-md-3"></div>
  			<div class="col-md-6 jumbotron">
  				<img src="img/admin.png" class="col-md-12" style="height:200px;">
  				<form action="" method="POST" class="my-2">

  					<div >
  						<?php
  						if(isset($error['admin'])){

  							$sh = $error['admin'];

  							$show = "<h4 class='alert alert-danger'>".$sh."</h4>";

  							echo $show;
  						}
  						else{

  							$show = "";
  						}
  						echo $show;

  						?>
  					</div>
  					<div class="form-group">
  						<label>Username</label>
  						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
  					</div>
  					<div class="form-group">
  						<label>Password</label>
  						<input type="password" name="pass" class="form-control" placeholder="**********">
  					</div>
  					<input type="submit" name="login" class="btn btn-success" value="Login">
  				</form>
  			</div>
  			<div class="col-md-3"></div>
  		</div>
  	</div>
  </div>
  </body>
  </html>