<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Action</title>
</head>
<body>

	<h1>Delete Action</h1>

	<?php 
		define("FILENAME", "data.json");
		if (isset($_GET['id'])) {		
			$id = $_GET['id'];
			$handle = fopen(FILENAME, "r");
			$fr = fread($handle, filesize(FILENAME));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			$handle = fopen(FILENAME, "w");
			$arr2 = array();
			for ($i = 0; $i < count($arr1); $i++) {
				if (+$id !== $arr1[$i]->id) {
					array_push($arr2, $arr1[$i]);
				}
			}

			$data = json_encode($arr2);
			$fw = fwrite($handle, $data);
			$fc = fclose($handle);

			if ($fw) {
				echo "<h3>Data Delete Successful</h3>";
			}
		}
		else {
			die("Invalid Request");
		}
	?>

	<a href="UserList.php">User List</a>

</body>
</html>