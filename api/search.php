<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
    
	
	
	
	$action=$_POST['action'];
	if($action=="hot_search")
	{
		$one=$db->GetRow("SELECT * from  " . $ecs->table('shop_config') . " where id=330");
		$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$one['value']);
		exit($json->encode($results));
	}
	if($action=="search")
	{
		
		$txt=$_POST['txt'];
		if(empty($txt))
		{
			$results = array('result'=>'40004', 'data'=>'查询失败没有输入查询内容');
			exit($json->encode($results));
		}
		else
		{
			
		   $get_info=$db->GetAll("SELECT * from  " . $ecs->table('goods') . " where goods_name like '%".$txt."%'");
		   foreach ($get_info as $key=>$val)
			  {
	
				  $get_info2=$db->GetOne("SELECT count(*) from  `ecs_collect_goods` where goods_id='".$val['goods_id']."'");
				  $get_info3=$db->GetOne("SELECT count(*) from  `ecs_order_goods` where goods_id='".$val['goods_id']."' and order_id in(select order_id from `ecs_order_info` where order_status=1)");
				  $get_info4=$db->GetOne("select * from `ecs_goods_activity`  where goods_id ='".$val['goods_id']."'");
				  
				  if($get_info[$key]['is_promote']==0)
				  {
					 $newprice=$get_info[$key]['shop_price']; 
				  }
				  elseif($get_info[$key]['is_promote']==1)
				  {
					 $newprice=$get_info[$key]['promote_price']; 
				  }
				  
				  if(empty($get_info4))
				  {
					  $tuangou="0";
					  $oldprice=$get_info[$key]['market_price'];
					  
				  }
				  else
				  {
					  $tuangou="1";
					  $oldprice=$get_info[$key]['market_price'];
				  }
				  
				  $tinfo[]=array('id'=>$get_info[$key]['goods_id'],'img'=>$get_info[$key]['goods_thumb'],'goods_name'=>$get_info[$key]['goods_name'],'market_price'=>$oldprice,'shop_price'=>$newprice,'like_num'=>$get_info2,'buy_num'=>$get_info3,'is_tuan'=>$tuangou);
				  
			  }
		   $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$tinfo);
		   exit($json->encode($results));
		}
	}
	else
	{
		   $results = array('result'=>'40004', 'data'=>'没有输入动作');
		   exit($json->encode($results));
	}
?>