<!DOCTYPE html>
<html>
    <head>
        <title>Submit Documents</title>
    </head>
    <body>
        <h1>Registration Action</h1>
        <?php 
            $isValid = true;
            $isChecked = false;
            $firstname = $lastname = $dob = $religion = $preaddress = $paraddress = $phone = $email = $website = $username = $password = $confirm = "";
            $gender = "NULL";

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                function test($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                
                $isChecked = true;
                $firstname = test($_POST["firstname"]);
                $lastname = test($_POST["lastname"]);
                $gender = test($_POST["gender"]);
                $dob = test($_POST["dob"]);
                $preaddress = test($_POST["preaddress"]);
                $email = test($_POST["email"]);
                $username = test($_POST["username"]);
                $password = test($_POST["password"]);
                $confirm = test($_POST["confirm"]);

                if(empty($firstname)) {
                    $isValid = false;
                }

                if(empty($lastname)) {
                    $isValid = false;
                }

                if($gender === "NULL") {
                    $isValid = false;
                }

                if(empty($dob)) {
                    $isValid = false;
                }

                if(empty($preaddress)) {
                    $isValid = false;
                }

                if(empty($email)) {
                    $isValid = false;
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isValid = false;
                }

                if(empty($username)) {
                    $isValid = false;
                }

                if(empty($password)) {
                    $isValid = false;
                }

                if(empty($confirm)) {
                    $isValid = false;
                }

                if($password != $confirm) {
                    $isValid = false;
                }
            }

            if($isValid and $isChecked){
                echo "<h2>Registration Successful</h2>";
            }
            else {
                echo "<br>Please fill-up the form properly <br> <a href='registration.html'> Go Back </a>";
            }
        ?>
    </body>
</html>
