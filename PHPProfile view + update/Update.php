<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User</title>
</head>
<body>
	<?php 
		define("FILENAME", "data.json");
		$id = $firstname = $lastname = "";
		if (isset($_GET['id'])) {		
			$id = $_GET['id'];
			$handle = fopen(FILENAME, "r");
			$fr = fread($handle, filesize(FILENAME));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			for ($i = 0; $i < count($arr1); $i++) {
				if (+$id === $arr1[$i]->id) {
					$firstname = $arr1[$i]->fname;
					$lastname = $arr1[$i]->lname;
				}
			}
		}
		else {
			die("Invalid Request");
		}
	?>

	<h1>Update User</h1>

	<form action="UpdateAction.php" method="post">

		<label>Id*:</label>
		<input type="number" name="id" value="<?php echo $id; ?>" readonly>
		<br><br>

		<label>First Name*:</label>
		<input type="text" name="fname" value="<?php echo $firstname; ?>">
		<br><br>

		<label>Last Name*:</label>
		<input type="text" name="lname" value="<?php echo $lastname; ?>">
		<br><br>

		<input type="submit" name="Update">
	</form>

	<br><br>

	<a href="UserList.php">User List</a>

</body>
</html>