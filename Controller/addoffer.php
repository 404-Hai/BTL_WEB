<?php
	require_once("../conn.php");
	
	$name = $_POST["name"];
	$price = $_POST["price"];
	$description = $_POST["description"];
	$amount = $_POST["amount"];
	$sql = "INSERT INTO offer (name, price, description, amount)
			VALUES ('$name', '$price', '$description', '$amount')";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: http://localhost/Admin/");
	}
?>