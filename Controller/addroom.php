<?php
	require_once("../conn.php");
	
	$name = $_POST["name"];
	$brand = $_POST["brand"];
	$price = $_POST["price"];
	$description = $_POST["description"];
	
	$target_dir = "../uploads/";
	$file_name = basename($_FILES["fileUpload"]["name"]);
	if ($_POST["id"] != "") {
		// UPDATE
		$id = $_POST["id"];

		if ($file_name == "") {
			$sql = "UPDATE room
			SET
				name = '$name',
				brand = '$brand',
				price = $price,
				description = '$description'
			WHERE id = '$id'";
		} else {
			$sql = "UPDATE room
			SET
				name = '$name',
				brand = '$brand',
				price = $price,
				description = '$description',
				image = '$file_name'
			WHERE id = '$id'";

		}
		
	} else {
		// ADD
		$sql = "INSERT INTO room (name, brand, price, description, image)
			VALUES ('$name', '$brand', $price, '$description', '$file_name')";
	}
	
	if ($file_name != "") {
		$target_file = $target_dir . $file_name;
		
		if (!move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
			die("Sorry, there was an error uploading your file.");
		}
	}
			
	if ($conn->query($sql) === FALSE) {
		die("Error: " . $sql . $conn->error);
	} else {
		header("Location: http://localhost/Admin/");
	}
?>