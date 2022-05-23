<?php
    session_start();

    if(isset($_SESSION['username'])) {
        header("Location: Website.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin</title>
    </head>
    <body>
        <h2>Sign in</h2>
        
        <form action="LoginAction.php" target="_self" method="POST">
            <br>
                <table>
                    <tr>
                        <td>
                            <label for="user">Username </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="user" id="user">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="pass" id="pass">
                        </td>
                    </tr>
                </table>
                <br>
                <input type="submit" name="login" value="Login">
        </form>
        <br>
        <?php
            if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
            }
        ?>
    </body>
</html>