<?php
session_start();
include("../includes/connection.php");
include("../includes/header.php");


?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Appointment</title>
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
				<h5 class="text-center">Book Appointment</h5>

				<?php
				$pat = $_SESSION['patient'];
				$sell = mysqli_query($connect,"SELECT * FROM patient WHERE username='$pat'");
				$row = mysqli_fetch_array($sell);

				$firstname = $row['firstname'];
				$surname = $row['surname'];
				$gender = $row['gender'];
				$phone = $row['phone'];

				if (isset($_POST['book'])) {
					$date = $_POST['date'];
					$sym = $_POST['sym'];

					if (empty($sym)) {
						
					}
					else{
						$quer = "INSERT INTO appointment(firstname,surname,gender,phone,appointment_date,symptoms,status,date_booked) VALUES('$firstname','$surname','$gender','$phone','$date','$sym','pedding',NOW())";
						$rest = mysqli_query($connect,$quer);

						if ($rest) {
							echo "<script>alert('You have booked an appointment.');</script>";
						}
					}
				}

				?>

				<div class="col-md-12">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 jumbotron">
							<form method="POST">
								<label>Appointment Date</label>
								<input type="date" name="date" class="form-control">
								<label>Symptoms</label>
								<input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">
								<input type="submit" name="book" class="btn btn-info my-2" value="Book Appointment">
							</form>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
</body>
</html>