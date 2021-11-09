<?php
include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>HMS Home</title>
</head>
<body>
	<div style="margin-top: 50px;"></div>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">

								<!--the Infor button div starts here-->

				<div class="col-md-3 mx-1 shadow">
					<img src="img/info.png" style="width:100%; height: 190px;">
					<h5 class="text-center">Click on the Button for more information</h5>
					<a href="#">
						<button class="btn btn-success my-3" style="margin-left:20%;">More Infomation!!</button>
					</a>
				</div>
									<!--the Infor button div ends here-->
									<!--the create account button div starts here-->
				<div class="col-md-3 mx-1 shadow">
 					<img src="img/patient.jfif" style="width:100%;">

 					<h5 class="text-center">Create Account so that we can take good care of you.</h5>
					<a href="account.php">
						<button class="btn btn-success my-3" style="margin-left:30%;">Create Account!!</button>
					</a>
					
				</div>
								<!--the create account button div ends here-->
								<!--the employment button div ends here-->
		 		<div class="col-md-3 mx-1 shadow">
					<img src="img/doctor.jfif" style="width:100%;">

					<h5 class="text-center">We are Employing doctors</h5>
					<a href="apply.php">
						<button class="btn btn-success my-3" style="margin-left:30%;">Apply Now!!</button>
					</a>
				</div>
								<!--the employment button div ends here-->

			</div>
		</div>
	</div>
</body>
</html>
