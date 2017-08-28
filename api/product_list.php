<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;

   $two=$db->getAll("SELECT * from  " . $ecs->table('category') . " where parent_id=0 and is_show=1");
   $info = array();
   $action=$_POST['action'];
   if(empty($action))
   {
         $results = array('result'=>'40004', 'data'=>'没有执行动作');
		 exit($json->encode($results));
   }
   else
   {
			 if($action=="big_list")
			 {
				  if(!empty($two))
					  {
						 $inss=array();
						 $nos=array();
						foreach ($two as $key=>$val)
						{
						   
						   $ins=$db->GetRow("SELECT * from  " . $ecs->table('touch_category') . " where cat_id=".$two[$key]['cat_id']);
						   
						   $inss[$key]=$db->GetAll("SELECT cat_id , cat_name from  " . $ecs->table('category') . " where parent_id=".$two[$key]['cat_id']);
						   
						   
						   $info[]=array('id' =>$two[$key]['cat_id'] , 'cat_name'=>$two[$key]['cat_name'], 'cat_image'=>$ins['cat_image'],'son'=>$inss[$key]);
						   
						}
						$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
						exit($json->encode($results));	
			  
					  }
					  else
					  {
						  $results = array('result'=>'40001', 'data'=>'查询失败,没有数据');
						  exit($json->encode($results));
					  }
			 }
			 if($action=="son_list")
			 {
				
				 $son_id=$_POST['son_id'];
				 $mb=array();
				 $two=$db->getAll("SELECT * from  " . $ecs->table('category') . " where parent_id='".$son_id."'");
				 foreach($two as $key=>$val)
				 {
					 $mb[]=array('id'=>$val['cat_id'],'name'=>$val['cat_name']);
			     }
				 if($mb)
				 {
					 $results = array('result'=>'10000', 'data'=>'成功','msg'=>$mb);
				     exit($json->encode($results));
				 }
				 else
				 {
					 $results = array('result'=>'40001', 'data'=>'查询失败没数据');
				     exit($json->encode($results));
				 }
				 
				
			 }
			 
			 if($action=="pro_list")
			 {
					$list_id=$_POST['list_id'];
					
					
					$order1=trim($_POST['order1']);
					if(empty($order1))
					{
						
						$order="order by add_time  desc";
					}
					else
					{
						  if($order1=="click")
						  {
							  $order="order by last_update desc";
							 
						  }
						  if($order1=="price")
						  {
							  $order="order by shop_price desc";
						  }
						  
						  if($order1=="hot_goods")
						  {
							  $order="order by click_count desc";
						  }
						  
					}
					
					if(empty($list_id))
					{
						 $results = array('result'=>'40003', 'data'=>'查询失败,list_id为空');
						 exit($json->encode($results));
					}
					else
					{
						$inss=$db->GetRow("SELECT * from  " . $ecs->table('category') . " where cat_id=".$list_id);
						if(empty($inss))
						{
							
							$results = array('result'=>'40001', 'data'=>'查询失败,没有找到数据');
						    exit($json->encode($results));
						}
						else
						{
							
							$where="";
							
							if($inss['parent_id']==0)//大类
							{
								
								$insss=$db->GetAll("SELECT * from  " . $ecs->table('category') . " where parent_id=".$inss['cat_id']);
								
								foreach($insss as $key=>$val)
								{
									$lz.=$insss[$key]['cat_id'].',';
								}
								$lz=substr($lz,0,-1);
								$where="and cat_id in(".$lz.")";
							}
							else
							{
								$where="and cat_id='".$inss['cat_id']."'";
							}
							
							$get_info=$db->GetAll("SELECT * from  " . $ecs->table('goods') . " where 1=1 ".$where." ".$order."");
							
							
							$end_info=array();
							$tinfo=array();
							foreach($get_info as $key=>$val)
							{
								$get_info2=$db->GetOne("SELECT count(*) from  `ecs_collect_goods` where goods_id='".$val['goods_id']."'");
				                $get_info3=$db->GetOne("SELECT count(*) from  `ecs_order_goods` where goods_id='".$val['goods_id']."' and order_id in(select order_id from `ecs_order_info` where order_status=2)");
								$get_info4=$db->GetOne("select * from `ecs_goods_activity`  where goods_id ='".$val['goods_id']."'");
				  
								if(empty($get_info4))
								{
									$tuangou="0";
								}
								else
								{
									$tuangou="1";
								}
								
								
								$tinfo[]=array('id'=>$get_info[$key]['goods_id'],'img'=>$get_info[$key]['goods_thumb'],'goods_name'=>$get_info[$key]['goods_name'],'market_price'=>$get_info[$key]['market_price'],'shop_price'=>$get_info[$key]['shop_price'],'like_num'=>$get_info2,'buy_num'=>$get_info3);
								//$end_info[]=array('img_url'=>$img_info['cat_image'],'goods_name'=>$get_info[$key]['goods_name'],'market_price'=>$get_info[$key]['market_price'],'shop_price'=>$get_info[$key]['shop_price'],'click_count'=>$get_info[$key]['click_count']);
							}
							$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$tinfo);
						    exit($json->encode($results));
						}
						
					}
			  }
			  
			  
			  //筛选
			  if($action=="screen")
			  {
				   $msg=get_categories_tree();
				   if(empty($msg))
				   {
					   $results = array('result'=>'40000', 'data'=>'查询失败，没有分类信息');
				   }
				   else
				   {
			     	   $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$msg);
				   }
				   exit($json->encode($results));
			  }
			  
			  if($action=="screen1")
			  {
				   $get_info=$db->GetAll("SELECT * from  " . $ecs->table('brand') . " where is_show=1");
				   $get_info1=array();
				   
				   foreach($get_info as $key=>$val)
				   {
					   $get_info1[]=array('brand_id'=>$val['brand_id'],'brand_name'=>$val['brand_name']);
				   }
				   $msg=get_categories_tree();
				   if(empty($msg))
				   {
					   $results = array('result'=>'40000', 'data'=>'查询失败，没有分类信息');
				   }
				   else
				   {
			     	   $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$msg);
				   }
				   exit($json->encode($results));
			  }
			 
   }
   

   
   /**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @access  public
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
function get_categories_tree($cat_id = 0)
{
    if ($cat_id > 0)
    {
        $sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$cat_id'";
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
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$parent_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $parent_id == 0)
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT cat_id,cat_name ,parent_id,is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";

        $res = $GLOBALS['db']->getAll($sql);

        foreach ($res AS $row)
        {
            if ($row['is_show'])
            {
                $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
                $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

                if (isset($row['cat_id']) != NULL)
                {
                    $cat_arr[$row['cat_id']]['cat_id'] = get_child_tree($row['cat_id']);
                }
            }
        }
    }
    if(isset($cat_arr))
    {
        return $cat_arr;
    }
}

function get_child_tree($tree_id = 0)
{
    $three_arr = array();
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$tree_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $tree_id == 0)
    {
        $child_sql = 'SELECT cat_id, cat_name, parent_id, is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$tree_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
        $res = $GLOBALS['db']->getAll($child_sql);
        foreach ($res AS $row)
        {
            if ($row['is_show'])
               $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
               $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
               $three_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

               if (isset($row['cat_id']) != NULL)
			   {
				   $three_arr[$row['cat_id']]['cat_id'] = get_child_tree($row['cat_id']);
			   }
        }
    }
    return $three_arr;
}
	    
?>