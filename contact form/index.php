<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<main>
		<p>SEND E-MAIL</p>

		<form class="contactform" action="contactform.php" method="POST"> 
			<input type="text" name="name" placeholder="Full Name"><br>
			<input type="text" name="mail" placeholder="Your E-mail"><br>
			<input type="text" name="subject" placeholder="Subject"><br>
			<textarea name="message" placeholder="Message"></textarea><br>
			<button type="submit" name= "submit">SEND MAIL</button>
		</form>
	</main>

</body>
</html>