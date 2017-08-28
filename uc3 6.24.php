<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');
      
include_once(dirname(__FILE__) .  '/includes/cls_captcha.php'); 

   $mysql_server_name='localhost:3306'; //改成自己的mysql数据库服务器
  $mysql_username='root'; //改成自己的mysql数据库用户名   
  $mysql_password='a02d122dd2'; //改成自己的mysql数据库密码   
   $mysql_database='tianming'; //改成自己的mysql数据库名 


   $conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库   
   mysql_query("set names 'utf8'"); //数据库输出编码.   
   mysql_select_db($mysql_database); //打开数据库  
   
   
   $action=$_POST['action'];
   if($action=="yuyue")
   {
	   
	    $m=$_POST['m'];
   
		 
		
		
		echo "
		<select style='margin-left:5px; width:100px; height:24px;' name='mendian' class='selopt1'>
                <option value='0'>请选择</option>";
           
		   $sql ="select * from ecs_suppliers where city='".$m."'"; //SQL语句   
			   $result = mysql_query($sql,$conn); //查询 
			  while($row = mysql_fetch_array($result))   
			  {
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
			   $result = mysql_query($sql,$conn); //查询 
			  while($row = mysql_fetch_array($result))   
			  {
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
			   $result = mysql_query($sql,$conn); //查询 
			  while($row = mysql_fetch_array($result))   
			  {
				  echo "<option value='".$row['suppliers_id']."'>".$row['suppliers_name']."</option>";
			  }
        
        echo "            </select>
		
		";
	   
	   
   }
   
   
   
   
   
   
   
   
   if($action=="ditu")
   {
	   
	    $m=$_POST['m'];
   
		$sql="select * from ecs_suppliers where city='".$m."'"; 
		$result = mysql_query($sql,$conn); //查询 
		$row = mysql_fetch_array($result);
		
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
		$result = mysql_query($sql,$conn); //查询 
		$row = mysql_fetch_array($result);
		
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
      
		$row = mysql_fetch_array(mysql_query($sql,$conn));
		echo  $row['img'];
	   
	   
   }
   
    if($action=="huantu1")
   {
	   $val=$_POST['val'];
	   $goods_id=$_POST['goods_id'];
      
	  
	   $sql = "select * from ecs_goods_color where col_id='".$val."'";
      
		$row = mysql_fetch_array(mysql_query($sql,$conn));
		echo  $row['big_img'];
	   
	   
   }
   
   
   if($action=="mbbbb")
   {
	   $value=$_POST['value'];
	   $sql = "select * from ecs_goods where goods_id='".$value."'";
      
		$row = mysql_fetch_array(mysql_query($sql,$conn));
		$img=$row['goods_thumb'];
		$p_id=$row['goods_id'];
		$name=$row['goods_name'];
		$shop_price=$row['shop_price'];
		echo  
		"<div class='taocan_box_imgs'>
		<a href='goods-".$p_id.".html'>
		<span id='col_$value' data='$value'>
		<img src='".$img."' width='100%' height='100%'></a>
		</span>
		</div>
		<div class='taocan_box_yanse'><ul class='taocan_box_yanse_ul'>";
	   
	    $sql1 = "select * from ecs_goods_color where goods_id='".$p_id."'";
		$result = mysql_query($sql1,$conn); //查询 
		 while($row1 = mysql_fetch_array($result))   
		 {
			 $color=$row1['color'];
			 $col_id=$row1['col_id'];
			 $jk="jk_color('".$value."','".$col_id."')";
			 echo "<li class='taocan_box_yanse_li' onClick=$jk style='background:$color'></li>";
		 }
		 echo "  
		  </ul>
			 </div> 
		 <p class='taocan_box_pp'><a href='goods-".$p_id.".html'>$name</a><br />	
                                	<span class='taocan_box_sppn'>本站价：<span style='color:#d70000;'>￥$shop_price</span></span>
                                </p>";
                                
   }
   
   
   
   
   if($action=="mbbbb_color")
   {
	   $value=$_POST['value'];
	   $col_id=$_POST['col_id'];
	   $sql = "select * from ecs_goods_color where col_id='".$col_id."'";
       $row = mysql_fetch_array(mysql_query($sql,$conn));
	   

	   echo  "<img src='".$row['img']."' width='100%' height='100%'>";
		
                                
   }

   
    if($action=="mbbbb1")
   {
	   $value=$_POST['value'];
	   $sql = "select * from ecs_goods where goods_id='".$value."'";
      
		$row = mysql_fetch_array(mysql_query($sql,$conn));
		$img=$row['goods_thumb'];
		$p_id=$row['goods_id'];
		$name=$row['goods_name'];
		$shop_price=$row['shop_price'];
		echo  
		"<div class='taocan_box_imgs'>
		<a href='goods-".$p_id.".html'>
		<span id='col1_$value' data='$value'>
		<img src='".$img."' width='100%' height='100%'>
		</span>
		</a></div>
		<div class='taocan_box_yanse'><ul class='taocan_box_yanse_ul'>";
	   
	    $sql1 = "select * from ecs_goods_color where goods_id='".$p_id."'";
		$result = mysql_query($sql1,$conn); //查询 
		 while($row1 = mysql_fetch_array($result))   
		 {
			 $color=$row1['color'];
			 $col_id=$row1['col_id'];
			 $jk="jk_color1('".$value."','".$col_id."')";
			 echo "<li class='taocan_box_yanse_li' onClick=$jk style='background:$color'></li>";
		 }
		 echo "  
		  </ul>
			 </div> 
		 <p class='taocan_box_pp'><a href='goods-".$p_id.".html'>$name</a><br />	
                                	<span class='taocan_box_sppn'>本站价：<span style='color:#d70000;'>￥$shop_price</span></span>
                                </p>";
	   
	   
   }
   
   
   if($action=="mbbbb1_color")
   {
	   $value=$_POST['value'];
	   $col_id=$_POST['col_id'];
	   $sql = "select * from ecs_goods_color where col_id='".$col_id."'";
       $row = mysql_fetch_array(mysql_query($sql,$conn));
	   

	   echo  "<img src='".$row['img']."' width='100%' height='100%'>";
		
                                
   }
   
   
   
    if($action=="mbbbb2")
   {
	   $value=$_POST['value'];
	   $sql = "select * from ecs_goods where goods_id='".$value."'";
      
		$row = mysql_fetch_array(mysql_query($sql,$conn));
		$img=$row['goods_thumb'];
		$p_id=$row['goods_id'];
		$name=$row['goods_name'];
		$shop_price=$row['shop_price'];
		echo  
		"<div class='taocan_box_imgs'>
		<a href='goods-".$p_id.".html'>
		<span id='col2_$value' data='$value'>
		<img src='".$img."' width='100%' height='100%'>
		</span>
		</a></div>
		<div class='taocan_box_yanse'><ul class='taocan_box_yanse_ul'>";
	   
	    $sql1 = "select * from ecs_goods_color where goods_id='".$p_id."'";
		$result = mysql_query($sql1,$conn); //查询 
		 while($row1 = mysql_fetch_array($result))   
		 {
			 $color=$row1['color'];
			  $jk="jk_color('".$value."','".$col_id."')";
			 echo "<li class='taocan_box_yanse_li' onClick=$jk style='background:$color'></li>";
		 }
		 echo "  
		  </ul>
			 </div> 
		 <p class='taocan_box_pp'><a href='goods-".$p_id.".html'>$name</a><br />	
                                	<span class='taocan_box_sppn'>本站价：<span style='color:#d70000;'>￥$shop_price</span></span>
                                </p>";
	   
	   
   }
   
   
   if($action=="all_price")
   {
	   $jk=$_POST['jk'];
	   $jt=$_POST['jt'];
	   $jp=$_POST['jp'];
	   
	   $sql = "select * from ecs_goods where goods_id='".$jk."'";
       $row = mysql_fetch_array(mysql_query($sql,$conn));
	   
	   $sql1 = "select * from ecs_goods where goods_id='".$jt."'";
       $row1 = mysql_fetch_array(mysql_query($sql1,$conn));
	   
	   $sql2 = "select * from ecs_goods where goods_id='".$jp."'";
       $row2 = mysql_fetch_array(mysql_query($sql2,$conn));
	   
	   $all_price=$row['shop_price']+$row1['shop_price']+$row2['shop_price'];
	   
	   echo  $all_price;
		
                                
   }
   
   
   
   if($action=="shidai_gou")
   {
	  $goods_id=$_POST['goods_id'];
	   
	   $sql = "select * from ecs_goods where goods_id='".$goods_id."'";
       $row = mysql_fetch_array(mysql_query($sql,$conn));
	   
	   $id=$row['goods_id'];
	   $img=$row['goods_thumb'];
	   $name=$row['goods_name'];
	   $url="goods-".$row['goods_id'].".html";
	   $price=$row['shop_price'];
	   echo "
	   <div class='post_box_pic_1' style='width:364px; margin-left:5px; height:150px;'>
        	<div class='post_box_pic_2' style='float:left'>
				<div style='width:364px; height:150px;'>
                    <div style='width:350px; height:140px; margin:auto; margin-top:5px;'>
                        <div style='width:180px; height:140px; float:left;'>
                            <div style='width:180px; height:140px;'>
                                <img src='$img' width='100%' height='100%'>
                            </div>
                        </div>
                        <div style='width:130px; height:140px; float:left; margin-left:20px;'>
                            <div style='width:140px; height:140px; margin-left:10px;'>
                                <div style='width:140px; line-height:20px; font-size:12px;'>
                                    <a href='$url'>$name</a>
                                </div>
                                <div style='width:140px; height:24px; font-size:12px; color:#000; margin-top:15px;'>本站价：
								<span style='color:#F00; font-weight:700; font-size:14px;'>￥$price</span></div>
                                <div style='width:100px; height:30px;'>
								
								</div>
                                
                            </div>
                        </div>
                    </div>
				</div>
         	</div>
	     </div>
	   ";
		
                                
   }
   
   
  
?>
