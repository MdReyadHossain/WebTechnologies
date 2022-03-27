<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Submission (PHP)</title>
</head>
<body>

	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			/* empty() vs isset() */

			$firstname = test($_POST['firstname']);
			$middlename = test($_POST['middlename']);
			$lastname = test($_POST['lastname']);

			if (empty($firstname) or empty($lastname)) {
				/*echo "Please fill up the form properly";*/

				/*header("Location: form.html");*/
				header("Location: Form.php?errorMsg=Please fill up the form properly.");
			}
			else {
				echo "First Name: " . $firstname;
				echo "<br><br>";
				echo "Middle Name: " . $middlename;
				echo "<br><br>";
				echo "Last Name: " . $lastname;
			}
		}
	?>

	<hr><hr>

	<a href="form.html">Go Back</a>

</body>
</html>