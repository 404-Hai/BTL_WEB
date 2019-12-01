<?php
	require_once("../conn.php");
	
	$checkin = $_POST["checkin"];
	$checkout = $_POST["checkout"];
	$people = $_POST["people"];
	$number = $_POST["number"];
	$sql = "INSERT INTO bangtam (checkin, checkout, people, number)
			VALUES ('$checkin', '$checkout', '$people', '$number')";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: ../View/room.php");
	}
?>