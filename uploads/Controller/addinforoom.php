<?php
	require_once("../conn.php");
	
	
	$name = $_POST["tenphong"];
	$price = $_POST["giaphong"]+$_POST["duadon"]+$_POST["buffet"];
	$nameuser = $_POST["nameuser"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$checkin = $_POST["checkin"];
	$checkout = $_POST["checkout"];
	$brand = $_POST["brand"];
	$soluong = $_POST["soluong"];
	$sql = "INSERT INTO info (name, price, nameuser, email,phone,checkin,checkout,brand,soluong)
			VALUES ('$name', '$price', '$nameuser', '$email','$phone','$checkin','$checkout','$brand','$soluong')";
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: http://localhost");
		$sql="DELETE FROM bangtam";
		$conn->query($sql);
		
	}
?>