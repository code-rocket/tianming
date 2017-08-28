<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;


//商品详情api
    $p_id=intval($_POST['p_id']);
	
	$action=$_POST['action'];
	
	if(empty($p_id))
	{
		  $results = array('result'=>'40004', 'data'=>'没有传入产品ID');
		  exit($json->encode($results));
    }
	
	
	if(empty($action))
	{
		  $results = array('result'=>'40003', 'data'=>'动作不存在');
		  exit($json->encode($results));
    }
	
	
	if($action=="pro_info")//产品基本信息
	{
			
			
			 $nows=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$p_id);
			 
			 $pic_ce=$db->GetAll("SELECT *    from  " . $ecs->table('goods_gallery') . " where goods_id=".$p_id);
			 $pic_cee=array();
			 foreach($pic_ce as $key=>$val)
			 {
				$pic_cee[]=array('img_id'=>$val['img_id'],'thumb_url'=>$val['img_url']); 
			 }
			 
			
			 
			 $comments=$db->GetOne("SELECT count(*) from  " . $ecs->table('comment') . " where id_value='".$p_id."' and comment_type=0 and status=1");
			 
			 $token=$_POST['token'];
		
		     $user_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");
			 if(!empty($user_id))
			 {
			    $collect_goods=$db->GetOne("SELECT count(*) from  " . $ecs->table('collect_goods') . " where goods_id='".$p_id."' and user_id='".$user_id."'");
				if(empty($collect_goods))
				{
					$collect_goods="0";
				}
				else
				{
					$collect_goods="1";
				}
			 }
			 else
			 {
				    $collect_goods="0";
			 }
			 
			 
			 
			 
			  $cat_arr = get_parent_cats($nows['cat_id']);

			   foreach ($cat_arr as $val)
			  {
			  $goods['topcat_id']=$val['cat_id'];
			  $goods['topcat_name']=$val['cat_name'];
			  }
			
			 if($goods['topcat_id']==45)
			 {
				 $or_is="1";    //镜片
				 
			 }
			 elseif($goods['topcat_id']==3)
			 {
				 $or_is="2";    //太阳镜
				 
			 }
			 else
			 {
				 $or_is="0"; //普通
			 }
			 
			 if($comments!=0)
			 {
				 $good_comments=$db->GetOne("SELECT count(*) from  " . $ecs->table('comment') . " where id_value='".$p_id."' and comment_rank in(4,5) and comment_type=0 and status=1");
			     $good_lv=(sprintf("%.2f",($good_comments/$comments))*100).'%';
			 }
			 elseif($comments==0)
			 {
				 $comments==0;
				 $good_lv=0.00.'%';
			 }
			 
			      $get_info4=$db->GetOne("select * from `ecs_goods_activity`  where goods_id ='".$p_id."'");
				  
				  if(empty($get_info4))
				  {
					  $tuangou="0";
					  $tuan_id="0";
				  }
				  else
				  {
					  $tuangou="1";
					  $tuan_id=$get_info4['act_id'];
				  }

             $info=array();
			 
			
			$get_info3=$db->GetOne("SELECT count(*) from  `ecs_order_goods` where goods_id='".$val['goods_id']."' and order_id in(select order_id from `ecs_order_info` where order_status=2)");
				 
				 $info[]=array('goods_name'=>$nows['goods_name'],'shop_price'=>$nows['shop_price'],'market_price'=>$nows['market_price'],'goods_img'=>$nows['goods_img'],'goods_desc'=>$nows['goods_brief'],'xiao'=>$get_info3,'comment'=>$comments,'good_lv'=>$good_lv,'is_tuan'=>$tuangou,'tuan_id'=>$tuan_id,'collect_goods'=>$collect_goods,'pic_ce'=>$pic_cee,'or_is'=>$or_is);
			 
			$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
			exit($json->encode($results));		 
	}

   
   //查询评论列表
   if($action=="comment")
   {
	 
       
	          if(empty($p_id))
			  {
				  $results = array('result'=>'40004', 'data'=>'没有传入产品ID');
				  exit($json->encode($results));
		  
			  }
			  else
			  {
				  
				 $add_look=$_POST['add_look'];
				 if($add_look=="look")
				 {
					   $list=$_POST['list'];
					   if(empty($list))
					   {
						   $where="";
					   }
					   if($list=="good")
					   {
						   $where="and comment_rank in(4,5)";
					   }
					   if($list=="middle")
					   {
						   $where="and comment_rank in(2,3)";
					   }
					   if($list=="poor")
					   {
						   $where="and comment_rank in(1)";
					   }
					   $info=$db->GetAll("SELECT * from  `ecs_comment` where id_value='".$p_id."'and comment_type=0 and status=1 ".$where." order by  add_time desc");
					   
					   $info1=array();
					   if($info)
					   {
						   foreach($info as $key=>$val)
						   {
							   $times=date('Y-m-d H:i:s',$info[$key]['add_time']+8*60*60);
							   if(empty($info[$key]['user_name']))
							   {
								   $t_name="匿名用户";
							   }
							   else
							   {
								   $t_name=$info[$key]['user_name'];
							   }
							   $info1[]=array('content'=>$info[$key]['content'],'comment_rank'=>$info[$key]['comment_rank'],'user_name'=>$t_name,'add_time'=>$times);
						   }
						   $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info1);
					   }
					   else
					   {
						   $results = array('result'=>'40002', 'data'=>'查询成功，但没有评论');
					   }
					   exit($json->encode($results));
				 }
				 
				 elseif($add_look=="add")
				 {
					 
					   $token=$_POST['token'];
					   //$user_name=$_POST['user_name'];
					   $p_id=$_POST['p_id'];
					   //$email=$_POST['email'];
					   $comment_rank=$_POST['comment_rank'];
					   $content=$_POST['content'];
					   
					  
					   $addtime=time();
					   
					   $ip_address="127.0.0.1";
					   
					   $user_id=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where question='".$token."'");
					   if(empty($token))
						{
							$results= array('result'=>"40004",'data'=>'没有登录');
							exit($json->encode($results));
						}
						else
						{

							    $mmmm=$db->query("INSERT INTO `ecs_comment`(user_id,email,comment_rank,content,user_name,comment_type,id_value,add_time,ip_address,status,parent_id,art_id,order_id) VALUES ('".$user_id['user_id']."','".$$user_id['email']."','".$comment_rank."','".$content."','".$user_id['user_name']."',0,'".$p_id."','".$addtime."','".$ip_address."',0,0,0,0)");
							   
							  
								if(!empty($mmmm))
								{
								    $results = array('result'=>'10000', 'data'=>'评论成功');
								    exit($json->encode($results));
								}
								else
								{
									$results = array('result'=>'40002', 'data'=>'评论失败');
									exit($json->encode($results));
								}
						 }
					  }
			  }
   }
   //查询商品大图
   if($action=="bigimg")
   {
       
	          if(empty($p_id))
			  {
				  $results = array('result'=>'40004', 'data'=>'没有传入商品ID');
				  exit($json->encode($results));
		  
			  }
			  else
			  {
				 $info=$db->GetAll("SELECT * from  " . $ecs->table('goods_gallery') . " where goods_id=".$p_id);
				 if($info)
				 {
					 $res=array();
					 foreach($info as $key =>$val)
					 {
						$info1[]=array('imgurl'=>$info[$key]['img_url']);
					 }
					 $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info1);
				 }
				 else
				 {
					 $results = array('result'=>'40002', 'data'=>'查询失败，没有大图数据');
				 }
	              exit($json->encode($results));
			  }	
   }
   
   
    //查询商品详细描述
   if($action=="content")
   {
       
	          if(empty($p_id))
			  {
				  $results = array('result'=>'40004', 'data'=>'没有传入商品ID');
				  exit($json->encode($results));
		  
			  }
			  else
			  {
				 $info=$db->GetAll("SELECT * from  " . $ecs->table('goods_gallery') . " where goods_id=".$p_id);
				 if($info)
				 {
					 $res=array();
					 foreach($info as $key =>$val)
					 {
						$info1[]=array('goods_desc'=>$info[$key]['goods_desc']);
					 }
					     $wz="http://121.41.56.121:8080/api/g_info.php?g_id=".$p_id;
						 $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$wz);
				 }
				 else
				 {
					 $results = array('result'=>'40002', 'data'=>'查询失败，没有数据');
				 }
	              exit($json->encode($results));
			  }
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