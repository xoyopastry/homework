<?php
$con=mysqli_connect('localhost','root','','mydb');
mysqli_query($con,'SET NAMES UTF8');//支持中文
$sql="SELECT * FROM survey1";
$arr=array();
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
    array_push($arr,$row);
}
$json=json_encode($arr);
print_r($json);
?>