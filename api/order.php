<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
    session_start();  
    $token=$_POST['token'];
	$action=$_POST['action'];
	$u_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");
	
   if (empty($token))
    {
      $results = array('result'=>'40004', 'data'=>'查询失败没有登录');
      exit($json->encode($results));
    }
	else
	{
		
		if(empty($action))
		{
			$results = array('result'=>'40003', 'data'=>'没有输入动作');
            exit($json->encode($results));
		}
		else
		{
			 if($action=="myorder")
			 {
				$one=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id='".$u_id."' ");
				//$two=$db->GetAll("SELECT a.goods_id, a.goods_price,a.goods_number,b.goods_thumb,a.goods_name,b.goods_brief from  " . $ecs->table('order_goods') . " as a left join " . $ecs->table('goods') . " as b  on a.goods_id=b.goods_id and  a.order_id in(select order_id from " . $ecs->table('order_info') . "where user_id='".$u_id."')");
				
				$tress=$db->GetAll("select * from " . $ecs->table('order_info') . " where user_id ='".$u_id."' and order_status <>2 order by order_id desc");
				$six=array();
				foreach ($tress as $key=>$val)
				{
					
					
					
					/*switch($val['order_status'])
					{
						case 0:
						$x="未确认";
						break;
						
						case 1:
						$x="确认";
						break;
						
						case 2:
						$x="已取消";
						break;
						
						case 3:
						$x="无效";
						break;
						
						case 4:
						$x="退货";
						break;
					}
					
					switch($val['shipping_status'])
					{
						case 0:
						$y="未发货";
						break;
						
						case 1:
						$y="已发货";
						break;
						
						case 2:
						$y="已收货";
						break;
						
						case 3:
						$y="退货";
						break;
						
						
					}*/
					
					
					switch($val['pay_status'])
					{
						case 0:
						$z="未付款";
						break;
						
						case 1:
						$z="付款中";
						break;
						
						case 2:
						$z="已付款";
						break;
						
						
					}
					$zt=$z;
					
					
					$goods_order=$db->GetRow("select * from " . $ecs->table('order_goods') . " where order_id ='".$val['order_id']."' order by rec_id desc");
					$goods_in=$db->GetRow("select * from " . $ecs->table('goods') . " where goods_id ='".$goods_order['goods_id']."'");			
					$allprice=$val['shipping_fee']+$val['insure_fee']+$val['pay_fee']+$val['pack_fee']+$val['card_fee']+$val['goods_amount'];
					$time=date('Y-m-d H:i:s',$val['add_time']+8*60*60);
					$six[]=array('order_id'=>$val['order_id'],'order_sn'=>$val['order_sn'],'state'=>$zt,'allprice'=>$allprice,'add_time'=>$time,'img_url'=>$goods_in['goods_thumb']);
				}
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

			 
			 if($action=="receipt")
			 {
					$one=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id='".$u_id."' ");
					$tress=$db->GetAll("select * from " . $ecs->table('order_info') . " where user_id ='".$u_id."' and pay_status=2 and order_status <>2 and shipping_status=0 order by order_id desc");
					$six=array();
					foreach ($tress as $key=>$val)
					{
	
						switch($val['shipping_status'])
						{
							case 0:
							$z="未发货";
							break;
							
							case 1:
							$z="已发货";
							break;
							
							case 2:
							$z="已收货";
							break;
							
							case 3:
							$z="退货";
							break;
						}
						$zt=$z;
						
						
						$goods_order=$db->GetRow("select * from " . $ecs->table('order_goods') . " where order_id ='".$val['order_id']."' order by rec_id desc");
						$goods_in=$db->GetRow("select * from " . $ecs->table('goods') . " where goods_id ='".$goods_order['goods_id']."'");			
						$allprice=$val['shipping_fee']+$val['insure_fee']+$val['pay_fee']+$val['pack_fee']+$val['card_fee']+$val['goods_amount'];
						$time=date('Y-m-d H:i:s',$val['add_time']+8*60*60);
						$six[]=array('order_id'=>$val['order_id'],'order_sn'=>$val['order_sn'],'state'=>$zt,'allprice'=>$allprice,'add_time'=>$time,'img_url'=>$goods_in['goods_thumb']);
					}
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
			 
			 
			 if($action=="cancel")
			 {
					$one=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id='".$u_id."' ");
					
					$order_id=$_POST['order_id'];
					
					$tress=$db->GetRow("select * from " . $ecs->table('order_info') . " where user_id ='".$u_id."' and order_id='".$order_id."'");
					
					if($tress)
					{
						$upda=$db->query('UPDATE ' . $ecs->table("order_info") . "SET `order_status`=2 WHERE user_id = '" . $u_id. "' and order_id='".$order_id."'");
						
						if($upda)
						{
						   $results = array('result'=>'10000', 'data'=>'修改成功');
						}
						else
						{
						   $results = array('result'=>'40000', 'data'=>'失败',);
						}
						exit($json->encode($results));
						
					}
					
					
			 }
			 
			 
			 
			 
			 if($action=="nopayment")
			 {
					$one=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id='".$u_id."' ");
					$tress=$db->GetAll("select * from " . $ecs->table('order_info') . " where user_id ='".$u_id."' and pay_status=0 and order_status <>2 order by order_id desc");
					$six=array();
					foreach ($tress as $key=>$val)
					{
	
						switch($val['pay_status'])
						{
							case 0:
							$z="未付款";
							break;
							
							case 1:
							$z="付款中";
							break;
							
							case 2:
							$z="已付款";
							break;	
						}
						$zt=$z;
						
						
						$goods_order=$db->GetRow("select * from " . $ecs->table('order_goods') . " where order_id ='".$val['order_id']."' order by rec_id desc");
						$goods_in=$db->GetRow("select * from " . $ecs->table('goods') . " where goods_id ='".$goods_order['goods_id']."'");			
						$allprice=$val['shipping_fee']+$val['insure_fee']+$val['pay_fee']+$val['pack_fee']+$val['card_fee']+$val['goods_amount'];
						$time=date('Y-m-d H:i:s',$val['add_time']+8*60*60);
						$six[]=array('order_id'=>$val['order_id'],'order_sn'=>$val['order_sn'],'state'=>$zt,'allprice'=>$allprice,'add_time'=>$time,'img_url'=>$goods_in['goods_thumb']);
					}
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
			 
			 
			 if($action=="over")
			 {
					$one=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id='".$u_id."' ");
					$tress=$db->GetAll("select * from " . $ecs->table('order_info') . " where user_id ='".$u_id."'  and order_status=5  order by order_id desc");
					$six=array();
					foreach ($tress as $key=>$val)
					{
	
						switch($val['order_status'])
						{
							case 0:
							$z="未确认";
							break;
							
							case 1:
							$z="确认";
							break;
							
							case 2:
							$z="已取消";
							break;
							
							case 3:
							$z="无效";
							break;
							
							case 4:
							$z="退货";
							break;
							
							case 5:
							$z="已收货";
							break;
						}
						$zt=$z;
						
						
						$goods_order=$db->GetRow("select * from " . $ecs->table('order_goods') . " where order_id ='".$val['order_id']."' order by rec_id desc");
						$goods_in=$db->GetRow("select * from " . $ecs->table('goods') . " where goods_id ='".$goods_order['goods_id']."'");			
						$allprice=$val['shipping_fee']+$val['insure_fee']+$val['pay_fee']+$val['pack_fee']+$val['card_fee']+$val['goods_amount'];
						$time=date('Y-m-d H:i:s',$val['add_time']+8*60*60);
						$six[]=array('order_id'=>$val['order_id'],'order_sn'=>$val['order_sn'],'state'=>$zt,'allprice'=>$allprice,'add_time'=>$time,'img_url'=>$goods_in['goods_thumb']);
					}
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
			 
			 if($action=="pay_success")
			 {
				 $trade_status=$_POST['trade_status'];
				 $order_sn=$_POST['order_sn'];
				 $token=$_POST['token'];
				 
				 if(($trade_status)==1)
				 {
				      
					   if(!empty($token))
					   {
						   $user_info=$db->GetRow("select * from " . $ecs->table('users') . " where question ='".$token."'");			
						   
						   $order_info=$db->GetRow("select * from " . $ecs->table('order_info') . " where order_sn ='".$order_sn."'");
						   
						   if(empty($order_info))
						   {
							   $results = array('result'=>'40001', 'data'=>'订单不存在');
								exit($json->encode($results));
						   }	
						   else
						   {
							   if($order_info['user_id']!=$user_info['user_id'])
							   {
								   $results = array('result'=>'40002', 'data'=>'订单和用户不匹配');
									exit($json->encode($results));
							   }
							   else
							   {
								   $time=time();
								   $upda_inser=$db->query("UPDATE " . $ecs->table('order_info') . " SET `order_status`=2,`pay_time`='".$time."' WHERE user_id = '" . $user_info['user_id'] . "'");
								   
								   if($upda_inser)
								   {
									   $results = array('result'=>'10000', 'data'=>'修改状态成功');
									   exit($json->encode($results));
								   }
								   else
								   {
									   $results = array('result'=>'40003', 'data'=>'修改状态失败');
									   exit($json->encode($results));
								   }
							   }
						   }
					   }
					   else
					   {
						    $results = array('result'=>'40000', 'data'=>'没有登录');
							exit($json->encode($results));
					   }
				 }
				 else
				 {
					        $results = array('result'=>'40004', 'data'=>'支付失败');
							exit($json->encode($results));
				 }
			 }
			 
			 
			 
			 
			 
			 
			 
		}
	}


?>