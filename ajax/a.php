<?php 
	if ($_SERVER['REQUEST_METHOD'] === "POST") {

		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];

		if (empty($firstname) or empty($lastname)) {
			echo "Please fill up the form properly";
		}
		else {
			/* Database Operation (Save) */

			echo "Record: " . $firstname . " " . $lastname . " " . " Inserted Sucessfully";
		}
	}
?>