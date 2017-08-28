<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;


    
    $token=$_POST['token'];
	$u_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");
	
   if (empty($token))
    {
      $results = array('result'=>'40004', 'data'=>'查询失败没有登录');
      exit($json->encode($results));
    }
	else
	{
		$order_id=$_POST['order_id'];

		
		$one=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id='".$u_id."' ");
		
		$tress=$db->GetRow("select * from " . $ecs->table('order_info') . " where user_id ='".$u_id."' and order_id='".$order_id."' order by order_id desc");
		$six=array();
		
		switch($tress['pay_status'])
			{
				
				
				case "0":
				$z="未付款";
				break;
				
				case "1":
				$z="付款中";
				break;
				
				case "2":
				$z="已付款";
				break;	
			}
		
		
		foreach ($tress as $key=>$val)
		{

			
			
			
			$goods_in=array();
			$goods_order=$db->GetAll("select * from " . $ecs->table('order_goods') . " where order_id ='".$order_id."' order by rec_id desc");
			
			//print_r($goods_order);die;
			foreach($goods_order as $key1=>$val1)
			{
				$m_price=$val1['goods_number']*$val1['goods_price'];
				
				$imgss=$db->GetRow("select * from " . $ecs->table('goods') . " where goods_id ='".$val1['goods_id']."'");
				
				
				$allprice+=$val1['goods_price']*$val1['goods_number'];
				
				$goods_in[]=array('goods_thumb'=>$imgss['goods_thumb'],'goods_name'=>$val1['goods_name'],'goods_price'=>$val1['goods_price'],'num'=>$val1['goods_number'],'price'=>$m_price);
			}
				
			
			
			
			$time=date('Y-m-d H:i:s',$tress['add_time']+8*60*60);
			
			$kuaidi="15";
			
			$jiankuandi=$allprice-15;
			
			
			$six[]=array('state'=>$z,'order_sn'=>$tress['order_sn'],'allprice'=>$allprice,'add_time'=>$time,'goods_info'=>$goods_in,'consignee'=>$tress['consignee'],'tel'=>$tress['tel'],'address'=>$tress['address'],'goods_allprice'=>$jiankuandi,'peisong_price'=>$kuaidi,'pay'=>$tress['pay_name'],'pei'=>$tress['shipping_name']);
			if($six)
			{
			   $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$six);
			}
			else
			{
			   $results = array('result'=>'40000', 'data'=>'查询成功但是没有订单数据',);
			}
			exit($json->encode($results));
			
		}
		
	}


?>