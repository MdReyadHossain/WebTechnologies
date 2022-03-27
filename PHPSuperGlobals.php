<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Superglobals</title>
</head>
<body>

	<h1>Superglobals in PHP</h1>
	<sub>Superglobals — Built-in variables that are always available in all scopes</sub>

	<p>
		<ol>
			<li>$GLOBALS</li>
			<li>$_SERVER</li>
			<li>$_REQUEST</li>
			<li>$_POST</li>
			<li>$_GET</li>
			<li>$_FILES</li>
			<li>$_ENV</li>
			<li>$_COOKIE</li>
			<li>$_SESSION</li>
		</ol>	
	</p>

	<hr><hr>
	<h1>$GLOBALS</h1>

	<?php 
		var_dump($GLOBALS);
	?>

	<hr><hr>
	<h1>$_SERVER</h1>

	<?php 
		var_dump($_SERVER);
		echo "<br><br>";
		echo $_SERVER['REQUEST_METHOD'];
		echo "<br><br>";
		echo $_SERVER['PHP_SELF'];
	?>

	<hr><hr>
	<h1>$_REQUEST</h1>

	<?php 
		var_dump($_REQUEST);
	?>

	<hr><hr>
	<h1>$_GET</h1>

	<?php 
		var_dump($_GET);
	?>

	<hr><hr>
	<h1>$_POST</h1>

	<?php 
		var_dump($_POST);
	?>

</body>
</html>