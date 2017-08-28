<?php

// 简单验证一下密钥
if( !isset($_GET['saltKey']) || $_GET['saltKey'] !== 'sdf23ksdfmeD3_Dfd3sf' ) exit('error');

//得到post过来的二进制原始数据
$picStr = file_get_contents('php://input');

$path = dirname(__FILE__).'/upload/';

if( !empty($picStr) ){

	// 保存图片
	$imageName = time().rand(1,1000).'.jpg';
	file_put_contents( $path.$imageName, $picStr );

	echo $imageName;
}

