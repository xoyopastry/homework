<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15
 * Time: 14:25
 */
header("Content-Type:text/json; charset=gb2312");
print_r($content = file_get_contents("http://huaban.com/explore/banmiansheji/?inzqaws6&max=521858061&limit=20&wfl=1"));
