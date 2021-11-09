<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js" integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


	<script type="text/javascript" src=""></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-info bg-info">
	<h5 class="text-white">Hospital Management System</h5>
	<div class="mr-auto"></div>
		<ul class="navbar-nav">
			<?php
			if(isset($_SESSION['admin'])){

				$user = $_SESSION['admin'];

				echo '
			<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>';

			}
			else if(isset($_SESSION['doctor'])){
				$user = $_SESSION['doctor'];
				echo '
			<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>'; 
			}
			else if (isset($_SESSION['patient'])) {

				$user = $_SESSION['patient'];
				echo '
			<li class="nav-item"><a href="#" class="nav-link text-white">'.$user.'</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link text-white">logout</a></li>'; 
				
			}
			else{

				echo '
				<li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
			<li class="nav-item"><a href="adminlogin.php" class="nav-link text-white">Admin</a></li>
			<li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white">Doctor</a></li>
			<li class="nav-item"><a href="patientlogin.php" class="nav-link text-white">Patient</a></li>';

			}
			?>
		</ul>
</nav>
</body>
</html>