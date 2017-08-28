<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
	


$goods_id=$_POST['goods_id'];

if(empty($goods_id))
{
	$results = array('result'=>'40004', 'data'=>'goods_id为空');
	exit($json->encode($results));
}
else
{
		  $get_info=$db->GetRow("select * from ecs_goods where goods_id ='".$goods_id."'");
		  
		  
		 
		  
		  
		  
		  $row1=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_diy_canshu') ." where goods_id=".$goods_id);

		  $info=array('goods_img'=>$get_info['goods_pic'],'jp_canshu'=>$row1);
          if($row1)
		  {
		     $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
		  }
		  else
		  {
			  $results = array('result'=>'40000', 'data'=>'查询成功');
		  }
		  
		  
		  exit($json->encode($results));
}
		 
?>