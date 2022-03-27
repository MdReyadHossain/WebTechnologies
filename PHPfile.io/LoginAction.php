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

        $username = test($_POST["user"]);
        $password = test($_POST["pass"]);

        if(empty($username))
            $isEmpty = true;
            
        if(empty($password))
            $isEmpty = true;

        if(!$isEmpty) {    
            define("file", "user.json");
            $handle = fopen(file, "r");
            $json = NULL;
        
            if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }

            if($json == NULL) {
                $_SESSION['error'] = "Please register first!<br><a href='registration.html'>Go for Registration</a>";
                header("Location: login.php");
            }

            else {
                for($i = 0; $i < count($json); $i++) {
                    if($json[$i]->username == $username and $json[$i]->password == $password) {
                        $_SESSION['username'] = $username;
                        $_SESSION['sl'] = $json[$i]->sl;
                        $_SESSION['fname'] = $json[$i]->fname;
                        $_SESSION['lname'] = $json[$i]->lname;
                        $_SESSION['gender'] = $json[$i]->gender;
                        $_SESSION['dob'] = $json[$i]->dob;
                        $_SESSION['religion'] = $json[$i]->religion;
                        $_SESSION['preaddress'] = $json[$i]->preaddress;
                        $_SESSION['paraddress'] = $json[$i]->paraddress;
                        $_SESSION['phone'] = $json[$i]->phone;
                        $_SESSION['email'] = $json[$i]->email;
                        $_SESSION['website'] = $json[$i]->website;
                        header("Location: Website.php");
                        $isValid = true;
                        break;
                    }
                }
                if(!$isValid) {
                    $_SESSION['error'] = "Username or Password incorrect";
                    header("Location: login.php");
                }
            }
        }
        else {
            $_SESSION['error'] = "Please input  Username and Password";
            header("Location: login.php");
        } 
    }
?>