<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Self</title>
</head>
<body>

	<?php 

		$firstnameErr = $lastnameErr = "";
		$firstname = $middlename = $lastname = "";
		$isValid = true;
		$isChecked = false;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test($_POST['firstname']);
			$middlename = test($_POST['middlename']);
			$lastname = test($_POST['lastname']);

			$isChecked = true;
			if (empty($firstname)) {
				$isValid = false;
				$firstnameErr = "First name can not be empty";
			}
			if (empty($lastname)) {
				$isValid = false;
				$lastnameErr = "Last name can not be empty";
			}
		}
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
		
		<label for="fname">First Name*:</label>
		<input type="text" name="firstname" id="fname" size="80">
		<span><?php echo $firstnameErr; ?></span>

		<br><br>
		
		<label for="mname">Middle Name:</label>
		<input type="text" name="middlename" id="mname" size="80">

		<br><br>

		<label for="lname">Last Name*:</label>
		<input type="text" name="lastname" id="lname" size="80">
		<span><?php echo $lastnameErr; ?></span>

		<br><br>

		<input type="submit" name="submit" value="Submit">

	</form>

	<?php 
		if ($isChecked and $isValid) {
			echo "First Name: " . $firstname;
			echo "<br><br>";
			echo "Middle Name: " . $middlename;
			echo "<br><br>";
			echo "Last Name: " . $lastname;
		}
	?>

</body>
</html>