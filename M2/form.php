<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php 
            var_dump($_POST);
            echo "<br>";
            for($i = 1; $i <= 10; $i++){
                echo $_POST["number"] . "*" . $i . "=" . $_POST["number"] * $i . "<br>";
            }
        ?>
        <br> <br>
        <a href="input.html">Go back</a>
    </body>
</html>