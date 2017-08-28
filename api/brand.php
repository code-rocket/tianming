<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
  
	  $one=$db->GetAll("SELECT * from  `ecs_brand` where is_show=1");
	  $t_info=array();
	  foreach($one as $key=>$val)
	  {
		  $two=$db->GetRow("SELECT * from  `ecs_touch_brand` where brand_id='".$val['brand_id']."'");
		  $t_info[]=array('brand_id'=>$val['brand_id'],'pic'=>$two['brand_banner'],'name'=>$val['brand_name']);
	  }
	  
	  if($t_info)
	  {
	    $results = array('result'=>'10000', 'data'=>'成功','msg'=>$t_info); 
	  }
	  else
	  {
		 $results = array('result'=>'40000', 'data'=>'失败');  
	  }
	  
	  exit($json->encode($results));
		

?>