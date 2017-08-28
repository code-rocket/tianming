<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;


   $a=$_POST['a'];
   
   if(empty($a))
   {
	    $results = array('result'=>'40000', 'data'=>'业务处理失败');
		exit($json->encode($results));
   }
   else
   {
	   //轮播图
	   if($a=="lunbo")
	   {
		   $info=$db->GetAll("SELECT * from  `ecs_touch_ad` where 1=1");
		   
		   
		   $info1=array();
		  // print_r($info);die;
		   foreach($info as $key=>$val)
		   {
			   $info1[]=array('url'=>$info[$key]['ad_code']);
		   }
		   if($info1)
		   {
			   $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info1);
		       exit($json->encode($results));
		   }
		   else
		   {
			   $results = array('result'=>'40001', 'data'=>'查询失败没有数据');
		       exit($json->encode($results));
		   }
	   }
	   
	   //产品列表
	   if($a=="product")
	   {
		   $get_info=$db->GetAll("SELECT * from  `ecs_goods` where 1=1 and is_best =1 order by sort_order,last_update asc");
		   
		   
		   foreach($get_info as $key=>$val)
			  {
				  
				  $get_info2=$db->GetOne("SELECT count(*) from  `ecs_collect_goods` where goods_id='".$val['goods_id']."'");
				  $get_info3=$db->GetOne("SELECT count(*) from  `ecs_order_goods` where goods_id='".$val['goods_id']."' and order_id in (select order_id from `ecs_order_info` where order_status=2)");
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
				  if(empty($get_info3))
				  {
					  $get_info3=="0";
				  }
				  
				  $tinfo[]=array('id'=>$get_info[$key]['goods_id'],'img'=>$get_info[$key]['goods_thumb'],'goods_name'=>$get_info[$key]['goods_name'],'market_price'=>$oldprice,'shop_price'=>$newprice,'like_num'=>$get_info2,'buy_num'=>$get_info3,'is_tuan'=>$tuangou);
				 
			  }
		      $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$tinfo);
			  exit($json->encode($results));
		   
		    
	   }
	   
   }


?>
