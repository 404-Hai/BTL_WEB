<?php
	require_once("../conn.php");
	
	
	
		header("Location: http://localhost");
		$sql="DELETE FROM bangtam";
		$conn->query($sql);
		
	
?>