<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form submit</title>
    </head>
    <body>
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
                    $dobErr = "*You are not old enough, Must be 18 or older";
                }
                if($religion == "none") {
                    $isValid = false;
                    $religionErr = "*Please select your religion";
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
                    $emailErr = "*Invalid email format";
                }

                if(empty($username)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if(strlen($username) > 5) {
                    $isValid = false;
                    $usernameErr = "*Username up to 5 characters long";
                }

                if(empty($password)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                else if(strlen($password) < 8) {
                    $isValid = false;
                    $passwordErr = "*Password must be at least 8 characters long";
                }

                if(empty($conpassword)) {
                    $isValid = false;
                    $isEmpty = true;
                }

                if($password != $conpassword) {
                    $isValid = false;
                    $passwordErr = "*Password not matched";
                }
            }
        ?>
        
        <?php 
            echo "<h1>Online Registration</h1>";
            if($isValid and $isChecked){
                echo "<h2>Registration Successful</h2>";
                echo "<a href='registration.html'> Submit another for registration </a>";
            }

            else if ($isEmpty) {
                echo "<br>Some required input missing<br>";
                echo "<br>Please resubmit the form properly <a href='registration.html'> Click here </a>";
            }

            else {
                echo "<br>" . $dobErr;
                echo "<br>" . $emailErr;
                echo "<br>" . $religionErr;
                echo "<br>" . $usernameErr;
                echo "<br>" . $passwordErr . "<br> <br>";

                echo "Please resubmit the form properly <a href='registration.html'> Click here </a>";
            }
        ?>
        
    </body>
</html>
