<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Control Structure</title>
</head>
<body>

	<h1>Control Structure</h1>

	<p>
		if, else, elseif, while, do-while, for, foreach, break, continue, switch, return, require, include, require_once, include_once. 

		To know more about PHP Expression. 
		<a href="https://www.php.net/manual/en/language.control-structures.php" target="_blank">Click here</a>
	</p>

	<hr>

	<p>
		General Syntax: include/require <code>filename</code>
		<br>
		The include and require statements are identical, except upon failure:
		<ul>
			<li>require will produce a fatal error (E_COMPILE_ERROR) and stop the script</li>
			<li>include will only produce a warning (E_WARNING) and the script will continue</li>
		</ul>
	</p>

	<?php 
		include 'PHPExpression.php';

		#require 'PHPExpression.php';
	?>

	<h3>Include Again</h3>

	<?php 
		include 'PHPExpression.php';
	?>

</body>
</html>