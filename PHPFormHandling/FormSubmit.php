<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Submission (PHP)</title>
</head>
<body>

	<h1>Form Submission PHP</h1>

	<hr><hr>

	<h1>$_REQUEST</h1>

	<?php 
		var_dump($_REQUEST);
	?>

	<hr><hr>

	<h1>$_POST</h1>

	<?php 
		var_dump($_POST);
	?>

	<hr><hr>

	<h1>$_GET</h1>

	<?php 
		var_dump($_GET);
	?>

	<hr><hr>

	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			echo "First Name: " . $_POST['firstname'];
			echo "<br><br>";

			echo "Last Name: " . $_POST['lastname'];
			echo "<br><br>";

			echo "Full Name: " . $_POST['firstname'] . " " . $_POST['lastname'];
		}
		else {
			echo "Can not process get request";
		}
	?>

	<hr><hr>

	<a href="form.html">Go Back</a>

</body>
</html>