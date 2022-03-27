<?php
    session_start();

    if(!isset($_SESSION['id'])) {
        header("Location: Login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Wbsite</title>
    </head>
    <body>
        <a href="Update.php">Profile</a> - <a href="logout.php">Logout</a>

        <h2>Welcome, <?php echo $_SESSION['fname'] . " " . $_SESSION['lname'] ?></h2>

        <i>Copyright - &copy<?php echo date("Y"); ?></i> 
    </body>
</html>