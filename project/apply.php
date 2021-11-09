 <?php
 include("includes/connection.php");
 include("includes/header.php");

 if(isset($_POST['apply'])){
 	$firstname = $_POST['fname'];
 	$surname = $_POST['sname'];
 	$username = $_POST['uname'];
 	$email = $_POST['email'];
 	$gender = $_POST['gender'];
 	$phone = $_POST['phone'];
 	$country = $_POST['country'];
 	$password = $_POST['pass'];
 	$confirm_password = $_POST['con_pass'];

 	$error = array();

 	if(empty($firstname)){
 		$error['apply'] = "Enter Firstname";
 	}
 	else if(empty($surname)){
 		$error['apply'] = "Enter Surname";
 	}
 	else if(empty($email)){
 		$error['apply'] = "Enter Email Address";
 	}
 	else if($gender == ""){
 		$error['apply'] = "Select gender";
 	}
 	else if(empty($phone)){
 		$error['apply'] = "Enter Phone Number";
 	}
 	else if($country == ""){
 		$error['apply'] = "Select country";
 	}
 	else if(empty($password)){
 		$error['apply'] = "Enter Password";
 	}
 	else if($confirm_password != $password){
 		$error['apply'] = "Both Password do not match";
	}

 	if(count($error) == 0){

 		$query = "INSERT INTO doctors(firstname, surname, username, email, gender, phone, country, password, salary, date_reg, status, profile) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'pendding','doctor.jpg')";

 		$result = mysqli_query($connect,$query);

 		if($result) {
 			echo "<script>alert('You have successfully applied')</script>";
 			header("Location: doctorlogin.php");
 		}
 		else{
 			echo "<script>alert('Failed')</script>";
 		}

 	}
 }

 	if(isset($error['apply'])){

 		$s = $error['apply'];

 		$show = "<h5 class='text-center alert alert-danger'>$s</h5>";
 	}
 	else {
 		$show ="";
 	}
 
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Doctor Apply</title>
 </head> 
 <body style="background-image: url(img/ad2.jpg);background-size:cover; background-repeat:no-repeat;">
 <div class="container-fluid">
 	<div class="col-md-12">
 		<div class="row">
 			<div class="col-md-3"></div>
 			<div class="col-md-6 my-3 jumbotron">
 				<h5 class="text-center">Apply Now!!!</h5>
 				<div>
 					<?php echo $show; ?>
 				</div>
 				<form method="POST">
 					<div class="form-group">
 						<label>Firstname</label>
 						<input type="text" name="fname" class="form-control" placeholder="Enter Firstname" value="<?php if(isset($_POST['fname'])){echo $_POST['fname']; } ?>">
 					</div>
 					<div class="form-group">
 						<label>Surname</label>
 						<input type="text" name="sname" class="form-control" placeholder="Enter Surname" value="<?php if(isset($_POST['sname'])){echo $_POST['sname']; } ?>">
 					</div>
 					<div class="form-group">
 						<label>Username</label>
 						<input type="text" name="uname" class="form-control" placeholder="Enter Username" value="<?php if(isset($_POST['uname'])){echo $_POST['uname']; } ?>">
 					</div>
 					<div class="form-group">
 						<label>Email</label>
 						<input type="email" name="email" class="form-control" placeholder="Enter E-mail" value="<?php if(isset($_POST['email'])){echo $_POST['email']; } ?>">
 					</div>
 					<div class="form-group">
 						<label>Select Gender</label>
 						<select name="gender" class="form-control" value="<?php if(isset($_POST['gender'])){echo $_POST['gender']; } ?>">
 							<option value="">Select Gender</option>
 							<option value="Male">Male</option>
 							<option value="Female">Female</option>
 						</select>
 					</div>
 					<div class="form-group">
 						<label>Phone</label>
 						<input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])){echo $_POST['phone']; } ?>">
 					</div>

 					<div class="form-group">
 						<label>Select country</label>
 						<select name="country" class="form-control" value="<?php if(isset($_POST['country'])){echo $_POST['country']; } ?>">
 							<option value="">Select Country</option>
 							<option value="Amarica">Amarica</option>
 							<option value="India">India</option>
 							<option value="Nigeria">Nigeria</option>
 							<option value="Rossia">Rossia</option>
 							<option value="Ghana">Ghana</option>  
 						</select>
 					</div>
 					<div class="form-group">
 						<label>Password</label>
 						<input type="password" name="pass" class="form-control" placeholder="Enter Password" value="<?php if(isset($_POST['password'])){echo $_POST['password']; } ?>">
 					</div>
 					<div class="form-group">
 						<label>Confirm Password</label>
 						<input type="password" name="con_pass" class="form-control" placeholder="Confirm Password">
 					</div>
 					<input type="submit" name="apply" value="Apply Now" class="btn btn-success form-control text-center">
 					<p>I already have an account <a href="doctorlogin.php">Click Here!!!</a></p>
 				</form>
 			</div>
 			<div class="col-md-3"></div>
 		</div>
 	</div>

 </div>
 </body>
 </html>