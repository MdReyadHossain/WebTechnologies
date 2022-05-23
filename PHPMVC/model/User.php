<?php 
	require 'Connect.php';

	function create($firstname, $lastname) {
		$conn = connect();

		$sql = "INSERT INTO Users (firstname, lastname) VALUES (?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ss", $fname, $lname);

		$fname = $firstname;
		$lname = $lastname;

		$res = $stmt->execute();
		$stmt->close();
		$conn->close();

		return $res;
	}

	function get($firstname) {
		$conn = connect(); 

		$sql = "SELECT * FROM Users Where firstname LIKE ?";
		$stmt = $conn->prepare($sql);
		$fname = $firstname;
		$fname = "%" . $fname . "%";
		$stmt->bind_param("s", $fname);

	    $stmt->execute();
		$result = $stmt->get_result();

		$stmt->close();
		$conn->close();

		return $result;
	}

	function getAll() {
		$conn = connect(); 

		$sql = "SELECT * FROM Users";
		$stmt = $conn->prepare($sql);
		/*$stmt->bind_param("s", $fname);*/

		/*$fname = $firstname;*/

	    $stmt->execute();
		$result = $stmt->get_result();
		
		$stmt->close();
		$conn->close();

		return $result;
	}
?>