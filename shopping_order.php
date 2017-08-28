<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');

include_once(dirname(__FILE__) . '/includes/cls_captcha.php');


$goods_id=$_POST['goods_id'];

$jingpian_cs=$_POST['jingpian_cs'];

print_r($jingpian_cs);


?>
