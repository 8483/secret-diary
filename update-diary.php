<?php 
	session_start();

	include("connection.php");
	
	$diary = isset($_POST['diary']) ? $_POST['diary'] : '';
	
	$query = "UPDATE users SET diary = '" . mysqli_real_escape_string($link, $diary) . "' WHERE id = '" . $_SESSION["id"] . "' LIMIT 1";

	mysqli_query($link, $query);
?>

<!-- This is used for test purpose only if the above works

<form method="post">
	<input type="text" name="diary"/>
	<input type="submit"/>
</form> -->