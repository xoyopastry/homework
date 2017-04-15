<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//连接数据库，PHP和MySQL是黄金搭档，
//只需要一行命令，
//数据库的用户名root，密码为空
//$con就是一个变量，表示一次连接
$con = mysql_connect("localhost","root","123456");
if (!$con)
{
    die('Could not connect: ' . mysql_error());
}
//选择连接哪个数据库
mysql_select_db("mydb", $con);
//更改数据操作字符集
mysql_query("SET NAMES UTF8");
//执行SQL语句，把检索结果放到$result变量中
$result = mysql_query("SELECT * FROM tongxue");
//循环读取
while($row = mysql_fetch_array($result)){
    echo "<a href='xxx.php?id={$row['id']}'>";

    echo $row['xingming'];
    echo $row['qqhao'];
    echo $row['shoujihao'];
    echo $row['youxiang'];
    echo "<br />";
}
mysql_close($con);
?>
</body>
</html>
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/6
 * Time: 16:35
 */
