<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Variables</title>
</head>
<body>

	<h1>PHP Variables</h1>

	<p>
		PHP Loosely typed language.
		<ul>
			<li>Variables in PHP are represented by a dollar sign followed by the name of the variable. The variable name is case-sensitive.</li> 
			<li>A valid variable name starts with a letter or underscore, followed by any number of letters, numbers, or underscores. As a regular expression, it would be expressed thus: ^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$)</li>
		</ul>
	</p>

	<?php 
		$x = "Hello PHP";
		echo $x;
		echo "<br>";
		var_dump($x);
		echo "<br>";
		echo gettype($x);
		echo "<br>";
		echo is_string($x);

		echo "<br>";

		$x = 10;
		echo $x;
		echo "<br>";
		var_dump($x);
		echo "<br>";
		echo gettype($x);
		echo "<br>";
		echo is_int($x);
	?>

	<hr><hr>

	<h1>PHP Types</h1>
	<p>
		PHP supports ten primitive types. 
		<ul>
			<li>Four scalar types: bool, int,, float (floating-point number, aka double), string.</li>
			<li>Four compound types: array, object, callable, iterable. </li>
			<li>Two special types: resource, NULL</li>
		</ul>
	</p>

	<hr><hr>

	<h1>Type Casting</h1>

	<p>
		Allowed Type Casting 
		<ol>
			<li>(int), (integer) - cast to int</li>
			<li>(bool), (boolean) - cast to bool</li>
			<li>(float), (double), (real) - cast to float</li>
			<li>(string) - cast to string</li>
			<li>(array) - cast to array</li>
			<li>(object) - cast to object</li>
			<li>(unset) - cast to NULL</li>
		</ol>
	</p>

	<?php 
		$y = 10;
		echo $y;
		echo "<br>";
		var_dump($y);
		echo "<br>";
		$y = (string) $y;
		echo $y;
		echo "<br>";
		var_dump($y);
		echo "<br>";
		$y = (unset) $y;
		echo $y;
		echo "<br>";
		var_dump($y);
	?>

	<hr><hr>

	<h1>Type Juggling</h1>

	<p>
		<a href="https://www.php.net/manual/en/language.types.type-juggling.php" target="_blank">Click here</a> to know more.
	</p>

	<?php
		$foo = "1";  // $foo is string (ASCII 49)
		$foo *= 2;   // $foo is now an integer (2)
		$foo = $foo * 1.3;  // $foo is now a float (2.6)
		$foo = 5 * "10 Little Piggies"; // $foo is integer (50)
		$foo = 5 * "10 Small Pigs";     // $foo is integer (50)

		echo 20 * "10chocolates50";
	?>

	<hr><hr>

	<h1>Variables variable</h1>
	<?php 
		$p = "hello";
		$$p = "world"; // $$p = ${$p} = $hello
		$$$p = "php"; // $$$p = $${$p} = $$hello = ${$hello} = $world
		$$$$p = "variable";

		echo $p . " " . $hello . " " . $world . " " . $php;
	?>

	<hr><hr>

	<h1>Variable Scope</h1>

	<p>Gloabl vs Local [global, $GLOBALS]</p>

	<?php 

		$m = 10;

		function show() {
			echo "showing: ";
			/*$m = 30;*/
			/*var_dump($m);*/	
			/*echo $m;*/
			/*echo $GLOBALS['m'];*/
			global $m;
			echo $m;
		}
		$m = 20;
		/*echo $m;*/
		show();
	?>

	<hr><hr>

	<h1>PHP Constants</h1>

	<p>const keyword, define() [scalar + array]</p>

	<p>
		<ol>
			<li>Constants do not have a dollar sign ($) before them</li>
			<li>Constants may be defined and accessed anywhere without regard to variable scoping rules</li>
			<li>Constants may not be redefined or undefined once they have been set</li>
			<li>Constants may only evaluate to scalar values or arrays</li>
		</ol>
	</p>

	<?php 
		const i = 10;
		echo i;
	?>
	<br>
	<?php
		define('PI', 3.1416);
		echo PI;
	?>

</body>
</html>