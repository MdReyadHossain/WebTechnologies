<?php
    session_start();

    if(!isset($_SESSION['username'])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wbsite</title>
    </head>
    <body>
        <a href="Update.php">Edit Profile</a> | <a href="logout.php">Logout</a>

        <h1>Welcome to our Website</h1>

        <i>&copy;copyright 2022</i> 
    </body>
</html>