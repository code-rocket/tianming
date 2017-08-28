<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;

   $action=$_POST['action'];
   
   $infos=array();
   if($action=="country")
   {
	   $user_info=$db->GetAll("SELECT * from  " . $ecs->table('region') . " where parent_id=0");
	   foreach($user_info as $key=>$val)
	   {
		   $infos[]=array('region_id'=>$val['region_id'],'region_name'=>$val['region_name']);
	   }
	      $results = array('result'=>'10000', 'data'=>$infos);
		  exit($json->encode($results));
   }
   
   else if($action=="province")
   {
	   $parent_id=$_POST['parent_id'];
	   $user_info=$db->GetAll("SELECT * from  " . $ecs->table('region') . " where parent_id='".$parent_id."'");
	   foreach($user_info as $key=>$val)
	   {
		   $infos[]=array('region_id'=>$val['region_id'],'region_name'=>$val['region_name']);
	   }
	   $results = array('result'=>'10000', 'data'=>$infos);
		  exit($json->encode($results));
   }
   
   else if($action=="city")
   {
	   $parent_id=$_POST['parent_id'];
	   $user_info=$db->GetAll("SELECT * from  " . $ecs->table('region') . " where parent_id='".$parent_id."'");
	   foreach($user_info as $key=>$val)
	   {
		   $infos[]=array('region_id'=>$val['region_id'],'region_name'=>$val['region_name']);
	   }
	   $results = array('result'=>'10000', 'data'=>$infos);
		  exit($json->encode($results));
   }
   
   else if($action=="district")
   {
	   $parent_id=$_POST['parent_id'];
	   $user_info=$db->GetAll("SELECT * from  " . $ecs->table('region') . " where parent_id='".$parent_id."'");
	   foreach($user_info as $key=>$val)
	   {
		   $infos[]=array('region_id'=>$val['region_id'],'region_name'=>$val['region_name']);
	   }
	   $results = array('result'=>'10000', 'data'=>$infos);
		  exit($json->encode($results));
   }
   
   
    else if($action=="address_name")
   {
	   $province=$_POST['province'];
	   $city=$_POST['city'];  
	   $district=$_POST['district'];
	  // print_r($name);
	   $user_info=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_name like '".$province."%' and region_type=1");
	   
	   $user_info1=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_name like '".$city."%' and region_type=2");
	   
	   $user_info2=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_name like '".$district."%' and region_type=3");
       
	   
	  $infos=$user_info['region_id'].','.$user_info1['region_id'].','.$user_info2['region_id'];
	  
	 
	  
	  if($user_info)
	  {
	     $results = array('result'=>'10000', 'data'=>$infos,'msg'=>"成功");
	  }
	  else
	  {
		  $results = array('result'=>'20000', 'data'=>null,'msg'=>"失败");
	  }
	  
		exit($json->encode($results));
   }
   
   
   else if($action=="all")
   {
	     
		 $msg=get_region_tree();

	     $results = array('result'=>'10000', 'data'=>$msg);
		  exit($json->encode($results));
   }
   
   
  /* else if($action=="all1")
   {
	     $user_info=$db->GetAll("SELECT region_id,region_name from  " . $ecs->table('region') . " where parent_id=0");
		 $infos=array();
		 $infos2=array();
		 $infos3=array();
		 $infos4=array();
		 $infos5=array();
		 $user_info1=$db->GetAll("SELECT region_id,region_name from  " . $ecs->table('region') . " where parent_id=1");
		 foreach($user_info1 as $key=>$val)
		 {
		     $infos[$key]=$db->GetAll("SELECT region_id,region_name from  " . $ecs->table('region') . " where parent_id='".$val['region_id']."'");
			 foreach($infos[$key] as $key1=>$val1)
			 {
				   $infos2[$key][$key1]=$db->GetAll("SELECT region_id,region_name from  " . $ecs->table('region') . " where parent_id='".$val1['region_id']."'");  
				   $infos5[]=array('region_id'=>$val1['region_id'],'region_name'=>$val1['region_name'],'son'=>$infos2[$key][$key1]);
			 }
			       
			 $infos4[]=array('region_id'=>$val['region_id'],'region_name'=>$val['region_name']); 
		 }
		 print_r($infos4);die;
	     
		 $results = array('result'=>'10000', 'data'=>$infos4);
		 exit($json->encode($results));
   }*/
   
   
   
    else if($action=="all1")
   {
	   //echo  get_region_tree1();die;
	   print_r(get_region_tree1());
   }
   
   
   
   else
   {
	     $results = array('result'=>'40004', 'data'=>'请输入动作');
		  exit($json->encode($results));
   }

   
   
  function get_region_tree1()
  {
	  $sql='SELECT region_id,region_name FROM ' . $GLOBALS['ecs']->table('region') . " WHERE parent_id = 1";;
	  $mb=$GLOBALS['db']->getAll($sql);
	  return $mb;
  } 
   
   
   
      /**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @access  public
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
function get_region_tree($region_id = 0)
{
    if ($region_id > 0)
    {
        $sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('region') . " WHERE region_id = '$region_id'";
        $parent_id = $GLOBALS['db']->getOne($sql);
    }
    else
    {
        $parent_id = 0;
    }

    /*
     判断当前分类中全是是否是底级分类，
     如果是取出底级分类上级分类，
     如果不是取当前分类及其下的子分类
    */

    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('region') . " WHERE parent_id = '$parent_id'";
	
    if ($GLOBALS['db']->getOne($sql) || $parent_id == 0)
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT region_id,region_name ,parent_id,is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('region') .
                "WHERE parent_id = '$parent_id' ORDER BY is_top ASC, region_id ASC";

        $res = $GLOBALS['db']->getAll($sql);

        foreach ($res AS $row)
        {
            if ($row['is_show']=="0")
            {
				
                $region_arr[$row['region_id']]['id']   = $row['region_id'];
                $region_arr[$row['region_id']]['name'] = $row['region_name'];
                if (isset($row['region_id']) != NULL)
                {
                    $region_arr[$row['region_id']]['region_id'] = get_child_tree($row['region_id']);
                }
            }
        }
    }
    if(isset($region_arr))
    {
        return $region_arr;
    }
}

function get_child_tree($tree_id = 0)
{
	
    $three_arr = array();
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('region') . " WHERE parent_id = '$tree_id' ";
	

    if ($GLOBALS['db']->getOne($sql) || $tree_id == 0)
    {
        $child_sql = 'SELECT region_id, region_name, parent_id, is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('region') .
                "WHERE parent_id = '$tree_id' ORDER BY is_top ASC, region_id ASC";
        $res = $GLOBALS['db']->getAll($child_sql);
        foreach ($res AS $row)
        {
            if ($row['is_show'])
               $three_arr[$row['region_id']]['id']   = $row['region_id'];
               $three_arr[$row['region_id']]['name'] = $row['region_name'];
             
               if (isset($row['region_id']) != NULL)
			   {
				   $three_arr[$row['region_id']]['region_id'] = get_child_tree($row['region_id']);
			   }
        }
    }
    return $three_arr;
}
   
   
   

?>