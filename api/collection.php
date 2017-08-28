<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
    session_start();  
	$action=trim($_POST['action']);
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
			  
			  //收藏
			  else
			  {
						 
						  //添加到收藏
						  if($action=="add_collection")
							{
									
									$goods_id=$_POST['goods_id']; 
									if(empty($goods_id))
									{
										 $results = array('result'=>'40002', 'data'=>'请输入goods_id');
										 exit($json->encode($results));
									}
									$is_no=$db->GetOne("SELECT goods_id from  " . $ecs->table('goods') . " where goods_id='".$goods_id."'"); 
									if(empty($is_no))
									{
										 $results = array('result'=>'40004', 'data'=>'产品ID不存在');
										 exit($json->encode($results));
									}
									else
									{
										$add_time=time();
										//查询是否收藏
										$is_no_coolle=$db->GetOne("SELECT goods_id from  " . $ecs->table('collect_goods') . " where goods_id='".$goods_id."' and user_id='".$user_id."'"); 
										
										if(!empty($is_no_coolle))
										{
											$results = array('result'=>'40003', 'data'=>'收藏失败，已经收藏过了');
											exit($json->encode($results));
										}
										else
										{
											  $upda_inser=$db->query("INSERT INTO " . $ecs->table('collect_goods') . "(user_id,goods_id,add_time) VALUES ('".$user_id."','".$goods_id."','".$add_time."')");
											  if($upda_inser)
											  {
												  $results = array('result'=>'10000', 'data'=>'收藏成功');
											  }
											  else
											  {
												  $results = array('result'=>'40001', 'data'=>'收藏失败');
											  }
											  exit($json->encode($results));
										}
									}
			
							}
						  
						  
						  
						  
						  
						  
						   //删除收藏
						  if($action=="delete_collection")
							{
									 
									 $rec_id=$_POST['rec_id'];
									
									 $is_no=$db->GetRow("SELECT * from  " . $ecs->table('collect_goods') . " where user_id=".$user_id." and rec_id='".$rec_id."'");
									  
									  
									  if(empty($is_no))
									  {
										  
										 $results = array('result'=>'40004', 'data'=>'删除失败收藏列表没有该商品');
										 exit($json->encode($results));
										  
									  }
									  else
									  {
										  $upda_inser=$db->query("delete from " . $ecs->table('collect_goods') . " WHERE user_id = '" . $user_id . "' and rec_id = '" . $rec_id . "'");
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
						  //删除收藏
						   else
						   {
							         $results = array('result'=>'40003', 'data'=>'查询失败没有该动作');
									 exit($json->encode($results));	
						   }
						  
						  
						  
						  
						  
						 
							
							
							
								
									  
						  
						  
			  }
	}
	


?>