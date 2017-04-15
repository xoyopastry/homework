<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$id = $_GET['id'];

//连接数据库，PHP和MySQL是黄金搭档，
//只需要一行命令，
//$con就是一个变量，表示一次连接
$con = mysqli_connect("localhost","root","","mydb");
if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
//更改数据操作字符集
mysqli_query($con,"SET NAMES UTF8");
//执行SQL语句，把检索结果放到$result变量中
$result = mysqli_query($con,"SELECT * FROM xinwen WHERE id=" . $id);

$row = mysqli_fetch_array($result);
    echo "<a href='news.php?id={$row['id']}'>";
    echo $row['title'];
    echo "</a>";
    echo $row['date'];
    echo "<br />";
mysqli_close($con);//关闭数据库
?>
</body>
</html>
/**
* Created by PhpStorm.
* User: Administrator
* Date: 2017/3/6
* Time: 17:37
*/