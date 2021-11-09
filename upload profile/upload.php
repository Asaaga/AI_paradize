<?php

if(isset($_POST['submit'])){

	$file = $_FILES['file'];

	$filename = $_FILES['file']['name'];
	$filesize = $_FILES['file']['size'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];


	$fileExtension = explode(".", $filename);

	$fileActualExtension = strtolower(end($fileExtension));

	$allowed = array('jpeg','jpg','jfif','png');

	if(in_array($fileActualExtension, $allowed)){
		if($fileError === 0){

			if($filesize < 1000000){

				$fileNewName = uniqid('',true).".".$fileActualExtension;


				$fileDestination = "upload/".$fileNewName;

				move_uploaded_file($fileTmpName, $fileDestination);

			}

			else{

				echo "Size is too large";
			}

		}
		else{
			echo "there is an error uploading your file";
		}

	}

	else{

		echo "can't upload file of these format";
	}


}
else{

	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST" enctype="multipart/form-data">

		<input type="file" name="file">
		<input type="submit" name="submit" value="UPLOAD">
		
	</form>


</body>
</html>