<?php
include_once('conn.php');

if(isset($_POST['submit'])){

	$name = $_POST['name'];
	$matno = $_POST['matno'];

	$imageName = $_FILES['image']['name'];
	$imageSize = $_FILES['image']['size'];
	$imageTmpName = $_FILES['image']['tmp_name'];
	$imageType = $_FILES['image']['type'];
	$imageError = $_FILES['image']['error'];

	$sql = "SELECT * FROM student";

	$result = mysqli_query($conn,$sql);


	$query = "INSERT INTO student(name, matric, image) VALUES('$name', '$matno','$imageName')";

	$sql = mysqli_query($conn, $query);

	$checkResult = mysqli_num_rows($result);

	if($checkResult > 0){

		while($row = mysqli_fetch_assoc($result)){

	$fileExt = explode(".", $imageName);
	$fileFinalExt = strtolower(end($fileExt));

	$Ext = array('jpg','png','jfif','jpeg');

	if(in_array($fileFinalExt, $Ext)){

		if($imageError ===0 ){
			if($imageSize < 1000000){

				$destination = "images/".$imageName;

				move_uploaded_file($imageTmpName, $destination);

			}
			else{
				echo "File too large";
			}

		}
		else{
			echo "there are error in uploading image";
		}

	}
	else{
		echo "Image uploaded successfully";
	}

	}

	}

}
?>
<main>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="text" name="name" placeholder="student Name"><br>
		<input type="text" name="matno" Placeholder="Matric Num"><br>
		<input type="file" name="image"><br>
		<button type="submit" name="submit" value="Submit">Upload</button>
	</form>
</main>
