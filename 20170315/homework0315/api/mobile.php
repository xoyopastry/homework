<?php
/**
 * Created by PhpStorm.
 * User: sks
 * Date: 2017/3/15
 * Time: 14:21
 */
header("Content-Type:text/json; charset=gb2312");
$mobile = $_GET['mobile'];
print_r(file_get_contents("http://chongzhi.jd.com/json/order/search_searchPhone.action?mobile=".$mobile));
