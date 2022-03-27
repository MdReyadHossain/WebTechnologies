<!DOCTYPE html>
<html>
    <head>
        <title>Form submit</title>
    </head>
    <body>
        <h1>Online Registration</h1>
        <?php 
            $firstname = $lastname = $gender = $dob = $religion = $preaddress = $paraddress = $phone = $email = $website = $username = $password = $conpassword = "";
            
            $firstnameErr = $lastnameErr = $genderErr = $dobErr = $religionErr = $preaddressErr = $emailErr = $usernameErr = $passwordErr = $conpasswordErr = "";

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
                    $firstnameErr = " should not be empty!";
                }

                if(empty($lastname)) {
                    $isValid = false;
                    $lastnameErr = " should not be empty!";
                }

                if(empty($_POST["gender"])) {
                    $genderErr = " should not be empty!";
                }
                else{
                    $gender = $_POST["gender"];
                }
                if(empty($dob)) {
                    $isValid = false;
                    $dobErr = " input your date of birth!";
                }
                
                else if ($year < 18) {
                    $isValid = false;
                    $dobErr = " not old enough";
                }

                if($religion == "none") {
                    $isValid = false;
                    $religionErr = " please select your religion";
                }

                if(empty($preaddress)) {
                    $isValid = false;
                    $preaddressErr = " should not be empty!";
                }
                if(empty($email)) {
                    $isValid = false;
                    $emailErr = " should not be empty!";
                }
                else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isValid = false;
                    $emailErr = " invalid email format";
                }
                if(empty($username)) {
                    $isValid = false;
                    $usernameErr = " should not be empty!";
                }

                if(strlen($username) > 5) {
                    $isValid = false;
                    $usernameErr = " up to 5 characters long";
                }

                if(empty($password)) {
                    $isValid = false;
                    $passwordErr = " should not be empty!";
                }
                else if(strlen($password) < 8) {
                    $isValid = false;
                    $passwordErr = " must be at least 8 characters long";
                }

                if(empty($conpassword)) {
                    $isValid = false;
                    $conpasswordErr = " should not be empty!";
                }

                if($password != $conpassword) {
                    $isValid = false;
                    $conpasswordErr = " password not matched!";
                }
            }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" target="_self" method="post" novalidate>
            <fieldset>
                <legend>Basic Info</legend>
                <table>
                    <tr>
                        <td>
                            <label for="fname">First Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="firstname" id="fname" size="30"> <span><?php echo $firstnameErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lname">Last Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="lastname" id="lname" size="30"><span><?php echo $lastnameErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="gen">Gender </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="radio" name="gender" value="male" id="male"> <label for="male">Male</label> 
                            <input type="radio" name="gender" value="female" id="female"> <label for="female">Female</label>
                            <input type="radio" name="gender" value="other" id="other"> <label for="other">Others</label>
                            <span><?php echo $genderErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="dob">Date of Birth </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="date" name="dob" id="dob"> <span><?php echo $dobErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="rel">Religion </label>
                        </td>
                        <td>:</td>
                        <td>
                            <select name="religion" id="rel"> 
                                <option value="none">None</option>
                                <option value="islam">Islam</option>
                                <option value="hindu">Hindu</option>
                                <option value="christian">Christian</option>
                                <option value="other">Other</option>
                            </select> <span><?php echo $religionErr; ?></span>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br> 
            <fieldset>
                <legend>Contact Info</legend>
                <table>
                    <tr>
                        <td>
                            <label for="preadd">Present Address </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <textarea name="preaddress" id="preadd" placeholder="Enter address.."></textarea> <span><?php echo $preaddressErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="paradd">Permanent Address </label>
                        </td>
                        <td>:</td>
                        <td>
                            <textarea name="paraddress" id="paradd" placeholder="Enter address.."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Phone No. </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="tel" name="phone" id="phone">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="email" name="email" id="email"> <span><?php echo $emailErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="web">Website </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="url" name="website" id="web">
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <fieldset>
                <legend>Credentials</legend>
                <table>
                    <tr>
                        <td>
                            <label for="user">Username </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="username" id="user"> <span><?php echo $usernameErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="password" id="pass"> <span><?php echo $passwordErr; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="conpass">Confirm Password </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="conpassword" id="conpass"><span><?php echo $conpasswordErr; ?></span>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br>

            <?php    
                if($isValid and $isChecked){
                    echo "<h2>Registration Successful</h2>";
                    echo "<a href='Registration.php'> Submit another for registration </a> <br>";
                    echo "<a href='login.php'> Login </a>";
                    $root = "/Windows Application/Installed(64x)/xampp/htdocs/Webtech/Sweety";
                    define("file", $root . "/PHP File.io/user.json");
                    $handle = fopen(file, "r");
                    $arr = NULL;

                    if(filesize(file) > 0) {
                        $fr = fread($handle, filesize(file));
                        $arr = json_decode($fr);
                        fclose($handle);
                    }
                    
                    $handle = fopen(file, "w");
                    if($arr == NULL){
                        $id = 1;
                        $data = array(array("id" => $id,
                                            "fname" => $firstname, 
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
                        $id = $arr[count($arr)-1]->id;
                        $arr[] = array("id" => $id + 1,
                                        "fname" => $firstname, 
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
                        $data = json_encode($arr);
                    }
                    fwrite($handle, $data);
                    fclose($handle);
                }
                else {
                    echo "<input type='submit' name='submit' value='Submit'>";
                }
            ?>
        </form>
    </body>
</html>