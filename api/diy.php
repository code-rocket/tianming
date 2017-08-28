<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
    
$action=$_POST['action'];
if(empty($action))
{
	       $results = array('result'=>'40003', 'data'=>'动作为空');
		  exit($json->encode($results));

}
elseif($action=="jk")
{
	$info=jk();
	$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
	exit($json->encode($results));
}
elseif($action=="jt")
{
	$info=jt();
	$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
	exit($json->encode($results));
}
elseif($action=="jp")
{
	$info=jp();
	$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
	exit($json->encode($results));
}

elseif($action=="zuhe")
{
	$info=get_zuhe_allprice();
	$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
	exit($json->encode($results));
}



elseif($action=="pro_canshu")
{
	$goods_id=$_POST['goods_id'];
	$info=get_diy_goods($goods_id);
	
	$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
	exit($json->encode($results));
}



elseif($action=="jk_jt_jp")
{
	//$goods_id=$_POST['goods_id'];
	$info=jk_jt_jp();
	
	$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
	exit($json->encode($results));
}


elseif($action=="get_jt_diy")
{
	
	$jk_id=$_POST['jk_id'];
	$info=t_jk_get_goods($jk_id);
	if(!empty($info))
	{
	    $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
	}
	else
	{
		$results = array('result'=>'40000', 'data'=>'数据为空');
	}
	exit($json->encode($results));
}



elseif($action=="get_jk_jt_diy")
{
	
	$jk_id=$_POST['jk_id'];
	$jt_id=$_POST['jt_id'];
	$info=t_jk_jt_get_goods($jk_id,$jt_id);
	if(!empty($info))
	{
	    $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info);
	}
	else
	{
		$results = array('result'=>'40000', 'data'=>'数据为空');
	}
	exit($json->encode($results));
}


elseif($action=="get_yzm")
{
	//echo GetRandStr(6);
	
	        require 'sms_api/Util.php';
	
	        $username = 'tianming';
			
			date_default_timezone_set('Asia/Shanghai');
			
			$tkey = date('YmdHis', time());

			$password = 'I8ceJFnx';
			
			$password = strtolower(md5(strtolower(md5($password)) . $tkey));
			
			$mobile = $_POST['tel'];
			
			$sms_code=GetRandStr(6);
			$content = "您的注册验证码为:".$sms_code;
			
			
			//echo $content;die;
			
			$productid = 676767; //887362 订单、通知、祝福信息专用 //676767 验证码专用
			$xh = '';
			$data = array(
				"username" => $username,
				"password" => $password,
				"tkey" => $tkey,
				"mobile" => $mobile,
				"content" => $content,
				"productid" => $productid,
				"xh" => $xh
			);
			$url = "http://www.ztsms.cn/sendNSms.do";
			$result = Util::request($url, 'Get',$data);
			
			//print_r($result);die;
			//echo $result;	
			
			
		   $results = array('result'=>'10000', 'data'=>'成功','msg'=>$sms_code);
	       exit($json->encode($results));
}


function GetRandStr($len) 
{ 
    $chars = array( 
        "0", "1", "2","3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 





/**
 * 获得指定商品的diy
 *
 * @access  public
 * @param   integer $goods_id
 * @return  array
 */
function get_diy_goods($goods_id)
{
    $sql = "SELECT gd.diy_goods_id,g.goods_thumb, g.goods_name, gd.price " .
        "FROM " . $GLOBALS['ecs']->table('goods_diy') . " AS gd, " .
        $GLOBALS['ecs']->table('goods') . " AS g " .
        "WHERE gd.goods_id = '$goods_id' " .
        "AND gd.diy_goods_id = g.goods_id ";

    $row = $GLOBALS['db']->getAll($sql);

	foreach($row as $key=>$val)
	 {
	    $infos=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') ." where goods_id =(".$val['diy_goods_id'].")");
	    $m_info[]=array('diy_goods_id'=>$val['diy_goods_id'],'goods_thumb'=>$val['goods_thumb'],'goods_name'=>$val['goods_name'],'price'=>$val['price'],'colors'=>$infos);
	 }
	
   
    return $m_info;
}


function t_jk_get_goods($jk_id)
{

	 $info1=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_diy') ." where diy_goods_id='".$jk_id."'");
	 foreach($info1 as $key=>$val)
	 {
		 $info2[]=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods_diy') ." where goods_id='".$val['goods_id']."' and type=131");
		 
		 //$info2=array_unique($info2);
		 foreach($info2 as $key1=>$val1)
		 {
			 if(($val1)!=false)
			 {
			 $t_info3 =$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods_diy') ." where goods_id='".$val1['goods_id']."' and type=45");
			    if($t_info3!=false)
			    $info3[]=$t_info3;
			 }
		 }
		 
	 }
	 array_unique($info3);
	 
	 return $info3[0]['goods_id'];
}



function t_jk_jt_get_goods($jk_id,$jt_id)
{

	 $info1=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_diy') ." where diy_goods_id='".$jk_id."'");
	 foreach($info1 as $key=>$val)
	 {
		 $info2[]=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods_diy') ." where diy_goods_id='".$jt_id."' and goods_id='".$val['goods_id']."' and type=131");
		 
		 //$info2=array_unique($info2);
		 foreach($info2 as $key1=>$val1)
		 {
			 if(($val1)!=false)
			 {
			 $t_info3 =$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods_diy') ." where goods_id='".$val1['goods_id']."' and type=45");
			    if($t_info3!=false)
			    $info3[]=$t_info3;
			 }
		 }
		 
	 }
	 array_unique($info3);
	 
	 return $info3[0]['goods_id'];
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
	 
	 $info=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where is_delete=0 and cat_id in(".$c_id.")");
	 foreach($info as $key=>$val)
	 {
	    $infos=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') ." where goods_id =(".$val['goods_id'].")");
	    $m_info[]=array('diy_goods_id'=>$val['goods_id'],'goods_thumb'=>$val['goods_thumb'],'goods_name'=>$val['goods_name'],'price'=>$val['shop_price'],'colors'=>$infos);
	 }
	 
	 return $m_info;
}

//镜腿显示


function jt()
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
	 
	 $info=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where is_delete=0 and cat_id in(".$c_id.")");
	 foreach($info as $key=>$val)
	 {
	    $infos=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') ." where goods_id =(".$val['goods_id'].")");
	    $m_info[]=array('diy_goods_id'=>$val['goods_id'],'goods_thumb'=>$val['goods_thumb'],'goods_name'=>$val['goods_name'],'price'=>$val['shop_price'],'colors'=>$infos);
	 }
	 
	 return $m_info;
}



//镜片显示


function jp()
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
	 
	 $info=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where is_delete=0 and cat_id in(".$c_id.")");
	 foreach($info as $key=>$val)
	 {
	    $infos=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') ." where goods_id =(".$val['goods_id'].")");
	    $m_info[]=array('diy_goods_id'=>$val['goods_id'],'goods_thumb'=>$val['goods_thumb'],'goods_name'=>$val['goods_name'],'price'=>$val['shop_price'],'colors'=>$infos);
	 }
	 
	 return $m_info;
}



function jk_jt_jp()
{
	$price_jk=t_diys_kuang();
	$price_jt=t_diys_kuang1();
	$price_jp=t_diys_kuang2();
	
	$jk_id=$price_jk[0]['goods_id'];
	$jt_id=$price_jt[0]['goods_id'];
	$jp_id=$price_jp[0]['goods_id'];
	
	$info=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where goods_id =".$jk_id."");
	$info1=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where goods_id =".$jt_id."");
	$info2=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where goods_id =".$jp_id."");
	
	$allprice=$info['shop_price']+$info1['shop_price']+$info2['shop_price'];
	
	return $allprice;
}




function get_zuhe()
{
    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('goods_activity') .
        " WHERE act_type=4";
     $row=$GLOBALS['db']->getAll($sql);
	 

	 $info=array();
	 foreach($row as $key=>$val)
	 {
		$ids=$val['act_id'];
		 $mb[$ids]=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('package_goods') .
        " where package_id='".$val['act_id']."'");
		
		foreach($mb[$ids] as $key1=>$val1)
		{
			$info[$key][$key1]=$GLOBALS['db']->getRow("SELECT goods_id,goods_name,shop_price,goods_thumb FROM " . $GLOBALS['ecs']->table('goods') .
            " where goods_id='".$val1['goods_id']."'");
		}
		
	 }
	return $info;
}


function get_zuhe_allprice()
{
    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('goods_activity') .
        " WHERE act_type=4";
     $res=$GLOBALS['db']->getAll($sql);
	 
	 
	 foreach ($res as $tempkey => $value)
    {
        $subtotal = 0;
        $row = unserialize($value['ext_info']);
        unset($value['ext_info']);
        if ($row)
        {
            foreach ($row as $key=>$val)
            {
                $res[$tempkey][$key] = $val;
            }
        }

        $sql = "SELECT pg.package_id, pg.goods_id, pg.goods_number, pg.admin_id, p.goods_attr, g.goods_sn, g.goods_name, g.market_price,g.shop_price, g.goods_thumb, IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS rank_price
                FROM " . $GLOBALS['ecs']->table('package_goods') . " AS pg
                    LEFT JOIN ". $GLOBALS['ecs']->table('goods') . " AS g
                        ON g.goods_id = pg.goods_id
                    LEFT JOIN ". $GLOBALS['ecs']->table('products') . " AS p
                        ON p.product_id = pg.product_id
                    LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp
                        ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]'
                WHERE pg.package_id = " . $value['act_id']. "
                ORDER BY pg.package_id, pg.goods_id";

        $goods_res = $GLOBALS['db']->getAll($sql);

        foreach($goods_res as $key => $val)
        {
            $goods_id_array[] = $val['goods_id'];
            $goods_res[$key]['goods_thumb']  = get_image_path($val['goods_id'], $val['goods_thumb'], true);
            $goods_res[$key]['market_price'] = price_format($val['market_price']);
			$goods_res[$key]['shop_price'] = price_format($val['shop_price']);
           // $goods_res[$key]['rank_price']   = price_format($val['rank_price']);
           // $subtotal += $val['rank_price'] * $val['goods_number'];
        }

        /* 取商品属性 */
        $sql = "SELECT ga.goods_attr_id, ga.attr_value
                FROM " .$GLOBALS['ecs']->table('goods_attr'). " AS ga, " .$GLOBALS['ecs']->table('attribute'). " AS a
                WHERE a.attr_id = ga.attr_id
                AND a.attr_type = 1
                AND " . db_create_in($goods_id_array, 'goods_id');
        $result_goods_attr = $GLOBALS['db']->getAll($sql);

        $_goods_attr = array();
        foreach ($result_goods_attr as $value)
        {
            $_goods_attr[$value['goods_attr_id']] = $value['attr_value'];
        }

        /* 处理货品 */
        $format = '[%s]';
        foreach($goods_res as $key => $val)
        {
            if ($val['goods_attr'] != '')
            {
                $goods_attr_array = explode('|', $val['goods_attr']);

                $goods_attr = array();
                foreach ($goods_attr_array as $_attr)
                {
                    $goods_attr[] = $_goods_attr[$_attr];
                }

                $goods_res[$key]['goods_attr_str'] = sprintf($format, implode('，', $goods_attr));
            }
        }

        $res[$tempkey]['goods_list']    = $goods_res;
       // $res[$tempkey]['subtotal']      = price_format($subtotal);
      //  $res[$tempkey]['saving']        = price_format(($subtotal - $res[$tempkey]['package_price']));
        $res[$tempkey]['package_price'] = price_format($res[$tempkey]['package_price']);
    }
     
	
	return $res;
	
}




?>