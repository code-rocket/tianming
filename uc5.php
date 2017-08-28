<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
      
include_once(dirname(__FILE__) .  '/includes/cls_captcha.php'); 
/*
   $mysql_server_name='localhost:3306'; //改成自己的mysql数据库服务器
  $mysql_username='root'; //改成自己的mysql数据库用户名   
  $mysql_password='a02d122dd2'; //改成自己的mysql数据库密码   
   $mysql_database='tianming'; //改成自己的mysql数据库名 


   $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库   
   mysql_query("set names 'utf8'"); //数据库输出编码.   
   mysql_select_db($mysql_database); //打开数据库  */
   
   
   $action=$_POST['action'];
   if($action=="yuyue")
   {
	   
	    $m=$_POST['m'];
   
		 
		
		
		echo "
		<select style='margin-left:5px; width:100px; height:24px;' name='mendian' class='selopt1'>
                <option value='0'>请选择</option>";
           
		   $sql ="select * from ecs_suppliers where city='".$m."'"; //SQL语句   
			   $result = $db->getAll($sql); //查询
                foreach ($result as $row) {
				  echo "<option value='".$row['suppliers_id']."'>".$row['suppliers_name']."</option>";
			  }
        
        echo "            </select>
		
		";
	   
	   
   }
   
   
   if($action=="yuyue2")
   {
	   
	    $m=$_POST['m'];
   
		 
		
		
		echo "
		<select class='tiyan_box_sel' id='ti_yan' onChange='javascript:ti_yan_dian(this.value);'>
                <option value='0'>请选择</option>";
           
		   $sql ="select * from ecs_suppliers where city='".$m."'"; //SQL语句   
			   $result = $db->getAll($sql); //查询
                foreach ($result as $row) {
				  echo "<option value='".$row['suppliers_id']."'>".$row['suppliers_name']."</option>";
			  }
        
        echo "            </select>
		
		";
	   
	   
   }
   
   
   
   if($action=="m_yuyue")
   {
	   
	    $m=$_POST['m'];
   
		 
		
		
		echo "

		
		
		
		<select   class='tiyan_box_sel' id='ti_yan' onChange='javascript:ti_yan_dian(this.value);'>
                <option value='0'>请选择</option>";
           
		   $sql ="select * from ecs_suppliers where city='".$m."'"; //SQL语句   
			   $result = $db->getAll($sql); //查询
               foreach ($result as $row) {
				  echo "<option value='".$row['suppliers_id']."'>".$row['suppliers_name']."</option>";
			  }
        
        echo "            </select>
		
		";
	   
	   
   }
   
   
   
   
   
   
   
   
   if($action=="ditu")
   {
	   
	    $m=$_POST['m'];
   
		$sql="select * from ecs_suppliers where city='".$m."'"; 
		$row = $db->getRow($sql); //查询
		
		$address=$row['address'];
		echo $row['gallery'];
		echo 
		"<input id='ms_address' type='hidden'  value='".$address."' >";
		;
 
   }
   
   
   if($action=="ditu2")
   {
	   
	    $m=$_POST['m'];
   
		$sql="select * from ecs_suppliers where suppliers_id='".$m."'"; 
		$row = $db->getRow($sql); //查询
		
		$address=$row['address'];
		echo $row['gallery'];
		echo 
		"<input id='ms_address' type='hidden'  value='".$address."' >";
		;
 
   }
   
   
   if($action=="tt_jiao")
   {
	   $yuyue=$_POST['yuyue'];
	   $mendian=$_POST['mendian'];
	   $tel=$_POST['tel'];
	   $content=$_POST['content'];
	   
	   $time=time();
	   //print_r($_POST);die;
	   
	   $sql = "INSERT INTO `ecs_supplires_yuyue`(suppliers_id,tel,content,datetime) VALUES ('".$mendian."','".$tel."','".$content."','".$time."')";
         if($db->query($sql)){
            echo "<script>alert('预约成功');window.location.href='index.php';</script>";
        }
		else
		{
			echo "<script>alert('预约失败');window.location.href='index.php';</script>";
		}
	   
	   
   }
   
   if($action=="huantu")
   {
	   $val=$_POST['val'];
	   $goods_id=$_POST['goods_id'];
      
	  
	   $sql = "select * from ecs_goods_color where col_id='".$val."'";
      
		$row = $db->getRow($sql); //查询
		echo  $row['img'];
	   
	   
   }
   
    if($action=="huantu1")
   {
	   $val=$_POST['val'];
	   $goods_id=$_POST['goods_id'];
      
	  
	   $sql = "select * from ecs_goods_color where col_id='".$val."'";
      
		$row = $db->getRow($sql); //查询
		echo  $row['big_img'];
	   
	   
   }
   
   
  
?>
