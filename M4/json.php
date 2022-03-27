<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Json</title>
</head>
<body>
    <?php
        define("FILENAME", "data.json");
        $handle = fopen(FILENAME, "r");

        /*Read the content from the file*/
        $fr = fread($handle, filesize(FILENAME));
        var_dump($fr);
        echo "<br><br>";

        /*Decode the string content to json*/
        $json = json_decode($fr);
        var_dump($json);
        echo "<br><br>";

        fclose($handle);

        $handle = fopen(FILENAME, "a");

        $name = "Md. Reyad Hossain";
        $age = 21;

        if ($json === NULL) {
            $data = array(array("name" => $name, "age" => $age));
            $data = json_encode($data);
            fwrite($handle, $data);
            echo "Hello";
        }
        else {
            $json = json_encode($json);
            echo "<br>";
            var_dump($json);
            $data = array(array("name" => $name, "age" => $age));
        }

        fclose($handle);
    ?>
</body>
</html>