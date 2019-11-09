<?php
	$database = "quanlybanhang";
	$username = "root";
	$password = "";
	$host     = "localhost";

	$conn = mysqli_connect($host, $username, $password, $database);

	if (!$conn) {
		echo error_reporting();
		die();
	}
?>