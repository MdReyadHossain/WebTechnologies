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
    define("text", "data.txt");

    echo "PHP File <br><br>";
    $handle = fopen(text, "w");
    $data = "Reyad\n";
    fwrite($handle, $data);

    $handle = fopen(text, "r");
    $len = filesize(text);
    $fr = fread($handle, $len);
    var_dump($fr);
    echo "<br>";

    $arr1 = explode("\n", $fr);
    array_splice($arr1, count($arr1) - 1);
    for ($i = 0; $i < count($arr1); $i++) {
        echo $arr1[$i];
        echo "<br>";
    }

    fclose($handle);
    ?>

    <?php
    define("data", "data.json");

    echo "<br><br>PHP JSON<br><br>";
    $name = "Reyad";
    $id = 43373;
    $data = array(array("Name" => $name, "ID" => $id));
    $data = json_encode($data);

    $file = fopen(data, "a");
    $jw = fwrite($file, $data);
    echo "JSON en-> ";
    var_dump($data);

    $file = fopen(data, "r");
    $jr = fread($file, filesize(data));
    echo "<br>";

    echo "JSON read-> ";
    var_dump($jr);
    echo "<br>";

    $obj = json_decode($jr);

    echo "JSON de-> ";
    var_dump($obj);

    echo "<br><br>";
    echo "<br>Name : " . $obj[0]->Name . "<br>ID : " . $obj[0]->ID;

    fclose($file);
    ?>

</body>

</html>