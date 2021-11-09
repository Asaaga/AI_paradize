<?php
session_start(); 
include("../includes/header.php");
include("../includes/connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Invoice</title>
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
				<h5 class="text-center my-2">My invoice</h5>
				<?php
				$pat = $_SESSION['patient'];

				$query = "SELECT * FROM patient WHERE username='$pat'";
				$res = mysqli_query($connect,$query);

				$row = mysqli_fetch_array($res);

				$fname = $row['firstname'];

				$query2 = mysqli_query($connect,"SELECT * FROM income WHERE patient='$fname'");

				$output ="";

				$output .="

					<table class='table table-bordered'>
					<tr>
					<td>ID</td>
					<td>Doctor</td>
					<td>Patient</td>
					<td>Date Descharge</td>
					<td>Amount Paid</td>
					<td>Description</td>
					<td>Action</td>
					</tr>
				";

				if(mysqli_num_rows($query2) < 1){
					$output .="
						<tr>
						<td colspan='6' class='text-center'>No invoice Yet!</td>
 						</tr>
					";
				}
				while($out = mysqli_fetch_array($query2)){
					$output .="
						<tr>
						<td>".$out['id']."<td>
						<td>".$out['doctor']."<td>
						<td>".$out['patient']."<td>
						<td>".$out['date_discharge']."<td>
						<td>".$out['amount']."<td>
						<td>".$out['description']."<td>
						<td>
						<a href='view.php?id=".$out['id']."'>
		 				<button class='btn btn-info my-2'>View</button></a>

						</td>
						
					";
				}
				$output .="
					</tr></table>
				";

				echo $output;
				?>
			</div>
		</div>
	</div>
</div>
</body>
</html>