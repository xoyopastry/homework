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
print_r($_GET);
$a1 = $_GET['xingming'];
$a2 = $_GET['shenfen'];
$a3 = $_GET['xingbie'];

$con = mysqli_connect('localhost','root','','mydb');
mysqli_query($con,"SET NAMES UTF8");
$result = mysqli_query($con,"DELETE FROM survey1 WHERE xingming = '$a1'");
if ($result == 1){
    echo "๑乛◡乛๑数据成功删除";
}else{
    echo "删除失败(╥╯^╰╥)请联系管理员";
}
mysqli_close($con);
?>
</body>
</html>