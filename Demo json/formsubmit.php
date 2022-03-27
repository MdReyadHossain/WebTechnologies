<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form submit</title>
    </head>
    <body>
        <h1>Online Registration</h1>
        <?php 
            $firstname = $lastname = $gender = $dob = $religion = $preaddress = $paraddress = $phone = $email = $website = $username = $password = $conpassword = "";

            $dobErr = $emailErr = $usernameErr = $passwordErr = $religionErr = "";

            $isValid = true;
            $isChecked = $isEmpty = false;

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $isChecked = true;
                function test($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $firstname = test($_POST["firstname"]);
                $lastname = test($_POST["lastname"]);
                $dob = test($_POST["dob"]);
                $religion = test($_POST["religion"]);
                $preaddress = test($_POST["preaddress"]);
                $paraddress = test($_POST["paraddress"]);
                $phone = test($_POST["phone"]);
                $email = test($_POST["email"]);
                $website = test($_POST["website"]);
                $username = test($_POST["username"]);
                $password = test($_POST["password"]);
                $conpassword = test($_POST["conpassword"]);
                $year = date("Y") - intval($dob);

                if(empty($firstname)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(empty($lastname)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(empty($_POST["gender"])) {
                    $isValid = false;
                    $isEmpty = true;
                }
                else
                    $gender = $_POST["gender"];

                if(empty($dob)) {
                    $isValid = false;
                }

                else if ($year < 18) {
                    $isValid = false;
                    $dobErr = "<br>*You are not old enough, Must be 18 or older";
                }
                if($religion == "none") {
                    $isValid = false;
                    $religionErr = "<br>*Please select your religion";
                }

                if(empty($preaddress)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(empty($email)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isValid = false;
                    $emailErr = "<br>*Invalid email format";
                }

                if(empty($username)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(strlen($username) > 5) {
                    $isValid = false;
                    $usernameErr = "<br>*Username up to 5 characters long";
                }

                if(empty($password)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if(strlen($password) < 8) {
                    $isValid = false;
                    $passwordErr = "<br>*Password must be at least 8 characters long";
                }

                if(empty($conpassword)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if($password != $conpassword) {
                    $isValid = false;
                    $passwordErr = "<br>*Password not matched";
                }

                
                if($isValid and $isChecked){
                    echo "<h2>Registration Successful</h2>";
                    echo "<a href='form.html'> Submit another for registration </a>";

                    // data insertion
                    define("file", "data.json");
                    $handle = fopen(file, "r");
                    $json = NULL;

                    if(filesize(file) > 0) {
                        $fr = fread($handle, filesize(file));
                        $json = json_decode($fr);
                        fclose($handle);
                    }
                    
                    $handle = fopen(file, "w");
                    if($json == NULL){
                        $data = array(array("fname" => $firstname, 
                                            "lname" => $lastname,
                                            "gender" => $gender,
                                            "dob" => $dob,
                                            "religion" => $religion,
                                            "preaddress" => $preaddress,
                                            "paraddress" => $paraddress,
                                            "phone" => $phone,
                                            "email" => $email,
                                            "website" => $website,
                                            "username" => $username,
                                            "password" => $password));
                        $data = json_encode($data);
                    }
                    else {
                        $json[] = array("fname" => $firstname, 
                                        "lname" => $lastname,
                                        "gender" => $gender,
                                        "dob" => $dob,
                                        "religion" => $religion,
                                        "preaddress" => $preaddress,
                                        "paraddress" => $paraddress,
                                        "phone" => $phone,
                                        "email" => $email,
                                        "website" => $website,
                                        "username" => $username,
                                        "password" => $password);
                        $data = json_encode($json);
                    }
                    fwrite($handle, $data);
                    fclose($handle);
                }
    
                else if ($isEmpty) {
                    echo "<br>Some required input missing<br>";
                    echo "<br>Please resubmit the form properly <a href='form.html'> Click here </a>";
                }
    
                else {
                    echo "<b>Page NOT submitted!</b><br>";
                    echo $dobErr;
                    echo $emailErr;
                    echo $religionErr;
                    echo $usernameErr;
                    echo $passwordErr . "<br> <br>";
    
                    echo "Please resubmit the form properly <a href='form.html'> Click here </a>";
                }
            }
        ?>
        
    </body>
</html>
