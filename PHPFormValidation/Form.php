<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Submission</title>
</head>
<body>

	<form action="FormSubmit.php" method="post">
		
		<label for="fname">First Name*:</label>
		<input type="text" name="firstname" id="fname" size="80">

		<br><br>
		
		<label for="mname">Middle Name:</label>
		<input type="text" name="middlename" id="mname" size="80">

		<br><br>

		<label for="lname">Last Name*:</label>
		<input type="text" name="lastname" id="lname" size="80">

		<br><br>

		<input type="submit" name="submit" value="Submit">

	</form>

	<br><br>

	<?php 
		if (isset($_GET['errorMsg'])) {
			echo $_GET['errorMsg'];
		}
	?>

</body>
</html>