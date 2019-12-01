<?php
	require_once("../conn.php");
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$accounttype = "Khách";
	$name = $lastname." ".$firstname;
	$sql = "INSERT INTO account_customer (username,password,name,accounttype)
			VALUES ('$username', '$password','$name', '$accounttype')";
	
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: http://localhost/Admin/");
	}
?>