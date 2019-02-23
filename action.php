<?php 
require_once "config.php";

if (isset($_POST['ok'])) {
	var_dump($_POST);
	$ok = $_POST['hidden'];
	$query = "UPDATE tasks SET conditions = 1 WHERE id = $ok";
	mysqli_query($connection, $query) or die (mysqli_error($connection));
	echo "<script>window.location.href = history.go(-2);</script>";

}






?>