<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
  
  $action=$_POST['action'];
 

  if(empty($action))
  {
	      $results = array('result'=>'40004', 'data'=>'没有输入执行动作'); 
	      exit($json->encode($results));
  }
  else
  {		
		
		if($action=="mbbbb")
		{
			$value=$_POST['value'];
			
			$jk_k=jk_k();
			$jk1_t=jk1_t();
			$jk2_p=jk2_p();
			foreach($jk_k as $key=>$val)
			{
				 if($key==0)
				 {
				
				   $k_g_id.=$val['goods_id'];
				 }
				 if($key>0)
				 {
					 $k_g_id.=",".$val['goods_id'];
				 }
			}
			
			
			foreach($jk1_t as $key=>$val)
			{
				 if($key==0)
				 {
				
				   $t_g_id.=$val['goods_id'];
				 }
				 if($key>0)
				 {
					 $t_g_id.=",".$val['goods_id'];
				 }
			}
			
			foreach($jk2_p as $key=>$val)
			{
				 if($key==0)
				 {
				
				   $p_g_id.=$val['goods_id'];
				 }
				 if($key>0)
				 {
					 $p_g_id.=",".$val['goods_id'];
				 }
			}
			
			
			
			
			$row=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('group_goods') ." where goods_id=".$value."");
			foreach($row as $key=>$val)
			{
			     $row1[]=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('group_goods') ." where parent_id=".$val['parent_id']." and goods_id in (".$t_g_id.")");
			   
			}
			print_r($row1);
		}
  }
  
  
  
  
  
  
  
  
  
  
  
  //镜框显示


function jk()
{
     $row=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') ." where parent_id=134");
	 $info=array();
	 foreach($row as $key=>$val)
	 {
		 if($key==0)
		 {
		
		   $c_id.=$val['cat_id'];
	     }
		 if($key>0)
		 {
			 $c_id.=",".$val['cat_id'];
		 }
		  
	 }
	 
	 $m_info=array();
	 
	 $info=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where cat_id in(".$c_id.")");
	 
	 $infos=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') ." where goods_id =(".$info['goods_id'].")");
	 $m_info[]=array('goods_id'=>$info['goods_id'],'goods_thumb'=>$info['goods_thumb'],'goods_name'=>$info['goods_name'],'shop_price'=>$info['shop_price'],'color'=>$infos);
	 
	 return $m_info;
}


function jk_k()
{
     $row=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') ." where parent_id=134");
	 $info=array();
	 foreach($row as $key=>$val)
	 {
		 if($key==0)
		 {
		
		   $c_id.=$val['cat_id'];
	     }
		 if($key>0)
		 {
			 $c_id.=",".$val['cat_id'];
		 }
		 
		  $row1=$GLOBALS['db']->getAll("SELECT goods_id FROM " . $GLOBALS['ecs']->table('goods') ." where cat_id in(".$c_id.")");
		 
		  
	 }
    return  $row1;
	
}


//镜腿显示


function jk1()
{
     $row=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') ." where parent_id=131");
	 $info=array();
	 foreach($row as $key=>$val)
	 {
		 if($key==0)
		 {
		
		   $c_id.=$val['cat_id'];
	     }
		 if($key>0)
		 {
			 $c_id.=",".$val['cat_id'];
		 }
		  
	 }
	 
	 $m_info=array();
	 
	 $info=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where cat_id in(".$c_id.")");
	 
	 $infos=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') ." where goods_id =(".$info['goods_id'].")");
	 $m_info[]=array('goods_id'=>$info['goods_id'],'goods_thumb'=>$info['goods_thumb'],'goods_name'=>$info['goods_name'],'shop_price'=>$info['shop_price'],'color'=>$infos);
	 
	 return $m_info;
}



function jk1_t()
{
     $row=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') ." where parent_id=131");
	 $info=array();
	 foreach($row as $key=>$val)
	 {
		 if($key==0)
		 {
		
		   $c_id.=$val['cat_id'];
	     }
		 if($key>0)
		 {
			 $c_id.=",".$val['cat_id'];
		 }
		 $row1=$GLOBALS['db']->getAll("SELECT goods_id FROM " . $GLOBALS['ecs']->table('goods') ." where cat_id in(".$c_id.")");
		  
	 }
	 return $row1;
}



//镜片显示


function jk2()
{
     $row=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') ." where parent_id=45");
	 $info=array();
	 foreach($row as $key=>$val)
	 {
		 if($key==0)
		 {
		
		   $c_id.=$val['cat_id'];
	     }
		 if($key>0)
		 {
			 $c_id.=",".$val['cat_id'];
		 }
		  
	 }
	 
	 $m_info=array();
	 
	 $info=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where cat_id in(".$c_id.")");
	 
	 $infos=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') ." where goods_id =(".$info['goods_id'].")");
	 $m_info[]=array('goods_id'=>$info['goods_id'],'goods_thumb'=>$info['goods_thumb'],'goods_name'=>$info['goods_name'],'shop_price'=>$info['shop_price'],'color'=>$infos);
	 
	 return $info;
}
  
 
function jk2_p()
{
     $row=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') ." where parent_id=45");
	 $info=array();
	 foreach($row as $key=>$val)
	 {
		 if($key==0)
		 {
		
		   $c_id.=$val['cat_id'];
	     }
		 if($key>0)
		 {
			 $c_id.=",".$val['cat_id'];
		 }
		 
		  $row1=$GLOBALS['db']->getAll("SELECT goods_id FROM " . $GLOBALS['ecs']->table('goods') ." where cat_id in(".$c_id.")"); 
	 }
	 return $row1;
}
  
  
?>