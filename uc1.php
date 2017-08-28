<?php

define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
      
include_once(dirname(__FILE__) .  '/includes/cls_captcha.php');
   /*$mysql_server_name='localhost:3306'; //改成自己的mysql数据库服务器
  $mysql_username='root'; //改成自己的mysql数据库用户名   
  $mysql_password='a02d122dd2'; //改成自己的mysql数据库密码   
   $mysql_database='tianming'; //改成自己的mysql数据库名 


   $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库   
   mysql_query("set names 'utf8'"); //数据库输出编码.   
   mysql_select_db($mysql_database); //打开数据库  */
   
   
   $t_value=$_POST['t_value'];
   $t=$_POST['t'];
   if($t=="xie")
   {
	   $moxie="";
   }
   elseif($t=="mo")
   {
	   $moxie="xie(this.value)";
   }
  
   
   echo "<select style='margin-left:5px; width:100px; height:24px;' onChange='".$moxie."' id='".$t."1'>";
   echo "<option value='-1'>--请选择--</option>";
   
   $sql ="select * from ecs_category where parent_id='".$t_value."' and is_show=1"; //SQL语句   
			   $result = $db->getAll($sql); //查询
    foreach ($result as $row) {
   echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
			  }
   echo "</select>";
  
?>