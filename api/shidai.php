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
		  
		  
		 
		  
		  
		  
		  $row1=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_attr') ." where goods_id=".$goods_id);

		  foreach($row1 as $key=>$val)
		  {
			  //echo $val['attr_id'];
			 if($val['attr_id']==13)
			 {
				 $jp_width= $val['attr_value'];
				 
			 }
			 
			 else if($val['attr_id']==14)
			 {
				 $yjkj_width= $val['attr_value'];
				 
			 }
			 
			 else if($val['attr_id']==15)
			 {
				 $bt_width= $row1[$key]['attr_value'];
			   
			 }
			 
			 else if($val['attr_id']==16)
			 {
				 $jp_height= $val['attr_value'];
			  
			 }
		   
		  }
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  $info=array('goods_img'=>$get_info['goods_pic'],'jp_width'=>$jp_width,'yjkj_width'=>$yjkj_width,'bt_width'=>$bt_width,'jp_height'=>$jp_height);

		  $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
		  
		  
		  exit($json->encode($results));
}
		 
?>