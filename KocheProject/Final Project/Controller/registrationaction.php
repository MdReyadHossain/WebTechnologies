<?php

	// Variable
	$firstnameErrMsg = "";
	$lastnameErrMsg= "";
	$GendernameErrMsg= "";  
	$emailErrMsg= "";
	$phoneErrMsg= "";
	$roadErrMsg="";
	$userErrMsg="";
	$passwordErrMsg="";
	$confirm_passwordErrMsg="";


	$isvalid=true;

	// First Name Start
	if ($_SERVER['REQUEST_METHOD'] === "POST"){
		$flag=false;
		if(empty($_POST['FirstName'])) {
			//echo "First Name Empty";
			$firstnameErrMsg = "First Name Empty";
			$flag=true;
			//echo "<br>";
		}
		else {
			if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['FirstName'])) {
			echo "Only letters and spaces allowed.";
			$firstnameErrMsg = "Only letters and spaces allowed";
			echo "<br>";
			}
		}	
	// First Name End

	// Last Name Start		
		if(empty($_POST['LastName'])) {
			//echo "Last Name Empty";
			$lastnameErrMsg = "Last Name Empty";
			$flag=true;
			//echo "<br>";
		}
		else {
				if (!preg_match("/^[a-zA-Z-' ]*$/",$_POST['LastName'])) {
				echo "Only letters and spaces allowed.";
				$lastnameErrMsg = "Only letters and spaces allowed";
				echo "<br>";
				}
			}	
	// Last Name End		

	// Gender
		if(empty($_POST['Gender'])) {
			//echo "Gender not Selected";
			$GendernameErrMsg = "Gender not Selected";
			$flag=true;
			//echo "<br>";
		}

	// Email Start 
		if(empty($_POST['email'])) {
			//echo "Email is Empty";
			$emailErrMsg = "Email is Empty";
			$flag=true;
			//echo "<br>";
		}
		else {
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				echo "Please correct email";
				$emailErrMsg = "Please correct email";
				echo "<br>";
				}
			}	
	// Email End

	// Number Start
			if(empty($_POST['number'])) {
			//echo "MobileNo is Empty";
			$phoneErrMsg= "Mobileno is Empty";
			$flag=true;
			//echo "<br>";
		}
	// Road Start		
		if(empty($_POST['road'])) {
			//echo "Street/House/Road/ is Empty";
			$roadErrMsg= "Street/House/Road/ is Empty";
			$flag=true;
			//echo "<br>";
		}
	// Country Start		
		if(empty($_POST['Country'])) {
			echo "Country Name Empty";
			$flag=true;
			echo "<br>";
		}
	// User name		
		if(empty($_POST['username'])) {
			//echo "User Name Empty";
			$userErrMsg="User Name Empty";
			$flag=true;
			echo "<br>";
		}
	// Password		
		if(empty($_POST['password'])) {
			//echo "Password Empty";
			$passwordErrMsg="Password Empty";
			$flag=true;
			echo "<br>";
		}

		
	// Confirm Password		
		if(($_POST['password'])!=($_POST['confirm_password'])) {
			//echo "Confirm Password Empty";
			$isvalid=false;
			$confirm_passwordErrMsg="Confirm Password Error";
			$flag=true;
			echo "<br>";
		}
	}

// condition All true then			
	if(!$flag)
	{
		define("file","data.json"); // file extension
		$handle = fopen(file, "r"); // file open
		$json = NULL; 

		if(filesize(file) > 0) // file size
	    {
			$fr = fread($handle, filesize(file)); // file read
			$json = json_decode($fr); // $fr file decode 
			fclose($handle);// $ handel close 
		}

		$handle = fopen(file, "w");// file write
		if($json == NULL){
			$id = 1;
			$data = @array(array("id" => $id,
								"First_name" => $_POST['FirstName'],
	                            "Last_name" => $_POST['LastName'],
	                            "Gender" => $_POST['Gender'],
	                            "Email" => $_POST['email'],
	                            "Phone_Number" =>$_POST['number'],
	                            "Road" => $_POST['road'],
	                            "Country" => $_POST['Country'],
								"User_name"=> $_POST['username'],
								"Password"=> $_POST['password'],
								"Confirm Password"=> $_POST['confirm_password'],
							));
			$data = json_encode($data); // json_encode unlock
		}
		
		else {
	        $id = $json[count($json)-1]->id;
	        $json[] = @array("id" => $id + 1,
	                    "First_name" => $_POST['FirstName'],
	                    "Last_name" => $_POST['LastName'],
	                    "Gender" => $_POST['Gender'],
	                    "Email" => $_POST['email'],
	                    "Phone_Number" =>$_POST['number'],
	                    "Road" => $_POST['road'],
	                    "Country" => $_POST['Country'],
						"User_name"=> $_POST['username'],
						"Password"=> $_POST['password'],
						"Confirm Password"=> $_POST['confirm_password'],
					);
	                    $data = json_encode($json); // json_encode unlock
	    }
	    fwrite($handle, $data); // file write 
	    fclose($handle);// file close
	    setcookie('msg', '<b>✅Registration successful!</b><br>', time() + 1, '/');
	   	header("Location: ../View/login.php");
	}

	else {
		setcookie('msg', '<b>❌Registration NOT successful!</b><br>', time() + 1, '/');
		header('location: ../View/registration.php');
	}
?>