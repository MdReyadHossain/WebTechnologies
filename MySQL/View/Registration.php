<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <style>
            fieldset {
                width: 500px;
            }
            legend {
                font-weight: bold; 
                font-size: large;
            }
            .error {
                color: red;
            }
        </style>
    </head> 
    <body>
        <h2>Online Registration</h2>
        <form action="RegistrationAction.php" target="_self" method="post" novalidate>
            <fieldset>
                <legend>Basic Info</legend>
                <table>
                    <tr>
                        <td>
                            <label for="fname">First Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="firstname" id="fname" size="30"> <span class="error">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="lname">Last Name </label>
                        </td>
                        <td>:</td>
                        <td>
                            <input type="text" name="lastname" id="lname" size="30"> <span class="error">*</span>
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
                            <input type="email" name="email" id="email"> <span class="error">*</span>
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
                            <input type="text" name="username" id="user"> <span class="error">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pass">Password </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="password" id="pass"> <span class="error">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="conpass">Confirm Password </label> 
                        </td>
                        <td>:</td>
                        <td>
                            <input type="password" name="conpassword" id="conpass"> <span class="error">*</span>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br>
            <input type='submit' name='submit' value='Submit'>
        </form>
    </body>
</html>