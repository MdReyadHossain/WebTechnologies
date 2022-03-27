<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Validation</title>
</head>
<body>

	<?php 
		$firstnameErr = $lastnameErr = $emailErr = $dobErr = "";
		$firstname = $middlename = $lastname = $email = $dob = "";
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
			$email = test($_POST['email']);
			$dob = test($_POST['dob']);

			$isChecked = true;
			if (empty($firstname)) {
				$isValid = false;
				$firstnameErr = "*First name can not be empty";
			}
			if (empty($lastname)) {
				$isValid = false;
				$lastnameErr = "*Last name can not be empty";
			}
			if (empty($email)) {
				$isValid = false;
				$emailErr = "*Email can not be empty";
			}
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$isValid = false;
				$emailErr = "*Email incorrect";
			}
			if (empty($dob)) {
				$isValid = false;
				$dobErr = "*Birthday can not be empty";
			}
			if (2022 - intval($dob) < 18) {
				$isValid = false;
				$dobErr = "*You have underage";
			}
		}
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
		
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

		<label for="email">Email*:</label>
		<input type="email" name="email" id="email" size="80">
		<span><?php echo $emailErr; ?></span>

		<br><br>

		<label for="birth">Date of Birth*:</label>
		<input type="date" name="dob" id="birth">
		<span><?php echo $dobErr; ?></span>

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
            echo "<br><br>";
			echo "Email : " . $email;
			echo "<br><br>";
			echo "Date of Birthday : " . $dob . "<br>";

			$x = 5;
			$a = $x++;
			echo $a;

		}
	?>

</body>
</html>