<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;


    $token=$_POST['token'];
	$user_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");
   if (empty($user_id))
    {
      $results = array('result'=>'40004', 'data'=>'查询失败没有登录');
      exit($json->encode($results));
    }
	else
	{
		$one=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id='".$user_id."'");
		$all_points=$one['pay_points'];
		$two=$db->GetAll("SELECT * from  " . $ecs->table('account_log') . " where user_id=".$user_id);
		
		$bonus=$db->GetOne("SELECT count(*) from  " . $ecs->table('user_bonus') . " where user_id=".$user_id);
		
		$info = array();
		if(!empty($two))
		{
		  foreach ($two as $key=>$val)
		  {

			 $info[]=array('id' =>$two[$key]['log_id'] , 'change_desc'=>$two[$key]['change_desc'], 'pay_points'=>$two[$key]['pay_points']);
		  }
		}
		
		
		$results = array('result'=>'10000', 'data'=>'查询成功','all_points'=>$all_points,'bonus'=>$bonus,'msg'=>$info);
		exit($json->encode($results));
	}


?>