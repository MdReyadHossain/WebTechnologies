<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP File</title>
</head>
<body>

	<h1>PHP File</h1>

	<p>To know more <a href="https://www.w3schools.com/php/php_file_open.asp" target="_blank">click here</a></p>

	<hr><hr>

	<h1>PHP Create/Open</h1>

	<?php 
		/*define(FILENAME, "data.txt");*/
		define("FILENAME", "data.json");
		/*$handle = fopen(FILENAME, "w");*/
		$handle = fopen(FILENAME, "a");
		var_dump($handle);
	?>

	<hr><hr>

	<h1>PHP File Write</h1>
	<?php 
		$data = "My Name is Kawsur";
		$fw = fwrite($handle, $data . "\n");
		var_dump($fw);
	?>
	<hr><hr>

	<h1>PHP File Close</h1>
	<?php 
		$fc = fclose($handle);
		var_dump($fc);
	?>
	<hr><hr>

	<h1>PHP File Read</h1>
	<?php 
		/*var_dump($handle);*/

		$handle = fopen(FILENAME, "r");
		$length = filesize(FILENAME);
		$fr = fread($handle, $length);
		var_dump($fr);
		echo "<br><br>";

		/*echo $fr;*/
		print_r($fr);

		echo "<br><br>";

		$arr1 = explode("\n", $fr);
		array_splice($arr1, count($arr1) - 1);
		var_dump($arr1);

		fclose($handle);
	?>

</body>
</html>