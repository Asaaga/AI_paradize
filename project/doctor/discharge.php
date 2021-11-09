<?php
session_start();
include("../includes/connection.php");
include("../includes/header.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Check Patient Appointment</title>
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
				<h5 class="text-center">Total Appointment</h5>
				<?php
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$query = "SELECT * FROM appointment WHERE id='$id'";
					$result = mysqli_query($connect,$query);

					$row = mysqli_fetch_array($result);
				}

				?>

				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<table class="table table-bordered">
								<tr>
									<td colspan="2" class="text-center">Appointment Details</td>
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
									<td>Gender</td>
									<td><?php echo $row['gender']; ?></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td><?php echo $row['phone']; ?></td>
								</tr>
								<tr>
									<td>Appointment Date</td>
									<td><?php echo $row['appointment_date']; ?></td>
								</tr>
								<tr>
									<td>Symptoms</td>
									<td><?php echo $row['symptoms']; ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<h5 class="text-center my-1">Invoice</h5>
							<?php
							if (isset($_POST['send'])) {
								$fee = $_POST['fee'];
								$des = $_POST['des'];

								if (empty($fee)) {
									
								}
								elseif (empty($des)) {
									
								}
								else{
									$doc = $_SESSION['doctor'];

									$fname = $row['firstname'];

									$qque = "INSERT INTO income(doctor,patient,date_discharge,amount,description) VALUES ('$doc','$fname',NOW(),'$fee','$des')";
									$rem = mysqli_query($connect,$qque);
									if($rem){
										echo "<script>alert('You have send invoice');</script>";

										mysqli_query($connect,"UPDATE appointment SET status='Discharge' WHERE id='$id'");
									}





								}
							}

							?>

							<form method="POST">
								<label>Fee</label>
								<input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Enter Patient Fee">

								<label>Description</label>
								<input type="text" name="des" class="form-control" autocomplete="off" placeholder="Enter Description">
								<input type="submit" name="send" class="btn btn-info my-2" value="Send">
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