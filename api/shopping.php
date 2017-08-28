<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
    
	$action=$_POST['action'];
	$token=$_POST['token'];

	$user_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");

	//查询是否登录
	if(empty($token))
	{
		  $results = array('result'=>'40002', 'data'=>'没有登录');
         exit($json->encode($results));
	}
	//登录了
	else
	{

			  if(empty($action))
			  {
				   $results = array('result'=>'40004', 'data'=>'业务处理失败,没有执行动作');
				   exit($json->encode($results));
			  }
			  
			  //收货地址查询
			  else
			  {
						  if($action=="shopping_address")
						  {
							  if(empty($user_id))
							  {
								  $results = array('result'=>'40002', 'data'=>'没有登录');
								  exit($json->encode($results));
							  }
							  else
							  {   
							  
								  //读取客户收货地址
								  $user_address_info=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where user_id=".$user_id." and  sign_building=1 order by sign_building desc");
								  
								  //收货地址为空的情况
								  if(empty($user_address_info))
								  {
									  $results = array('result'=>'40001', 'data'=>'收货地址为空');
								  }
								  //收货地址不为空的情况
								  else
								  {
										$addres_info=array();
										
										
									    //$infos[]=array('address_id'=>$user_address_info['address_id'],'user_name'=>$user_address_info['consignee'],'tel'=>$user_address_info['tel'],'address'=>$user_address_info['address']);
										
										
										 $country_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$user_address_info['country']);
										 $province_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$user_address_info['province']);
										 $city_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$user_address_info['city']);
										 $district_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$user_address_info['district']);
										
										$infos[]=array('address_id'=>$user_address_info['address_id'],'consignee'=>$user_address_info['consignee'],'country'=>$user_address_info['country'],'country_name'=>$country_name['region_name'],'province'=>$user_address_info['province'],'province_name'=>$province_name['region_name'],'city'=>$user_address_info['city'],'city_name'=>$city_name['region_name'],'district'=>$user_address_info['district'],'district_name'=>$district_name['region_name'],'address'=>$user_address_info['address'],'tel'=>$user_address_info['tel'],'is_default'=>$user_address_info['sign_building']);
									
										$results = array('result'=>'10000', 'data'=>'收货地址读取成功','msg'=>$infos);
										exit($json->encode($results));
								  }
							   }
						  }
						  
						  
						  //添加到后台购物车表
						  if($action=="shopping_list")
							{
									 
									
									$goods_id=$_POST['goods_id'];
									
									
									
									$num=$_POST['num'];
									$shopping_in=array();
									$shopping_info=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id in(".$goods_id.")");	
									if(empty($shopping_info))
									  {
										  $results = array('result'=>'40002', 'data'=>'产品ID不存在');
										  exit($json->encode($results));
									  }
									  else
									  {  

										   $goods_info=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$goods_id."");
										   
										   
										    $cat_arr=get_parent_cats($goods_info['cat_id']);
										   
										   
										   
										   foreach ($cat_arr as $val)
											{
											$goods['topcat_id']=$val['cat_id'];
											$goods['topcat_name']=$val['cat_name'];
											}
										  
										   if($goods['topcat_id']==45)
										   {
											   $or_is="3";    //镜片
											   
										   }
										   elseif($goods['topcat_id']==3)
										   {
											   $or_is="1";    //太阳镜
											   
										   }
										   else
										   {
											   $or_is="3"; //普通
										   }
										   
										   
										   
										   $is_no=$db->GetRow("SELECT * from  " . $ecs->table('order_goods_go') . " where user_id=".$user_id." and goods_id='".$goods_id."'");
											
											
											if(empty($is_no))
											{
												if(empty($num))
												{
													$num=1;
												}
												$upda_inser=$db->query("INSERT INTO " . $ecs->table('order_goods_go') . "(user_id,goods_id,goods_name,goods_sn,market_price,goods_price,goods_number,car_goods_type) VALUES ('".$user_id."','".$goods_id."','".$goods_info['goods_name']."','".$goods_info['goods_sn']."','".$goods_info['market_price']."','".$goods_info['goods_price']."','".$num."','".$or_is."')");
												
												
												if($or_is=="3")
												$inser_id=mysql_insert_id();
												
												$type=$_POST['type'];
												$y_dushu=$_POST['y_dushu'];
												$y_tongju=$_POST['y_tongju'];
												$y_sanguang=$_POST['y_sanguang'];
												$y_zhouwei=$_POST['y_zhouwei'];
												$z_dushu=$_POST['z_dushu'];
												$z_sanguang=$_POST['z_sanguang'];
												$z_zhouwei=$_POST['z_zhouwei'];
												$y_xiajiaguang=$_POST['y_xiajiaguang'];
												$z_xiajiaguang=$_POST['z_xiajiaguang'];
												
												$upda_inser=$db->query("INSERT INTO " . $ecs->table('order_goods_go_jp') . "(type,y_dushu,y_tongju,y_sanguang,y_zhouwei,z_dushu,z_sanguang,z_zhouwei,y_xiajiaguang,z_xiajiaguang,card_id) VALUES ('".$type."','".$y_dushu."','".$y_tongju."','".$y_sanguang."','".$y_zhouwei."','".$z_dushu."','".$z_sanguang."','".$z_zhouwei."','".$y_xiajiaguang."','".$z_xiajiaguang."','".$inser_id."')");

											}
											else
											{
												
												$new_num=intval($is_no['goods_number'])+1;
												
					                            $upda_inser=$db->query("UPDATE " . $ecs->table('order_goods_go') . " SET `goods_number`='".$new_num."',`goods_name`='".$goods_info['goods_name']."',`goods_sn`='".$goods_info['goods_sn']."' WHERE user_id = '" . $user_id . "' and goods_id = '" . $goods_id . "'");
											}
											
											if($upda_inser)
											{
											   $results = array('result'=>'10000', 'data'=>'添加到购物车成功');
											}
											else
											{
												$results = array('result'=>'40001', 'data'=>'添加到购物车失败');
											}
											
											exit($json->encode($results));
									  }
		
									
							}
						  //添加到后台购物车表
	  
						   //删除购物车里的某产品
						  if($action=="delete_shopping")
							{
									 
									 $rec_id=$_POST['rec_id'];
									 
								  
									 $arr = explode(",",$rec_id);
									 //echo 'user_id:'.$user_id;die;
									 foreach($arr as $key)
									 { 
									     
										 $is_no=$db->GetRow("SELECT * from  " . $ecs->table('order_goods_go') . " where user_id='".$user_id."' and rec_id ='".$key."'");
										
										 if(empty($is_no))
										 {
											 $results = array('result'=>'40004', 'data'=>'删除失败购物车没有该商品');
										     exit($json->encode($results));
										 }
									 }	
									 
									 $upda_inser=$db->query("delete from " . $ecs->table('order_goods_go') . " WHERE user_id = '" . $user_id . "' and rec_id in(".$rec_id.")");
									 
									 if($is_no['car_goods_type']==3)
									 {
										 $db->query("delete from " . $ecs->table('order_goods_go_jp') . " WHERE user_id = '" . $user_id . "' and card_id in(".$rec_id.")");
									 }
									 
									 if(!empty($upda_inser))
									  {
										 $results = array('result'=>'10000', 'data'=>'删除成功');
									  }
									  else
									  {
										  $results = array('result'=>'40001', 'data'=>'删除失败');
									  }
									  
										exit($json->encode($results));		
									
							}
						  //删除购物车里的某产品
	  
						   //读取购物车
							if($action=="look_shopping")
							{ 
							         
							                $news_info=$db->GetAll("SELECT * from  " . $ecs->table('order_goods_go') . " where user_id=".$user_id."");
											
											if(empty($news_info))
											{
												$results = array('result'=>'40004', 'data'=>'购物车为空');
												exit($json->encode($results));
											}
											else
											{
											
												  foreach($news_info as $key=>$val)
												  {
													  
													  $gd_info=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$news_info[$key]['goods_id']."");
													  $all_price+=$gd_info['shop_price']*$val['goods_number'];
													  $shopping_in[]=array('shopping_id'=>$news_info[$key]['rec_id'],'id'=>$news_info[$key]['goods_id'],'img'=>$gd_info['goods_thumb'],'goods_name'=>$news_info[$key]['goods_name'],'shop_price'=>$gd_info['shop_price'],'goods_brief'=>$gd_info['goods_brief'],'num'=>$news_info[$key]['goods_number']);
												  }
	 
												  
												  if(!empty($shopping_in))
												  {
													 $results = array('result'=>'10000', 'data'=>'读取成功','msg'=>$shopping_in,'allprice'=>$all_price);
												  }
												  else
												  {
													  $results = array('result'=>'40001', 'data'=>'读取失败');
												  }
												  exit($json->encode($results));
											}
							}

							//确认订单页面
							if($action=="confirm_shopping")
							{ 
							
							         $address_id=$_POST['addres_id'];
									 
									 $sps_id=$_POST['sps_id'];
									
									 if(!empty($sps_id))
									 {
										$where="and rec_id in(".$sps_id.")"; 
									 }

									 $user_info=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id=".$user_id."");
									 
									 if(empty($addres_id))
									 {
										 $address_info=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where user_id=".$user_id." and sign_building=1");
										 if(empty($address_info))
										 {
											 $results = array('result'=>'40001', 'data'=>'读取失败，没有地址');
											 exit($json->encode($results));
									     }
									 }
									 else
									 {
									     $address_info=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where user_id=".$user_id." and address_id='".$address_id."'");
									 }
									 
									 
									 //读取购物车
									 $gwc=$db->GetAll("SELECT * from  " . $ecs->table('order_goods_go') . " where user_id=".$user_id." ".$where."");
									 
									 $shopping_in=array();
									 foreach($gwc as $key=>$val)
									  {
										  
										  
										  $gd_info=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$gwc[$key]['goods_id']."");
										 
										  $all_price=$gd_info['shop_price']*$gwc[$key]['goods_number'];
										   $total_price+=$all_price;
										  $shopping_in[]=array('shopping_id'=>$gwc[$key]['rec_id'],'id'=>$gwc[$key]['goods_id'],'img'=>$gd_info['goods_thumb'],'goods_name'=>$gwc[$key]['goods_name'],'shop_price'=>$gd_info['shop_price'],'goods_brief'=>$gd_info['goods_brief'],'num'=>$gwc[$key]['goods_number'],'allprice'=>$all_price);
									  }
									 
									                
									 $addres_info1=array();
	
									
									// $addres_info=array('name'=>$address_info['consignee'],'tel'=>$address_info['tel'],'address'=>$address_info['address']);
									 
									 
									 $country_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$address_info['country']);
									 $province_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$address_info['province']);
									 $city_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$address_info['city']);
									 $district_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$address_info['district']);
									
									$addres_infoss[]=array('address_id'=>$address_info['address_id'],'consignee'=>$address_info['consignee'],'country'=>$address_info['country'],'country_name'=>$country_name['region_name'],'province'=>$address_info['province'],'province_name'=>$province_name['region_name'],'city'=>$address_info['city'],'city_name'=>$city_name['region_name'],'district'=>$address_info['district'],'district_name'=>$district_name['region_name'],'address'=>$address_info['address'],'tel'=>$address_info['tel'],'is_default'=>$address_info['sign_building']);
									 
									 
									
									 
							         $user_info=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id=".$user_id."");
									 
									 
									 //配送方式
									 $peisong=shipping_list();
									 
									 
									/* $peisong1=$db->GetAll("SELECT * from  " . $ecs->table('shipping') . " where enabled=1");
									 
									 foreach($peisong1 as $key=>$val)
									 {
									     $peisong2=$db->GetRAll("SELECT * from  " . $ecs->table('shipping_area') . " where shipping_id='".$val['shipping_id']."'");
										 foreach($peisong2 as $key2=>$val2)
										 {
											 $peisong3=$db->GetAll("SELECT * from  " . $ecs->table('area_region') . " where  shipping_area_id='".$val2['shipping_area_id']."'");
										 }
									 }*/
									 
									 
									 //支付方式
									 $zffangshi=payment_list();
									 
									 $addres_info1[]=array('shopping_info'=>$shopping_in,'shouhuo_info'=>$addres_infoss,'peisong'=>$peisong,'zffangshi'=>$zffangshi,'total'=>$total_price,'pay_points'=>$user_info['pay_points']);
                                     
									 
									 $results = array('result'=>'10000', 'data'=>'读取成功','msg'=>$addres_info1);
											
									 exit($json->encode($results));
											

							}
							
							if($action=="update_num")
							{
								$sp_id=$_POST['sp_id'];
								$num=$_POST['num'];
								
								$user_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");
								
								$gd_info=$db->GetRow("SELECT * from  " . $ecs->table('order_goods_go') . " where rec_id=".$sp_id."");
								if(!empty($gd_info))
								{
									$upda_inser=$db->query('UPDATE ' . $ecs->table("order_goods_go") . "SET `goods_number`='".$num."' where user_id='".$user_id."' and rec_id=".$sp_id.""); 
									if($upda_inser)
									{
										$results = array('result'=>'10000', 'data'=>'更新成功');
											
									    exit($json->encode($results));
									}
									else
									{
										$results = array('result'=>'40000', 'data'=>'更新失败');
											
									     exit($json->encode($results));
									}
								}
								else
								{
									 $results = array('result'=>'40004', 'data'=>'更新失败，购物车没有该商品');
											
									 exit($json->encode($results));
								}
							}
							
							
							
							
							
							//结算购物车
							if($action=="send_shopping")
							{ 
							         
									 $is_or_jingpian=$_POST['is_or_jingpian'];
									 
									 $sps_id=$_POST['sps_id'];
									 
									
									 {
										$where="and rec_id in(".$sps_id.")"; 
									 }
									 
									  //配送方式
									 $shipping_id=$_POST['shipping_id'];
									 
									 $shipping_name=$_POST['shipping_name'];
									 
									 
									 //支付方式
									 $pay_id=$_POST['pay_id'];
									 
									 $pay_name=$_POST['pay_name'];
									  
							         $order_sn=get_order_sn();//生成订单号
							         $addres_id=$_POST['addres_id'];
									 
									 
							         $user_info=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id=".$user_id."");
									 
									 
									 $address_info=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where user_id=".$user_id."");
									 //查询购物车里面的产品
									 
									 $gwd_info=$db->GetAll("SELECT * from  " . $ecs->table('order_goods_go') . " where user_id=".$user_id." ".$where."");
									 
									 
									// print_r($gwd_info);die;
									 
									 if(empty($gwd_info))
									 {
										    $results = array('result'=>'40003', 'data'=>'购物车为空！');
									
											exit($json->encode($results));	
									 }
									 $addtime=time();
									  	
									 foreach($gwd_info as $key=>$val)
										 {
	  
											   $gd_info=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$gwd_info[$key]['goods_id']."");
											   $all_price=$gd_info['shop_price']*$gwd_info[$key]['goods_number'];
											   $total_price+=$all_price;			  
										 }
									 
									 
									$insert_order_info=$db->query("INSERT INTO `ecs_order_info`(order_sn,user_id,order_status,shipping_status,pay_status,consignee,address,tel,shipping_id,shipping_name,pay_id,pay_name,how_oos,goods_amount,referer,add_time,confirm_time,discount) VALUES ('".$order_sn."','".$user_id."',0,0,0,'".$address_info['consignee']."','".$address_info['address']."','".$address_info['tel']."','".$shipping_id."','".$shipping_name."','".$pay_id."','".$pay_name."','等待所有商品备齐后再发','".$total_price."','本站','".$addtime."','".$addtime."',0)");
                                     
									  if($insert_order_info)
									  {
										  //order_info得到ID
										   $m_id=mysql_insert_id(); 
										   foreach($gwd_info as $key=>$val)
										 {	  
											   $gd_info=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$gwd_info[$key]['goods_id']."");
											   $upda_inser=$db->query("INSERT INTO " . $ecs->table('order_goods') . "(order_id,goods_id,goods_name,goods_sn,goods_number,market_price,goods_price,send_number,is_real,car_goods_type) VALUES ('".$m_id."','".$gwd_info[$key]['goods_id']."','".$gwd_info[$key]['goods_name']."','".$gwd_info[$key]['goods_sn']."','".$gwd_info[$key]['goods_number']."','".$gd_info['market_price']."','".$gd_info['shop_price']."',0,1,'".$val['car_goods_type']."')"); 
											   
											   
											   if($val['car_goods_type']=="3")
											   {
												   $g_id=mysql_insert_id(); 
												   
												   
												   $jp_info=$db->GetRow("SELECT * from  " . $ecs->table('order_goods_go_jp') . " where card_id=".$val['rec_id']."");
												   
												   $type=$jp_info['type'];
												   $y_dushu=$jp_info['y_dushu'];
												   $z_dushu=$jp_info['z_dushu'];
												   $y_tongju=$jp_info['y_tongju'];
												   $y_sanguang=$jp_info['y_sanguang'];
												   $z_sanguang=$jp_info['z_sanguang'];
												   $y_zhouwei=$jp_info['y_zhouwei'];
												   $z_zhouwei=$jp_info['z_zhouwei'];
												   
												   $jingpian=$db->query("INSERT INTO " . $ecs->table('order_jingpian') . "(order_goods_id,type,y_dushu,z_dushu,y_tongju,y_sanguang,z_sanguang,y_zhouwei,z_zhouwei,y_xiajiaguang) VALUES ('".$g_id."','".$type."','".$y_dushu."','".$z_dushu."','".$y_tongju."','".$y_sanguang."','".$z_sanguang."','".$y_zhouwei."','".$z_zhouwei."','".$y_xiajiaguang."')"); 
											   }
											   			  
										 }
										 
											 if($upda_inser)
											 {
												 
												  foreach($gwd_info as $key=>$val)
												  {
													  //删除购物车
													 // $t_img=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$gwd_info[$key]['goods_id']."");
													  $db->query("delete from " . $ecs->table('order_goods_go') . "  WHERE rec_id = ".$val['rec_id']." and user_id='".$user_id."'"); 
													  
													  $db->query("delete from " . $ecs->table('order_goods_go_jp') . "  WHERE card_id = ".$val['rec_id']." "); 
												  }
												 
												  $results = array('result'=>'10000', 'data'=>'订单生成成功！','msg'=>$order_sn);
										  
												  exit($json->encode($results));	
											 }
											 else
											 {
												 $results = array('result'=>'40002', 'data'=>'插入订单产品表失败！');
										  
												  exit($json->encode($results));	
											 }
									  }
									  
									  else
									   {
										    $results = array('result'=>'40001', 'data'=>'插入订单表失败！');
									
											exit($json->encode($results));	
									   }			
							}
			  
			  }
	}

/**
 * 取得订单总金额
 * @param   int     $order_id   订单id
 * @param   bool    $include_gift   是否包括赠品
 * @return  float   订单总金额
 */
function order_amount($order_id, $include_gift = true)
{
    $sql = "SELECT SUM(goods_price * goods_number) " .
            "FROM " . $GLOBALS['ecs']->table('order_goods') .
            " WHERE order_id = '$order_id'";
    if (!$include_gift)
    {
        $sql .= " AND is_gift = 0";
    }

    return floatval($GLOBALS['db']->getOne($sql));
}


//生成随机订单号
function get_order_sn()
{
	return date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
}

/**
 * 取得已安装的配送方式
 * @return  array   已安装的配送方式
 */
function shipping_list()
{
    $sql = 'SELECT shipping_id, shipping_name ' .
            'FROM ' . $GLOBALS['ecs']->table('shipping') .
            ' WHERE enabled = 1';

    return $GLOBALS['db']->getAll($sql);
}


/**
 * 取得已安装的支付方式列表
 * @return  array   已安装的配送方式列表
 */
function payment_list()
{
    $sql = 'SELECT pay_id, pay_name ' .
            'FROM ' . $GLOBALS['ecs']->table('touch_payment') .
            ' WHERE enabled = 1';

    return $GLOBALS['db']->getAll($sql);
}

/**
 * 取得支付方式信息
 * @param   int     $pay_id     支付方式id
 * @return  array   支付方式信息
 */
function payment_info($pay_id)
{
    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('touch_payment') .
            " WHERE pay_id = '$pay_id' AND enabled = 1";

    return $GLOBALS['db']->getRow($sql);
}



/**
 * 获得指定分类的所有上级分类
 *
 * @access  public
 * @param   integer $cat    分类编号
 * @return  array
 */
function get_parent_cats($cat)
{
    if ($cat == 0)
    {
        return array();
    }

    $arr = $GLOBALS['db']->GetAll('SELECT cat_id, cat_name, parent_id FROM ' . $GLOBALS['ecs']->table('category'));

    if (empty($arr))
    {
        return array();
    }

    $index = 0;
    $cats  = array();

    while (1)
    {
        foreach ($arr AS $row)
        {
            if ($cat == $row['cat_id'])
            {
                $cat = $row['parent_id'];

                $cats[$index]['cat_id']   = $row['cat_id'];
                $cats[$index]['cat_name'] = $row['cat_name'];

                $index++;
                break;
            }
        }

        if ($index == 0 || $cat == 0)
        {
            break;
        }
    }

    return $cats;
}


?>