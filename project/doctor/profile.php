<?php
session_start();
include("../includes/header.php");
include("../includes/connection.php");

?>

<!DOCTYPE html>
<html>
<head>
<title>Doctors Profile Page</title>
</head>
<body>


<div class="container-fluid">
<div class="col-md-12">
<div class="row">
<div class="col-md-2" style="margin-left: -30px;">
<?php

include("sidenav.php");
?>
</div>
<div class="col-md-10">


<div class="container-fluid">
<div class="col-md-12">
<div class="row">
	<div class="col-md-6">
		
		<?php
		$doc = $_SESSION['doctor'];
		$query = "SELECT * FROM doctors WHERE username='$doc'";

		$res = mysqli_query($connect,$query);
		$row = mysqli_fetch_array($res);


		if(isset($_POST['upload'])){

			$image = $_FILES['image']['name'];
			if(empty($image)){

			}
			else{
				$query2 = "UPDATE doctors SET profile='$image' WHERE username='$doc'";
				$resq = mysqli_query($connect,$query2);
				if($resq){
					move_uploaded_file($_FILES['image']['tmp_name'],"img/$image");
				}
			}
		}

		?>
		<form method="POST" enctype="multipart/form-data">
			<?php
			echo "<img src='img/".$row['profile']."' style='height: 250px;' class='col-md-12 my-3'>";
			?>
			<input type="file" name="image" class="form-control my-1">
			<input type="submit" name="upload" class="btn btn-success" value="Update Profile">
		</form>

		<div class="my-3">
			<table class="table table-bordered">
				<tr>
					<th class="text-center" colspan="2">Details</th>
				</tr>
				<tr>
					<td>Firstname</td>
					<td>
					<?php
					echo $row['firstname'];
					?>
					</td>
				</tr>
				<tr>
					<td>Surname</td>
					<td>
					<?php
					echo $row['surname'];
					?>
					</td>
				</tr>
				<tr>
					<td>Username</td>
					<td>
					<?php
					echo $row['username'];
					?>
					</td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>
					<?php
					echo $row['email'];
					?>
					</td>
				</tr>
				<tr>
					<td>Phone No.</td>
					<td>
					<?php
					echo $row['phone'];
					?>
					</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>
					<?php
					echo $row['gender'];
					?>
					</td>
				</tr>
				<tr>
					<td>Country</td>
					<td>
					<?php
					echo $row['country'];
					?>
					</td>
				</tr>
				<tr>
					<td>Salary</td>
					<td>
					<?php
					echo "$".$row['salary'];
					?>
					</td>
				</tr>






				
			</table>
			
		</div>

	</div>
	<div class="col-md-6">
		<h5 class="text-center my-2">Change username</h5>
		<?php

		if(isset($_POST['change_uname'])){
			$uname = $_POST['uname'];

			if(empty($uname)){

			}
			else{
				$query3 = "UPDATE doctors SET username='$uname' WHERE username='$doc'";
				$resqq = mysqli_query($connect,$query3);
				if($resqq){
					$_SESSION['doctor'] = $uname;
				}
			}
		}


		?>
		<form method="POST">
			<label>Username</label>
			<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username"><br>
			<input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
		</form>
		<br><br>
		<h5 class="text-center my-2">Change Password</h5>
		<?php
		if(isset($_POST['change_pass'])){
			$old = $_POST['old_pass'];
			$new = $_POST['new_pass'];
			$con = $_POST['con_pass'];

			$query4 = "SELECT * FROM doctors WHERE username='$doc'";
			$resqqq = mysqli_query($connect,$query4);
			$row2 = mysqli_fetch_array($resqqq); 

			if ($old != $row2['password']) {
				# code...
			}
			else if(empty($new)){

			}
			else if($con != $new){

			}
			else{
				$query5 = "UPDATE doctors SET password='$new' WHERE username='$doc'";
				mysqli_query($connect,$query5); 
			}
		}
		?>
		<form method="POST">
			<div class="form-group">
			<label>Old Password</label>
			<input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
			</div>
			<div class="form-group">
			<label>New Password</label>
			<input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter New Password">
			</div>
			<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
			</div>
			<input type="submit" name="change_pass" class="btn btn-info" value="Change Password">	
			
		</form>
	</div>
</div>
</div>
</div>

</div>
</div>	
</div>
</div>
</body>
</html>