<?php

define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
      
include_once(dirname(__FILE__) .  '/includes/cls_captcha.php');
  /* $mysql_server_name='localhost:3306'; //改成自己的mysql数据库服务器
  $mysql_username='root'; //改成自己的mysql数据库用户名   
  $mysql_password='a02d122dd2'; //改成自己的mysql数据库密码   
   $mysql_database='tianming'; //改成自己的mysql数据库名 


   $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库   
   mysql_query("set names 'utf8'"); //数据库输出编码.   
   mysql_select_db($mysql_database); //打开数据库  */
   
   
   $meth=$_POST['meth'];
   $num=$_POST['num'];
   $x=$_POST['x'];
   $y=$_POST['y'];
   $z=$_POST['z'];
   $where="";
   
   

   if($z!="-1")
   {
	   $where="and cat_id='".$z."'";
   }
   else
   {
	   
	   if($y!="-1")
	   {
		   $sql ="select * from ecs_category where parent_id='".$y."'"; //SQL语句  
		   $result = $db->getAll($sql); //查询
              foreach ($result as $row) {
			   $cat_ids.=$row['cat_id'].',';
			  
		   }
		   $cat_ids = substr($cat_ids,0,strlen($cat_ids)-1); 
		   $where="and cat_id in(".$y.",".$cat_ids.")";
		  
	   }
	   else
	   {
		   if($x!="-1")
		   {
			   $sql ="select * from ecs_category where parent_id='".$x."'"; //SQL语句  
			   $result = $db->getAll($sql); //查询
               foreach ($result as $row) {
				   $cat_ids.=$row['cat_id'].',';
			   }
			   $cat_ids = substr($cat_ids,0,strlen($cat_ids)-1); 
			   
			   $sql1 ="select * from ecs_category where parent_id in (".$cat_ids.")"; //SQL语句 
	
			   $result1 = $db->getAll($sql1); //查询
               foreach ($result as $row1) {
				   $cat_ids1.=$row1['cat_id'].',';
			   }
			   
			   $cat_ids1 = substr($cat_ids1,0,strlen($cat_ids1)-1); 
			   
			   
			  
			   
			   $where="and cat_id in(".$x.",".$cat_ids.",".$cat_ids1.")";
		   }
	   }
   }
   
   //$where="";

   $myrow=$db->getOne("select count(*) from ecs_goods where 1=1 and is_check  IS NOT NULL".$where."",$conn);
  
   $pagesize=9; 
   $numrows=$myrow;   //总数

   $pages=ceil($numrows/$pagesize);  //页数


   
   
   
   if($meth=="add")
   {
	   $num=$num+1;
	   if($num>$pages)
	   {
		   $num=$pages;
	   }
   }
   if($meth=="jian")
   {
	   $num=$num-1;
	   if($num<=0)
	   {
		   $num=1;
	   }
   }
   
   $onum=intval(($num-1)*$pagesize);
   
   if($num==1)
   {
       $sql ="select * from ecs_goods where 1=1 and is_check  IS NOT NULL ".$where."  order by goods_id desc limit 0,9"; //SQL语句  
   }
   else
   {
	   $sql ="select * from ecs_goods where 1=1 and is_check  IS NOT NULL ".$where."  order by goods_id desc limit ".$onum.",".$pagesize.""; //SQL语句  
   }

   $result = $db->getAll($sql);
   
   
   foreach ($result as $row) {

	   $pic=$row['goods_pic'];
	   $id=$row['goods_id'];
	   echo  
	   
	   '<div class="post_box_a">
            	<div class="post_box_a_1">
                	 <a href=javascript:huanjing("../images/upload/'.$pic.'","'.$id.'") onFocus="this.blur()" style="display:block">
                     <img src="../images/upload/'.$pic.'" width="100%" height="100%">
                     </a>
                </div>
              <div class="post_box_a_2"><a href="goods-'.$row["goods_id"].'.html">'.$row["goods_name"].'</a></div>
              <div class="post_box_a_3">
                	<span class="sp_1">￥'.$row["shop_price"].'</span>&nbsp;
                    <span class="sp_2">￥'.$row["market_price"].'</span>
              </div>
        </div>';
		 }
		echo "
		 <div class='fen' style='clear:both;'>
         	当前为第<span style='color:#F00;'>".$num."/".$pages."</span>页，总共<span style='color:#F00'>".$numrows."</span>个产品 &nbsp;
            <input name='' style='border:1px solid #CCC; width:60px; height:22px; vertical-align:bottom;' onclick='javascript:fenye_jian(".$num.")' type='button' value='上一页'>
            <input name='' style='border:1px solid #CCC; width:60px; height:22px; vertical-align:bottom;' onClick='javascript:fenye_add(".$num.")' type='button' value='下一页'>
                    </div>
					
		</div>
		";
  
  
?>