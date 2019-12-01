<?php
	require_once("../conn.php");
	
	
	if($accounttype="Admin"){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$numberphone = $_POST["numberphone"];
		$name = $_POST["name"];
		$accounttype = $_POST["accounttype"];
		$sql = "INSERT INTO account_admin (username,password,numberphone,name,accounttype)
				VALUES ('$username', '$password','$numberphone' ,'$name', '$accounttype')";
			
	}
	if($accounttype!="Admin"){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$numberphone = $_POST["numberphone"];
		$name = $_POST["name"];
		$accounttype = $_POST["accounttype"];
		$sql = "INSERT INTO account_customer (username,password,numberphone,name,accounttype)
				VALUES ('$username', '$password','$numberphone' ,'$name', '$accounttype')";
	}
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: http://localhost/Admin/");
	}
?>