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
	    if($action=="groupbuy")
		{
			  
				if(empty($order))
				{
					$order="order by goods_id desc";
				}
				else
				{
					if($order=="xiao")
					{
						$order="order by goods_id desc";
					}
					
					if($order=="click")
					{
						$order="order by click_count desc";
					}
					if($order=="price")
					{
						$order="order by market_price desc";
					}
				}
				//$sql="select * from `ecs_goods` as a  left join `ecs_goods_activity` as b on a.goods_id=b.goods_id and b.act_type=1";
				$sql="select * from `ecs_goods`  where goods_id in(select goods_id from `ecs_goods_activity` where act_type=1) ".$order."";
				$one=$db->GetAll($sql);
				$t_info=array();
				//print_r($one);die;
				foreach($one as $key=>$val)
				{
					
					$info=$db->getRow("SELECT * from  " . $ecs->table('goods_activity') . " where goods_id='".$val['goods_id']."'");
					
					$ext_info = unserialize($info['ext_info']);
					$nowprice=$ext_info['price_ladder'][0]['price'];
					$dazhe= number_format((($nowprice/$val['market_price'])*10),2);
					$t_info[]=array('id'=>$info['act_id'],'img'=>$val['goods_thumb'],'name'=>$val['goods_name'],'nowprice'=>$nowprice,'oldprice'=>$val['market_price'],'dazhe'=>$dazhe.'折','click'=>$val['click_count'],'xiaoliang'=>0);
				}
				 if($t_info)
				 {
					$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$t_info);
				 }
				 else
				 {
					$results = array('result'=>'40000', 'data'=>'没有团购信息'); 
				   }
				exit($json->encode($results));
		}
		if($action=="activity")
		{
			    
				$sql="select * from  " . $ecs->table('favourable_activity') . "  where 1=1 order by act_id desc";
				$one=$db->GetAll($sql);
				$t_info=array();
				//print_r($one);die;
				foreach($one as $key=>$val)
				{
					
					$info=$db->getRow("SELECT * from  " . $ecs->table('touch_activity') . " where act_id='".$val['act_id']."'");
					$start_time=date('Y-m-d H:s:i',$val['start_time']);
					$end_time=date('Y-m-d H:s:i',$val['end_time']);
					
					$t_info[]=array('img'=>$info['act_banner'],'act_id'=>$val['act_id'],'start_time'=>$start_time,'end_time'=>$end_time,'act_name'=>$val['act_name']);
				}
				 if($t_info)
				 {
					$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$t_info);
				 }
				 else
				 {
					$results = array('result'=>'40000', 'data'=>'没有促销信息'); 
				   }
				exit($json->encode($results));
		}
		if($action=="groupbuy_info")
		{
			 $groupbuy_id=$_POST['groupbuy_id'];
			 
			 $info=$db->getRow("SELECT * from  " . $ecs->table('goods_activity') . " where act_id='".$groupbuy_id."'");
			 
			 $ext_info = unserialize($info['ext_info']);
			 $now_price=$ext_info['price_ladder'][0]['price'];
			 $amount=$ext_info['price_ladder'][0]['amount'];
			 
			 $deposit=$ext_info['deposit'];
			 
			 
			 //print_r($ext_info);die;
			 $info2=$db->getRow("SELECT * from  " . $ecs->table('goods') . " where goods_id='".$info['goods_id']."'");
			 $pic_ce=$db->GetAll("SELECT * from  " . $ecs->table('goods_gallery') . " where goods_id=".$info2['goods_id']);
			 $pic_ce2=array();
			 foreach($pic_ce as $key=>$val)
			 {
				 $pic_ce2[]=array('img_url'=>$val['img_url'],'img_id'=>$val['img_id']);
			 }
			 
			 $info3=$db->getOne("SELECT count(*) from  " . $ecs->table('order_goods') . " where goods_id='".$info2['goods_id']."'");
			 if(empty($info3))
			 {
				 $xiao="0";
				 $now_buy="0";
			 }
			 if(empty($deposit))
			 {
				 $deposit="0";
			 }
			 $info4=array();
			 
			 $info4[]=array('goods_id'=>$info2['goods_id'],'img'=>$pic_ce2,'name'=>$info['act_name'],'nowprice'=>$now_price,'xiao'=>$xiao,'deposit'=>$deposit,'end_time'=>$info['end_time'],'now_buy'=>$now_buy,'amount'=>$amount,'content'=>$info2['goods_desc']);
			 $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info4);
			 exit($json->encode($results));
		}
		
		
		//优惠活动点击
		if($action=="activity_info")
		{
			
			
			 $activity_id=$_POST['activity_id'];
			 
			 $info=$db->getRow("SELECT * from  " . $ecs->table('favourable_activity') . " where act_id='".$activity_id."'");
			 
			 $info1=$db->getAll("SELECT * from  " . $ecs->table('goods') . " where goods_id in(".$info['act_range_ext'].")");
			 
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
			 $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$tinfo);
			 exit($json->encode($results));
		}
  }
?>