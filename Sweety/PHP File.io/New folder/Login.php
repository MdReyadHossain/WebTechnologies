<?php
    session_start();

    if(isset($_SESSION['id'])) {
        header("Location: Website.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form action="LoginAction.php" target="_self" method="POST">
            <fieldset>
                <br>
                <table>
                    <tr>
                        <td>
                            <label for="user">Username </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="username" id="user">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="password" id="pass">
                        </td>
                    </tr>
                </table>
                <br>
                <input type="submit" name="login" value="Login">
            </fieldset>
        </form>
        <br>
        <?php
            if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
            }
        ?>
    </body>
</html>