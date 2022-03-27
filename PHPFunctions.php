<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Functions</title>
</head>
<body>

	<h1>PHP Functions</h1>

	<p>
		Built-in, User-defined functions.
	</p>

	<hr>

	<?php 	

		echo getMessage(10);
		echo "<br><br>";

		function getMessage($msg) {
			$msg .= " Bye!";
			return $msg;
		}
	?>

	<hr><hr>

	<h1>Pass by value/reference</h1>

	<?php

		function passByValue($x, $y) {
			$x += 10;
			$y += 20;
		}

		function passByReference(&$x, &$y) {
			$x += 10;
			$y += 20;
		}

		$a = 10; $b = 20;
		passByReference($a, $b);
		echo "a = " . $a . " b = " . $b;
	?>

	<hr><hr>

	<h1>Default Argument Values</h1>

	<?php

		function show($x, $y = "20") {
			echo $x + $y;
		}

		show(100, 200);
	?>

	<hr><hr>

	<h1>Optional arguments</h1>

	<p>See <a href="https://www.php.net/manual/en/functions.arguments.php" target="_blank"><b>EXAMPLE 3</b></a> from the reference</p>

</body>
</html>