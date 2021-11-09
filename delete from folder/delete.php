<?php


$path = "uploads/.cap*";

$filename = glob($path);

$filetodelete = $filename[0];

if(!unlink($filetodelete)){
	header("Location: index.php");
	exit();
}
else{
	echo "file deleted";

}
?>