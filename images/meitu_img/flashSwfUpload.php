<?php

// ����֤һ����Կ
if( !isset($_GET['saltKey']) || $_GET['saltKey'] !== 'sdf23ksdfmeD3_Dfd3sf' ) exit('error');

//�õ�post�����Ķ�����ԭʼ����
$picStr = file_get_contents('php://input');

$path = dirname(__FILE__).'/upload/';

if( !empty($picStr) ){

	// ����ͼƬ
	$imageName = time().rand(1,1000).'.jpg';
	file_put_contents( $path.$imageName, $picStr );

	echo $imageName;
}

