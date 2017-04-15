<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/9
 * Time: 9:56
 */
$a = file_get_contents("php://input");
print_r($a);

print_r($_POST);
echo "服务器接收到参数".$_POST["name"].$_POST["age"];
?>