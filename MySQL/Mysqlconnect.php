<?php 
    $server = "localhost";
    $username = "Blaze";
    $password = "password";

    $conn = new mysqli($server, $username, $password);

    // var_dump($conn);

    if($conn->connect_error) 
        die("Connection Failed" . $conn->connect_error);

    echo "Connection Successful!";  

    $conn->close();
?>