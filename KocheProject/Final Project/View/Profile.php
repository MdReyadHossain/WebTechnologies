<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: logout.php');
    }
    if(!isset($_SESSION['id'])) {
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php include('../View/Profile-header.php'); ?>

    <fieldset style="width: 40%;">
        <legend><h3>Profile</h1></legend>
        <table>
            <tbody> 
                <tr>
                    <th align='left'>
                        <label for="name">Name:</label>
                    </th>
                    <td>
                        <?php echo $_SESSION['fname']. " " . $_SESSION['lname']; ?>
                    </td>
                </tr>
                <tr>
                    <th align='left'>
                        <label for="gender">Gender:</label>
                    </th>
                    <td>
                        <?php echo $_SESSION['gender']; ?>
                    </td>
                </tr>
                <tr>
                     <th align='left'>
                        <label for="name">Email:</label>
                    </th>
                    <td>
                        <?php echo $_SESSION['email']; ?>
                    </td>
                </tr>
                <tr>
                    <th align='left'>
                        <label for="name">Phone:</label>
                    </th>
                    <td>
                        <?php echo $_SESSION['phone']; ?>
                    </td>
                </tr>
                <tr>
                    <th align='left'>
                        <label for="name">Address:</label>
                    </th>
                    <td>
                        <?php echo $_SESSION['road']. ", " . $_SESSION['country']; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="update.php"><button>Update Profile</button></a>
    </fieldset>
    <br>
    
     <?php include'footer.php'; ?>
</body>
</html>