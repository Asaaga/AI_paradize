<?php
include_once('header.php');
?>

<form action="search.php" method="POST">
	<input type="text" name="search" placeholder="Search">
	<button type="submit" name="submit-search">Search</button> 
</form>

<h1>Front Page</h1>
<h2>All articles:</h2>

<div class="article-container">

	<?php

	$sql = "SELECT * FROM article";

	$result = mysqli_query($conn, $sql);

	$queryResults = mysqli_num_rows($result);

	if($queryResults > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<div class='article-box'>
				<p>".$row['a_title']."</p>
				<p>".$row['a_text']."</p>
				<p>".$row['a_author']."</p> 
				<p>".$row['a_date']."</p>
			</div>";
		}
	}
	?>
</div>

</body>
</html>