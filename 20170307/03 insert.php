<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INSERT</title>
</head>
<body>
<?php
    $title = $_GET['title'];
    $content = $_GET['content'];
    $date = $_GET['date'];

    $con = mysqli_connect('localhost','root','','mydb');
    mysqli_query($con,"SET NAMES UTF8");
    $result = mysqli_query($con,"INSERT INTO xinwen(title,date,content) VALUES('{$title}','{$date}','{$content}')");
    if ($result == 1){
        echo "๑乛◡乛๑数据成功加入数据库";
    }else{
        echo "数据错误(╥╯^╰╥)请联系管理员";
    }
    mysqli_close($con);
?>
</body>
</html>