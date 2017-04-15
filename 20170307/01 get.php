<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GET</title>
</head>
<body>
<?php
    print_r($_GET);
    $type = $_GET['type'];
    $name = $_GET['name'];
    if ($type == "cat"){
        echo "缅甸布娃娃";
    }
    if($name == "dog")
    {
        echo "๑乛◡乛๑";
    }
?>
</body>
</html>