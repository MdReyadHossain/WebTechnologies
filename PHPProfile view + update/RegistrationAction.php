<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
</head>
<body>

	<h1>Registration Action</h1>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test($_POST['fname']);
			$lastname = test($_POST['lname']);

			if (empty($firstname) or empty($lastname)) {
				echo "Please fill up the form properly";
			}
			else {
				define("FILENAME", "data.json");
				$handle = fopen(FILENAME, "r");
				$arr1 = NULL;
				$size = filesize(FILENAME);
				if ($size > 0) {

					$fr = fread($handle, $size);
					$arr1 = json_decode($fr);
					$fc = fclose($handle);
				}

				$handle = fopen(FILENAME, "w");
				if ($arr1 === NULL) {
					$id = 1;
					$data = array('id' => $id, 'fname' => $firstname, 'lname' => $lastname);
					$data = array($data);
					$data = json_encode($data);
					$fw = fwrite($handle, $data);
				}
				else {
					$id = $arr1[count($arr1) - 1]->id;
					$data = array('id' => $id + 1, 'fname' => $firstname, 'lname' => $lastname);
					$arr1[] = $data;
					$data = json_encode($arr1);
					$fw = fwrite($handle, $data);
				}
				$fc = fclose($handle);

				if ($fw) {
					echo "<h3>Data Insertion Successful</h3>";
				}

			}

		}
	?>

	<a href="registration.html">Create User</a>

</body>
</html>