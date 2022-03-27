<!DOCTYPE html>
<html>
<head>
	<title>PHP Validation Form</title>
	<style type="text/css">
		.red{
			color: red;
		}
	</style>
</head>
<body>

	<?php
	$nameErr = $emailErr = $genderErr = $degreeErr = $bloodErr = $dayErr = $monthErr = $yearErr = "";
	$name = $email = $gender = $degree = $blood = $day = $month = $year = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		# Name Verification
		if (empty($_POST["name"])) {
			$nameErr = "Name is required";
		}
		else{
			$name = $_POST["name"];

			if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
				$nameErr = "Only letters and white space allowed";
			}
			else if (str_word_count($_POST["name"])<2) {
				$nameErr = "Name must contain at least 2 word";
			}
		}	

		# Email Verification
		if (empty($_POST["email"])) {
				$emailErr = "Email is required";
			}	
		else{
			$email = $_POST["email"];

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}

		# Date of Birthday Varification
		# Day Validation

		if (empty($_POST["day"])) {
			$dayErr = "Day field is required";
		}
		else {
			$day = $_POST["day"];

			if ($day > 31 || $day <0) {
				$dayErr = "Invalid day of date of birth";
			}
		}

		# Month Validation
		if (empty($_POST["month"])) {
			$monthErr = "Month field is required";
		}
		else {
			$month = $_POST["month"];

			if ($month > 12 || $month <0) {
				$monthErr = "Invalid month of date of birth";
			}
		}

		# Year validation
		if (empty($_POST["year"])) {
			$yearErr = "Year field is required";
		}
		else {
			$year = $_POST["year"];

			if ($year > 1998 || $year <1953) {
				$yearErr = "Invalid year of date of birth";
			}
		}

		# Gender Verification
		if(empty($_POST["gender"])) {
			$genderErr = "Gender is required";
		}
		else{
			$gender = $_POST["gender"];
		}

		# Degree Verification
		if(empty($_POST["degree"])) {
			$degreeErr = "Degree is required";
		}
		else{
			$degree = $_POST["degree"];
		}

		#Blood Verification
		if (empty($_POST["blood"])) {
			$bloodErr = "Blood Group is required";
		}
		else{
			$blood = $_POST["blood"];
		}

	}



	?>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>

		<fieldset>
	    <legend>Name:</legend>
	    <input type="text" name="name" value="<?php echo $name;?>"><span class="red">*<?php echo $nameErr ?></span><br>
	    <hr>
	  	</fieldset>

	  	<fieldset>
	    <legend>Email:</legend>
	    <input type="email" name="email" value="<?php echo $email;?>"><span class="red">*<?php echo $emailErr ?></span><br>
	    <hr>
	  	</fieldset>

	  	<fieldset>
	    <legend>Date of Birth:</legend>
	    <table>
	    	<tr>
	    		<td align="center">dd</td>
	    		<td align="center">mm</td>
	    		<td align="center">yyyy</td>
	    	</tr>
	    	
	    	<tr>
	    		<td>
	    			<input type="number" id="day" name="day" value="<?php echo $day;?>"><span class="red">*<?php echo $dayErr ?></span><br>
	    		</td>
	    		
	    		<td>
	    			<input type="number" id="month" name="month" value="<?php echo $month;?>"><span class="red">*<?php echo $monthErr ?></span>
	    		</td>
	    		
	    		<td>
	    			<input type="number" id="year" name="year" value="<?php echo $year;?>"><span class="red">*<?php echo $yearErr ?></span>
	    		</td>
	    	</tr>
	    	
	    </table>
	    <hr>
	  	</fieldset>

	  	<fieldset>
	    <legend>Gender:</legend>
	    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked";?> value="male"> Male
	    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked";?> value="female"> Female
	    <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked";?> value="other"> Other <span class="red">*<?php echo $genderErr ?></span><br>
	    <hr>
	  	</fieldset>

	  	<fieldset>
	    <legend>Degree:</legend>

	    <input type="checkbox" name="degree[]" value="ssc"> SSC
	    <input type="checkbox" name="degree[]" value="hsc"> HSC
	    <input type="checkbox" name="degree[]" value="bsc"> BSc
	    <input type="checkbox" name="degree[]" value="msc"> MSc <span class="red">*<?php echo $degreeErr ?></span><br>
	    <hr>
	  	</fieldset>

	  	<fieldset>
	    <legend>Blood Group:</legend>
		    <select name="blood" id="blood">
		    	<option value="<?php echo $blood;?>"><span class="red"><?php echo $bloodErr ?></span></option>
		    	<option value="ab+">AB+</option>
		    	<option value="ab-">AB-</option>
		    	<option value="a+">A+</option>
		    	<option value="a-">A-</option>
		    	<option value="b+">B+</option>
		    	<option value="b-">B-</option>
		    	<option value="o+">O+</option>
		    	<option value="o-">O-</option>
		    </select><br>
		    <hr>
	  	</fieldset><br>

	  	<input type="submit" name="">
	</form>

	</form>

	<h2>Input Data</h2>
	<?php 
	#var_dump($degree);
	echo "<br>";
	echo "Name is        : " .$name."<br>";
	echo "Email is       : " .$email."<br>";
	echo "Day is         : " .$day. "<br>";
	echo "Month is       : " .$month. "<br>";
	echo "Year is        : " .$year. "<br>";	
	echo "Gender is      : " .$gender."<br>";	
	echo "Degree is      : " .implode(' , ', $degree)."<br>";
	echo "Blood Group is : " .$blood. "<br>";

	?>

</body>
</html>