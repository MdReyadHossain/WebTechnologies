<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP Arrays</title>
</head>
<body>

	<h1>Arrays in PHP</h1>

	<?php 
		$arr1 = array();
		var_dump($arr1);

		echo "<br><br>";

		$arr2 = array(1, 2, 3);
		var_dump($arr2);

		echo "<br><br>";

		$arr3 = array(1, "Two", 3.5, true);
		var_dump($arr3);

		echo "<br><br>";

		$arr4 = array(1, "Two", array(3.5, true, "m_array"), "new_string");
		var_dump($arr4);
	?>	

	<hr><hr>
	<h1>Array size</h1>

	<?php 
		$len = count($arr2);
		echo "Length of arr2 is: " . $len;

		echo "<br><br>";

		$len = count($arr3);
		echo "Length of arr3 is: " . $len;

		echo "<br><br>";

		$len = count($arr4);
		echo "Length of arr4 is: " . $len;
	?>

	<hr><hr>
	<h1>Printing Array using echo and print_r and var_dump</h1>
	<?php 
		echo $arr2;
		echo "<br><br>";
		var_dump($arr2);
		echo "<br><br>";
		print_r($arr2);
	?>

	<hr><hr>
	<h1>Access/Traverse elements in arrays</h1>

	<?php 
		echo $arr2[1];
		echo "<br><br>";
		for($i = 0; $i < count($arr2); $i++) {
			echo $arr2[$i] . " ";
		}
	?>

	<hr><hr>
	<h1>Adding an element in array</h1>

	<?php
		var_dump($arr2);
		echo "<br><br>"; 
		array_push($arr2, "Four");
		var_dump($arr2);
	?>

	<hr><hr>
	<h1>Removing an element from array</h1>

	<?php 
		var_dump($arr2);
		echo "<br><br>";
		/*array_splice($arr2, 1);*/
		array_splice($arr2, count($arr2) - 1);
		var_dump($arr2);
		echo "<br><br>";
		unset($arr2[count($arr2) - 1]);
		var_dump($arr2);
	?>

	<hr><hr>
	<h1>Indexed Arrays</h1>

	<p>Till now, we were learning indexed array</p>

	<hr><hr>
	<h1>Associative Arrays</h1>
	<p>key/value pair</p>
	<?php 
		$arr5 = array("first_name" => "Mir Md", "last_name" => "Kawsur", "email" => "kawsur@aiub.edu", "m_arr" => array(12, 25));
		var_dump($arr5);
		echo "<br><br>";
		echo $arr5["first_name"];
		echo "<br><br>";
		echo $arr5["last_name"];
	?>

	<hr><hr>
	<h1>Multi-dimensional Arrays</h1>
	<?php 
		$arr6 = array(
			array(1, 2, 3),
			array(4, 5),
			array("Six", "Seven")
		);
		var_dump($arr6);
		echo "<br><br>";

		echo $arr6[1][1];
	?>

</body>
</html>