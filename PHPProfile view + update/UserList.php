<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List</title>
</head>
<body>

	<h1>User List</h1>

	<?php 
		define("FILENAME", "data.json");
		$handle = fopen(FILENAME, "r");
		$fr = fread($handle, filesize(FILENAME));
		$arr1 = json_decode($fr);
		$fc = fclose($handle);
	?>

	<?php 
		if ($arr1 === NULL) {
			echo "No record(s) found";
		}
		else {
			echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Id</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			for ($i = 0; $i < count($arr1); $i++) {
				echo "<tr>";
				echo "<td>" . $arr1[$i]->id . "</td>";
				echo "<td>" . $arr1[$i]->fname . "</td>";
				echo "<td>" . $arr1[$i]->lname . "</td>";
				echo "<td>" . "<a href='DeleteAction.php?id=" . $arr1[$i]->id . "'>Delete</a>" . "|" . "<a href='Update.php?id=" . $arr1[$i]->id . "'>Update</a>" . "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
		}
	?>

	<br><br>

	<a href="registration.html">Create User</a>

</body>
</html>