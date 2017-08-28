<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
//预约门店


  $token=$_POST['token'];
  $u_id=$db->GetOne("SELECT * from  " . $ecs->table('users') . " where question='".$token."'");
  $a=$_POST['a'];
  if(empty($token))
  {
	  $results= array('result'=>"40004",'data'=>'用户未登陆');
	  exit($json->encode($results));
  }
  else
  {
	 
	  //获取门店
	  if(empty($a))
	  {
		  $results= array('result'=>"40001",'data'=>'未执行查询动作');
		  exit($json->encode($results));
	  }
	  else
	  {
		  if($a=="mendian")
		  {
			 
			  $one=$db->GetAll("SELECT * from  " . $ecs->table('suppliers') . "");
			  
			  $info=array();
			  foreach($one as $key =>$val)
			  {
				  $info[]=array('id'=>$one[$key]['suppliers_id'],'suppliers_name'=>$one[$key]['suppliers_name']);
			  }
			  $results= array('result'=>"10000",'data'=>'查询成功','msg'=>$info);
			  exit($json->encode($results));
		  }
		  
		   elseif($a=="t_city")
		   {
			   $one=$db->GetAll("SELECT * from  " . $ecs->table('region') . " where  region_id in(select city from  ecs_suppliers)");
			   $info=array();
			   foreach($one as $key =>$val)
			  {
				  $info[]=array('region_id'=>$one[$key]['region_id'],'region_name'=>$one[$key]['region_name']);
			  }
			   $results= array('result'=>"10000",'data'=>'查询成功','msg'=>$info);
			   exit($json->encode($results));
		   }
		   
		    elseif($a=="hot_city")
		   {
			   $one=$db->GetAll("SELECT * from  " . $ecs->table('region') . " where is_show=1");
			   $info=array();
			   foreach($one as $key =>$val)
			  {
				  $info[]=array('region_id'=>$one[$key]['region_id'],'region_name'=>$val['region_name']);
			  }
			   $results= array('result'=>"10000",'data'=>'查询成功','msg'=>$info);
			   exit($json->encode($results));
		   }
		   
		   
		    elseif($a=="suppliers")
		   {
			   
			   $region_id=$_POST['region_id'];
			   $one=$db->GetAll("SELECT * from  " . $ecs->table('suppliers') . " where city='".$region_id."'");
			   $info=array();
			   foreach($one as $key =>$val)
			  {
				  $info[]=array('id'=>$one[$key]['suppliers_id'],'suppliers_name'=>$one[$key]['suppliers_name']);
			  }
			  $results= array('result'=>"10000",'data'=>'查询成功','msg'=>$info);
			  exit($json->encode($results));
		   }
		   
		   
		   
		  
		   elseif($a=="t_suppliers")
		   {
			   $region_id=$_POST['region_id'];
			   $one=$db->GetAll("SELECT * from  " . $ecs->table('suppliers') . " where city='".$region_id."'");
			   $info=array();
			   foreach($one as $key =>$val)
			  {
				   $info[]=array('id'=>$one[$key]['suppliers_id'],'suppliers_name'=>$one[$key]['suppliers_name']);
			  }
			   $results= array('result'=>"10000",'data'=>'查询成功','msg'=>$info);
			   exit($json->encode($results));
		   }
		  
		   
		  elseif($a=="tijiao")
		  {   
		      //提交预约
		      $suppliers_id=$_POST['suppliers_id'];
			  $tel=$_POST['tel'];
			  $content=$_POST['content'];
			  $posttime=time();
			  
			  
			  
			  $ones=$db->GetRow("SELECT * from  " . $ecs->table('appointment') . " where suppliers_id='".$suppliers_id."' and user_id='".$u_id."'");
			  if($ones)
			  {
				  $results = array('result'=>'40020', 'data'=>'预约失败,用户已经预约过该门店了'); 
				  exit($json->encode($results));
			  }
			  else
			  {   

					 $sql = "INSERT INTO `ecs_appointment`(suppliers_id,user_id,mobile_phone,content,reg_time) VALUES ('".$_POST['suppliers_id']."','".$u_id."','".$_POST['tel']."','".$content."','".$posttime."')";
					 if($db->query($sql))
					 {
						$results = array('result'=>'10000', 'data'=>'预约成功');
						
					 }
					 else
					 {
						 $results = array('result'=>'40002', 'data'=>'预约失败'); 
					 }
					  exit($json->encode($results));
			  }
			  
		  }
	  }
	  
  }
  
?>