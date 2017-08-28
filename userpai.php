<?php
define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ($act="ss") {
	if (empty[$_POST['a']) {
 	$return_mg['code']="40001";
 	$return_mg['mess']="业务处理失败";
 	echo json_encode($return_mg);
 }
}
 

?>