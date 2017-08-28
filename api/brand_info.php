<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
  
  $action=$_POST['action'];
  $order=$_POST['order'];

  if(empty($action))
  {
	      $results = array('result'=>'40004', 'data'=>'没有输入执行动作'); 
	      exit($json->encode($results));
  }
  else
  {		
		//优惠活动点击
		if($action=="brand_info")
		{
			 $brand_id=$_POST['brand_id'];
			 $info1=$db->getAll("SELECT * from  " . $ecs->table('goods') . " where brand_id ='".$brand_id."'");
			 
			 $info4=array();
			 foreach($info1 as $key=>$val)
			 {
				  $get_info2=$db->GetOne("SELECT count(*) from  `ecs_collect_goods` where goods_id='".$val['goods_id']."'");
				  $get_info3=$db->GetOne("SELECT count(*) from  `ecs_order_goods` where goods_id='".$val['goods_id']."' and order_id in(select order_id from `ecs_order_info` where order_status=2)");
				 
				 $get_info4=$db->GetOne("select * from `ecs_goods_activity`  where goods_id ='".$val['goods_id']."'");
				 if($val['is_promote']==0)
				  {
					 $newprice=$val['shop_price']; 
				  }
				  elseif($val['is_promote']==1)
				  {
					 $newprice=$val['promote_price']; 
				  }
				  
				  if(empty($get_info4))
				  {
					  $tuangou="0";
					  $oldprice=$val['market_price'];
					  
				  }
				  else
				  {
					  $tuangou="1";
					  $oldprice=$val['market_price'];
				  }
			         $tinfo[]=array('id'=>$val['goods_id'],'img'=>$val['goods_thumb'],'goods_name'=>$val['goods_name'],'market_price'=>$oldprice,'shop_price'=>$newprice,'like_num'=>$get_info2,'buy_num'=>$get_info3,'is_tuan'=>$tuangou);
			 }
			 if($tinfo)
			 {
			   $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$tinfo);
			 }
			 else
			 {
				 $results = array('result'=>'40000', 'data'=>'没有数据');
			 }
			 exit($json->encode($results));
		}
  }
?>