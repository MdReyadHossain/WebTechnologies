<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
    }

    define("file", "user.json");
    $handle = fopen(file, "r");
    $fr = fread($handle, filesize(file));
    $json = json_decode($fr);
    fclose($handle);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<body>
    <h2 for="pro">Update Profile</h2>
    <form action="UpdateAction.php" target="_self" method="post" novalidate>
        <table>
            <tr>
                <td>
                    <label for="fname">First Name </label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="firstname" id="fname" value="<?php echo $_SESSION['fname']; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lname">Last Name </label>
                </td>
                <td>:</td>
                <td>
                    <input type="text" name="lastname" id="lname" value="<?php echo $_SESSION['lname']; ?>">
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
                    <input <?php if($_SESSION['gender'] == 'other') {echo 'checked="checked"';} ?> type="radio" name="gender" value="other" id="other"> <label for="other">Others</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dob">Date of Birth </label>
                </td>
                <td>:</td>
                <td>
                    <input type="date" name="dob" id="dob" value="<?php echo $_SESSION['dob']; ?>">
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
                        <option <?php if($_SESSION['religion'] == 'other'){echo 'selected';} ?> value="other">Other</option>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="preadd">Present Address </label> 
                </td>
                <td>:</td>
                <td>
                    <textarea name="preaddress" id="preadd"><?php echo $_SESSION['preaddress']; ?></textarea> 
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
                    <input type="email" name="email" id="email" value="<?php echo $_SESSION['email']; ?>"> 
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
</body>
</html>