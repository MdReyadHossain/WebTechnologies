<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if($_POST['multi'] == "") {
            echo "Please fill-up the form properly<br>";
            echo "<a href='index.php'>Go back</a>";
        }
        else {
            $x =  $_POST['multi'];
            echo "Input number: " . $_POST['multi'];
        }
        


    }
?>