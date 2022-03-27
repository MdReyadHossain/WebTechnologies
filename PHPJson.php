<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Json</title>
</head>
<body>

	<h1>PHP Json</h1>

	<?php 
		define("FILENAME", "data.json");
		$handle = fopen(FILENAME, "w");
	?>

	<hr><hr>

	<?php 
		$name = "Mir Md. Kawsur";
		$age = 10;

		/*$data = '{"name": "Mir Md. Kawsur", "age": 10}';*/

		$data = array("name" => $name, "age" => $age);
		var_dump($data);
		echo "<br><br>";
		$data = json_encode($data);
		var_dump($data);

		fwrite($handle, $data);

		fclose($handle);
	?>

	<hr><hr>

	<?php
		$handle = fopen(FILENAME, "r");
		$fr = fread($handle, filesize(FILENAME));
		var_dump($fr);

		echo "<br><br>";

		$fr = json_decode($fr);

		var_dump($fr);

		echo "<br><br>";

		echo $fr->name . " " . $fr->age;

		fclose($handle);
	?>
</body>
</html>