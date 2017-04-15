<?php
header("Content-Type:text/json;charset=gb2312");
$mobile = $_GET["mobile"];
//$shoujihao = $_GET["shoujihao"];
$a = file_get_contents("http://chongzhi.jd.com/json/order/search_searchPhone.action?mobile=".$mobile);
print_r($a);
?>
