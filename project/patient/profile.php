<?php
session_start();
include("../includes/connection.php");
include("../includes/header.php");


?>
<!DOCTYPE html>
<html>
<head>
<title>Patient Profile</title>
</head>
<body>

<div class="container-fluid">
<div class="col-md-12">
<div class="row">
	<div class="col-md-2" style="margin-left: -30px;">
		<?php

		include("sidenav.php");
		$patient = $_SESSION['patient'];
		$query = "SELECT * FROM patient WHERE username='$patient'";
		$res = mysqli_query($connect,$query);

		$row = mysqli_fetch_array($res);


		?>
	</div>
	<div class="col-md-10">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<?php
					if (isset($_POST['upload'])) {
						$img = $_FILES['img']['name'];

						if(empty($img)){

						}else{
							$query2 = "UPDATE patient SET profile='$img' WHERE username='$patient'";
							$res2 = mysqli_query($connect,$query2);
							if ($res2) {
								move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
							}
						}
					}


					?>
					<h5>My Profile</h5>
					<form method="POST" enctype="multipart/form-data">
						<?php
						echo "<img src='img/".$row['profile']."' class='col-md-12' style='height: 250px;'>"

						?>

						<input type="file" name="img" class="form-control my-2">
						<input type="submit" name="upload" class="btn btn-info my-2" value="Update Profile">
					</form>

					<table class="table table-bordered">
						<tr>
							<th  colspan="2" class="text-center">My Details</th>
						</tr>
						<tr>
							<td>Firstname</td>
							<td><?php echo $row['firstname']; ?></td>
						</tr>
						<tr>
							<td>Surname</td>
							<td><?php echo $row['surname']; ?></td>
						</tr>
						<tr>
							<td>Username</td>
							<td><?php echo $row['username']; ?></td>
						</tr> 
						<tr>
							<td>Email</td>
							<td><?php echo $row['email']; ?></td>
						</tr> 
						<tr>
							<td>Phone Number</td>
							<td><?php echo $row['phone']; ?></td>
						</tr>
						 <tr>
							<td>Gender</td>
							<td><?php echo $row['gender']; ?></td>
						</tr>
						<tr>
							<td>Country</td>
							<td><?php echo $row['country']; ?></td>
						</tr>
					</table>

				</div>

				<div class="col-md-6">
					<h5 class="text-center">Change Username</h5>

					<?php
					if (isset($_POST['update'])) {
						$uname = $_POST['uname'];
						if (empty($uname)) {
							
						}
						else{
							$query3 = "UPDATE patient SET username='$uname' WHERE username='$patient'";
							$res3 = mysqli_query($connect,$query3);

							if ($res3) {
								$_SESSION['patient'] = $uname;
							}
						}
					}

					?>

					<form method="POST">
						<label>Enter Username</label>
						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
						<input type="submit" name="update" class="btn btn-info my-2" value="Update Username">
					</form>

					<h5 class="my-4 text-center">Change Password</h5>


					<?php
					if (isset($_POST['change'])) {
						$old = $_POST['old_pass'];
						$new = $_POST['new_pass'];
						$con = $_POST['con_pass'];

						$q = "SELECT * FROM patient WHERE username='$patient'";

						$re = mysqli_query($connect,$q);

						$roll = mysqli_fetch_array($re);

						if (empty($old)) {
							echo "<script>alert('Enter Old Password');</script>";
						}
						elseif (empty($new)) {
							echo "<script>alert('Enter New Password');</script>";
						}
						else if($con != $new){
							echo "<script>alert('Check the Password');</script>";
						}
						else if($old != $roll['password']){
							echo "<script>alert('both password do not match');</script>";
						}
						else{
							$again = "UPDATE patient SET password='$new' WHERE username='$patient'";
							$qq = mysqli_query($connect,$again);
						}
					}
					?>


					<form method="POST">
						<label>Old Password</label>
						<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
						<label>New Password</label>
						<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
						<label>Confirm Password</label>
						<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
						<input type="submit" name="change" class="btn btn-info my-2" value="Change Password">
					</form>
				</div>




			</div>
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>