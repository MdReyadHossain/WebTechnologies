<?php
	
	function connect() {
		$conn = new mysqli("localhost", "root", "", "todo1");
		
		if ($conn->connect_error) {
			die("Connection Error: " . $conn->connect_error);
		} 

		return $conn;
	}
?>