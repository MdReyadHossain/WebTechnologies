<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Action</title>
</head>
<body>

	<h1>Update Action</h1>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$id = test($_POST['id']);
			$firstname = test($_POST['fname']);
			$lastname = test($_POST['lname']);

			if (empty($id) or empty($firstname) or empty($lastname)) {
				echo "Please fill up the form properly";
			}
			else {
				define("FILENAME", "data.json");
				$handle = fopen(FILENAME, "r");
				$fr = fread($handle, filesize(FILENAME));
				$arr1 = json_decode($fr);
				$fc = fclose($handle);

				$handle = fopen(FILENAME, "w");

				for ($i = 0; $i < count($arr1); $i++) {
					if (+$id === $arr1[$i]->id) {
						$arr1[$i]->fname = $firstname;
						$arr1[$i]->lname = $lastname;
					}
				}

				$data = json_encode($arr1);
				$fw = fwrite($handle, $data);
		
				$fc = fclose($handle);

				if ($fw) {
					echo "<h3>Data Update Successful</h3>";
				}

			}

		}
	?>

	<a href="UserList.php">User List</a>

</body>
</html>