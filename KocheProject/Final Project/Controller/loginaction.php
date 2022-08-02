<?php include('../View/header.html'); ?>
<?php

    session_start();
    $username = $password = "";
    $isEmpty = $isValid = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        function test($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $username = test($_POST["username"]);
        $password = test($_POST["password"]);
        $remember = test($_POST["remember"]);

        if(empty($username))
            $isEmpty = true;
            
        if(empty($password))
            $isEmpty = true;

        if(!$isEmpty) {  
         if($remember == "") {
                setcookie('rem', 'remember', time() + 5, '/');
             }
             else {
                    setcookie('rem', 'remember', 0, '/');
             }   
            }

        if(!$isEmpty) {    
            define("file", "../Model/data.json");
            $handle = fopen(file, "r");
            $json = NULL;
        
            if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }

            if($json == NULL) {
                $_SESSION['error'] = "*Please register first!<br><br>";
                $error = $_SESSION['error'];
                header("Location: login.php");
                setcookie('error', $error, time() + 1, "/");
            }
            for($i = 0; $i < count($json); $i++) {
                if($json[$i]->User_name == $username and $json[$i]->Password == $password) {
                    $_SESSION['id'] = $json[$i]->id;
                    $_SESSION['fname'] = $json[$i]->First_name;
                    $_SESSION['lname'] = $json[$i]->Last_name;
                    $_SESSION['gender'] = $json[$i]->Gender;
                    $_SESSION['email'] = $json[$i]->Email;
                    $_SESSION['phone'] = $json[$i]->Phone_Number;   
                    $_SESSION['road'] = $json[$i]->Road;   
                    $_SESSION['country'] = $json[$i]->Country;
                    
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    header("Location: ../View/dashboard.php");
                    $isValid = true;
                }
            }
            
            if(!$isValid) {
                $_SESSION['error'] = "*Username or Password incorrect<br><br>";
                $error = $_SESSION['error'];
                header("Location: ../View/login.php");
                setcookie('error', $error, time() + 1, "/");
            }
        }
        else {
            $_SESSION['error'] = "*Please input  Username and Password<br><br>";
            $error = $_SESSION['error'];
            header("Location: ../View/login.php");
            setcookie('error', $error, time() + 1, "/");
        }
    }
?>