<?php
print_r($_GET);
$a1 = $_GET['xingming'];
$a2 = $_GET['shenfen'];
$a3 = $_GET['xingbie'];

$con = mysqli_connect('localhost','root','','mydb');
mysqli_query($con,"SET NAMES UTF8");
$sql1 = "UPDATE survey1 SET xingbie = '{$a3}' WHERE xingming = '{$a1}'";
$result = mysqli_query($con,$sql1);
if ($result == 1){
    echo "๑乛◡乛๑数据成功修改";
}else{
    echo "修改失败(╥╯^╰╥)";
}
mysqli_close($con);
?>
