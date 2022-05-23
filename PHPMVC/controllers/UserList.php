<?php 
	
	require '../model/User.php';

	if (isset($_GET['firstname'])) {
		$searchKey = $_GET['firstname'];
		$result = get($searchKey);	
	}
	else {
		$result = getAll();
	}

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
	        echo $row["id"] . " " . $row["firstname"] . " " . $row["lastname"];
	        echo "<br>";
	    }
	}
	else {
		echo "No record(s) found";
	}
?>