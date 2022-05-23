<?php 
	
	require '../model/User.php';

	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$firstname = sanitize($_POST['fname']);
		$lastname = sanitize($_POST['lname']);

		if (empty($firstname) or empty($lastname)) {
			echo "Please fill up the form properly";
		}
		else {
			$firstname = strtoupper($firstname);
			$response = create($firstname, $lastname);
			if ($response) {
				echo "New user created.";
			}
			else {
				echo "Error while creating user.";
			}
		}
	}

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>