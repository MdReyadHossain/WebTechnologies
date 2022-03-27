<?php
    echo "<h2>Update Profile</h2>";
    session_start();

    $firstname = $lastname = $gender = $dob = $religion = $preaddress = $paraddress = $phone = $email = $website = "";

    $dobErr = $emailErr = $usernameErr = $passwordErr = $religionErr = "";

    $isValid = true;
    $isChecked = $isEmpty = false;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
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
    }
    if($isValid and $isChecked){
        echo "Profile Update Successful<br>";
        echo "<a href='Website.php'>Home</a>";

        define("file", "user.json");
        $handle = fopen(file, "r");
        $fr = fread($handle, filesize(file));
        $json = json_decode($fr);
        fclose($handle);
        
        $handle = fopen(file, "w");
        for($i = 0; $i < count($json); $i++) {
            if($_SESSION['sl'] == $json[$i]->sl){
                $json[$i]->fname = $firstname;
                $json[$i]->lname = $lastname;
                $json[$i]->gender = $gender;
                $json[$i]->dob = $dob;
                $json[$i]->religion = $religion;
                $json[$i]->preaddress = $preaddress;
                $json[$i]->paraddress = $paraddress;
                $json[$i]->phone = $phone;
                $json[$i]->email = $email;
                $json[$i]->website = $website;

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
                break;
            }
        }
        $data = json_encode($json);
        fwrite($handle, $data);
        fclose($handle);
    }

    else if($isEmpty) {
        echo "*Some requires input missing";
    }

    else {
        echo "<b>Page NOT updated!</b><br>";
        echo $dobErr;
        echo $emailErr;
        echo $religionErr;
        echo $usernameErr;
        echo $passwordErr . "<br> <br>";

        echo "<a href='Update.php'> Go Back </a>";
    }
?>