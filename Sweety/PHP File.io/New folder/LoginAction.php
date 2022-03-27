<?php
    session_start();

    $username = $password = "";
    $isEmpty = $isValid = false;

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        if(empty($username))
            $isEmpty = true;
            
        if(empty($password))
            $isEmpty = true;

        if(!$isEmpty) {    
            define("file", "user.json");
            $handle = fopen(file, "r");
            $arr = NULL;
        
            if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $arr = json_decode($fr);
                fclose($handle);
            }

            if($arr == NULL) {
                $_SESSION['error'] = "Please register first!<br><a href='Registration.php'>Go for Registration</a>";
                header("Location: Login.php");
            }

            else {
                for($i = 0; $i < count($arr); $i++) {
                    if($arr[$i]->username == $username and $arr[$i]->password == $password) {
                        $isValid = true;
                        $_SESSION['id'] = $arr[$i]->id;
                        $_SESSION['fname'] = $arr[$i]->fname;
                        $_SESSION['lname'] = $arr[$i]->lname;
                        $_SESSION['gender'] = $arr[$i]->gender;
                        $_SESSION['dob'] = $arr[$i]->dob;
                        $_SESSION['religion'] = $arr[$i]->religion;
                        $_SESSION['preaddress'] = $arr[$i]->preaddress;
                        $_SESSION['paraddress'] = $arr[$i]->paraddress;
                        $_SESSION['phone'] = $arr[$i]->phone;
                        $_SESSION['email'] = $arr[$i]->email;
                        $_SESSION['website'] = $arr[$i]->website;
                        $_SESSION['username'] = $arr[$i]->username;
                        header("Location: Website.php");
                        break;
                    }
                }
                if(!$isValid) {
                    $_SESSION['error'] = "Username or Password incorrect";
                    header("Location: Login.php");
                }
            }
        }
        else {
            $_SESSION['error'] = "Please input Username and Password";
            header("Location: Login.php");
        } 
    }
?>