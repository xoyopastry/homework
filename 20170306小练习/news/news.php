<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
$id = $_GET['id'];

$con = mysqli_connect("localhost","root","","mydb");
if (!$con){
    die('Could not connect: ' . mysqli_error($con));
}
//更改数据操作字符集
mysqli_query($con,"SET NAMES UTF8");
//执行SQL语句，把检索结果放到$result变量中
$result = mysqli_query("SELECT * FROM xinwen WHERE id=" .$id);

$row = mysqli_fetch_array($result);
echo "<h1>";
echo $row['title'];
echo "</h1>";
echo $row['content'];
mysqli_close($con);
?>
</body>
</html>
/**
* Created by PhpStorm.
* User: Administrator
* Date: 2017/3/6
* Time: 18:23
*/