<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    define("file", "user.json");
    $handle = fopen(file, "r");
    $fr = fread($handle, filesize(file));
    $arr = json_decode($fr);
    fclose($handle);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <?php
        echo "<h2>Update Profile</h2>";

        $firstname = $lastname = $gender = $dob = $religion = $preaddress = $paraddress = $phone = $email = $website = $username = $password = $conpassword = "";
                
        $firstnameErr = $lastnameErr = $genderErr = $dobErr = $religionErr = $preaddressErr = $emailErr = $usernameErr = $passwordErr = $conpasswordErr = "";

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
                $firstnameErr = " *should not be empty!";
            }

            if(empty($lastname)) {
                $isValid = false;
                $lastnameErr = " *should not be empty!";
            }

            if(empty($_POST["gender"])) {
                $isValid = false;
                $genderErr = " *should not be empty!";
            }
            else
                $gender = $_POST["gender"];

            if(empty($dob)) {
                $isValid = false;
                $dobErr = " *input your date of birth!";
            }

            else if ($year < 18) {
                $isValid = false;
                $dobErr = " *You are not old enough, Must be 18 or older";
            }
            if($religion == "none") {
                $isValid = false;
                $religionErr = " *Please select your religion";
            }

            if(empty($preaddress)) {
                $isValid = false;
                $preaddressErr = " *should not be empty!";
            }

            if(empty($email)) {
                $isValid = false;
                $emailErr = " *should not be empty!";
            }

            else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $isValid = false;
                $emailErr = " *Invalid email format";
            }
        }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" target="_self" method="post" novalidate>
        <table>
            <tr>
                <td>
                    <label for="fname">First Name </label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="firstname" id="fname" value="<?php echo $_SESSION['fname']; ?>"> <span><?php echo $firstnameErr; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lname">Last Name </label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="lastname" id="lname" value="<?php echo $_SESSION['lname']; ?>"> <span><?php echo $lastnameErr; ?>
                </td>
            </tr>
            <tr> 
                <td> 
                    <label for="gen">Gender </label>
                </td>
                <td>:</td>
                <td>
                    <input <?php  if($_SESSION['gender'] == 'male') {echo 'checked="checked"';} ?> type="radio" name="gender" value="male" id="male"> <label for="male">Male</label> 
                    <input <?php if($_SESSION['gender'] == 'female') {echo 'checked="checked"';} ?> type="radio" name="gender" value="female" id="female"> <label for="female">Female</label>
                    <input <?php if($_SESSION['gender'] == 'other') {echo 'checked="checked"';} ?> type="radio" name="gender" value="other" id="other"> <label for="other">Others</label> <span><?php echo $genderErr; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dob">Date of Birth </label>
                </td>
                <td>:</td>
                <td>
                    <input type="date" name="dob" id="dob" value="<?php echo $_SESSION['dob']; ?>"> <span><?php echo $dobErr; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rel">Religion </label>
                </td>
                <td>:</td>
                <td>
                    <select name="religion" id="rel"> 
                        <option <?php if($_SESSION['religion'] == 'islam'){echo 'selected';} ?> value="islam">Islam</option>
                        <option <?php if($_SESSION['religion'] == 'hindu'){echo 'selected';} ?> value="hindu">Hindu</option>
                        <option <?php if($_SESSION['religion'] == 'christian'){echo 'selected';} ?> value="christian">Christian</option>
                        <option <?php if($_SESSION['religion'] == 'other'){echo 'selected';} ?> value="other">Other</option> <span><?php echo $religionErr; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="preadd">Present Address </label> 
                </td>
                <td>:</td>
                <td>
                    <textarea name="preaddress" id="preadd"><?php echo $_SESSION['preaddress']; ?></textarea> <span><?php echo $preaddressErr; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="paradd">Permanent Address </label>
                </td>
                <td>:</td>
                <td>
                    <textarea name="paraddress" id="paradd"><?php echo $_SESSION['paraddress']; ?></textarea>
                </td> 
            </tr>
            <tr>
                <td>
                    <label for="phone">Phone No. </label>
                </td>
                <td>:</td>
                <td>
                    <input type="tel" name="phone" id="phone" value="<?php echo $_SESSION['phone']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email </label> 
                </td>
                <td>:</td>
                <td>
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>"> <span><?php echo $emailErr; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="web">Website </label>
                </td>
                <td>:</td>
                <td>
                    <input type="url" name="website" id="web" value="<?php echo $_SESSION['website']; ?>">
                </td>
            </tr>
        </table>
        <br>
        <input type='submit' name='submit' value='Done'>
    </form>

    <?php
        if($isValid and $isChecked){
            echo "<h3>Profile Update Successful</h3>";
            
            $handle = fopen(file, "w");
            for($i = 0; $i < count($arr); $i++) {
                if($_SESSION['id'] == $arr[$i]->id){
                    $arr[$i]->fname = $firstname;
                    $arr[$i]->lname = $lastname;
                    $arr[$i]->gender = $gender;
                    $arr[$i]->dob = $dob;
                    $arr[$i]->religion = $religion;
                    $arr[$i]->preaddress = $preaddress;
                    $arr[$i]->preaddress = $paraddress;
                    $arr[$i]->phone = $phone;
                    $arr[$i]->email = $email;
                    $arr[$i]->website = $website;
                    break;
                }
            }
            $data = json_encode($arr);
            fwrite($handle, $data);
            fclose($handle);
        }
    ?>
</body>
</html>