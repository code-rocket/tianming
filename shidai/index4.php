<script>
var liulanqi;
//判断浏览器
var explorer = window.navigator.userAgent ;
//ie浏览器
if (explorer.indexOf("MSIE") >= 0) {
liulanqi='ie';	
//alert("ie浏览器");
}
//firefox 浏览器
else if (explorer.indexOf("Firefox") >= 0) {
liulanqi='Firefox';	
//alert("Firefox浏览器");
}
//Chrome浏览器
else if(explorer.indexOf("Chrome") >= 0){
liulanqi='Chrome';	
//alert("Chrome浏览器");
}
//Opera浏览器
else if(explorer.indexOf("Opera") >= 0){
liulanqi='Opera';	
//alert("Opera浏览器");
}
//Safari浏览器
else if(explorer.indexOf("Safari") >= 0){
liulanqi='Safari';	
//alert("Safari浏览器");
}

</script>
<?php

$mysql_server_name='localhost:3306'; //改成自己的mysql数据库服务器
$mysql_username='root'; //改成自己的mysql数据库用户名   
$mysql_password='a02d122dd2'; //改成自己的mysql数据库密码   
$mysql_database='tianming'; //改成自己的mysql数据库名 


$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库   
mysql_query("set names 'utf8'"); //数据库输出编码.   
mysql_select_db($mysql_database); //打开数据库   



$left_x=$_POST['left_x'];
$left_y=$_POST['left_y'];

$right_x=$_POST['right_x'];
$right_y=$_POST['right_y'];
$url=$_POST['url'];
$url= substr($url,4);
$url=substr($url,0,strlen($url)-1); 




$url1=$_POST['url1'];





	$face_c=($right_x-$left_x)*2+30;
	
	$face_left=($left_x-($right_x-$left_x)/2)-15;
	
	$face_width=$face_c/4;
	
	$face_top=($right_y-$face_width/2)-5;

if(empty($url))
{
	$url=$url1;
}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>眼镜试戴</title>

<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/index.css" rel="stylesheet" type="text/css">





    <style>
    #div4 ,#div5
{
	display:block;
	position:absolute;
	border:2px solid #F60; width:1px; height:1px;
}
    </style>
    <style type="text/css">
      #picDiv
        {
        padding:0;
        overflow:hidden;
        position:relative;
        cursor:move;
        }
     #btn
	 {
		margin:0 auto;
	    width:550px;
        height:200px;
		 }
     .dragAble
        {
            position: absolute;
            cursor: move;
			left:0px;
        }
	#jingkuang
	{
		width:<?=$face_c?>px;
		left :<?=$face_left?>px;
		top:<?=$face_top?>px;
		height:<?=$face_width?>px; 
		border:0px solid #F00; 
		position:absolute; 
		background-size:100% 100%;
	}
	
    </style>
 
    <script language="javascript" type="text/javascript">

	
	
        //图片放大和缩小（兼容IE和火狐，谷歌）
        function ImageChange(args) {
            var oImg = document.getElementById("pic");

            if (args) {
                oImg.width = oImg.width * 1.2;
                oImg.height = oImg.height * 1.2;
               // oImg.style.zoom = parseInt(oImg.style.zoom) + (args ? +20 : -20) + '%';
            }
            else {
                oImg.width = oImg.width / 1.2;
                oImg.height = oImg.height / 1.2;
            }
        }
 
 
 
        //获取div的四个顶点坐标
           function getDivPosition()
           {
           var odiv=document.getElementById('picDiv');
         //  alert(odiv.getBoundingClientRect().left);
         // alert(odiv.getBoundingClientRect().top);
                    
           var xLeft,xRigh,yTop,yBottom;
           return {
                xLeft:odiv.getBoundingClientRect().left,
                xRigh:odiv.getBoundingClientRect().left+500, 
                yTop:odiv.getBoundingClientRect().top,
                yBottom:odiv.getBoundingClientRect().top+600
                };
           }
 
         //获取鼠标坐标
           function mousePos(e)
           {
                var x,y;
                var e = e||window.event;
                return {
                x:e.clientX+document.body.scrollLeft+document.documentElement.scrollLeft,
                y:e.clientY+document.body.scrollTop+document.documentElement.scrollTop
                };
            };
 
        //在固定div层拖动图片
        var ie = document.all;
        var nn6 = document.getElementById && !document.all;
        var isdrag = false;
        var y, x;
        var oDragObj;
 
         
        //鼠标移动
        function moveMouse(e) {     
                //鼠标的坐标
                mousePos(e).x   ;
                mousePos(e).y  ;
                //div的四个顶点坐标
                getDivPosition().xLeft
                getDivPosition().xRigh
                getDivPosition().yTop
                getDivPosition().yBottom
                 
            if(isdrag && mousePos(e).x > getDivPosition().xLeft &&  mousePos(e).x < getDivPosition().xRigh  &&  mousePos(e).y >getDivPosition().yTop && mousePos(e).y< getDivPosition().yBottom )
            {
                oDragObj.style.top = (nn6 ? nTY + e.clientY - y : nTY + event.clientY - y) + "px";
                oDragObj.style.left = (nn6 ? nTX + e.clientX - x : nTX + event.clientX - x) + "px";
                return false;
            }
        }
 
        //鼠标按下才初始化
        function initDrag(e) {
            var oDragHandle = nn6 ? e.target : event.srcElement;
            var topElement = "HTML";
            while (oDragHandle.tagName != topElement && oDragHandle.className != "dragAble") {
                oDragHandle = nn6 ? oDragHandle.parentNode : oDragHandle.parentElement;
            }
            if (oDragHandle.className == "dragAble") {
                isdrag = true;
                oDragObj = oDragHandle;
                nTY = parseInt(oDragObj.style.top + 0);
                y = nn6 ? e.clientY : event.clientY;
                nTX = parseInt(oDragObj.style.left + 0);
                x = nn6 ? e.clientX : event.clientX;
                document.onmousemove = moveMouse;
                return false;
            }
        }
        document.onmousedown = initDrag;
        document.onmouseup = new Function("isdrag=false");
 
     </script>
    
   <script>
   function huanjing(url1)
   {
    
        $.ajax({
			   type:"POST",                         
			   url:"?",
			   data:{url1:url1},                      
			   dataType:"text",
  
				success:function(data)
				{  
				   $('#jingkuang').css('background-image','url('+url1+')'); 
				},

		  }); 
   
   }
   </script>

<script>
function fenye_add(num)
   {
      var meth="add";
	  var num=num;
	 
        $.ajax({
			   type:"POST",                         
			   url:"uc.php",
			   data:{meth:meth,num:num},                      
			   dataType:"html",
  
				success:function(data)
				{  
				   $('.post_box_center').html(data); 
				},

		  }); 
   
   }

function fenye_jian(num)
   {
      var meth="jian";
	  var num=num;
	  
        $.ajax({
			   type:"POST",                         
			   url:"uc.php",
			   data:{meth:meth,num:num},                      
			   dataType:"html",
  
				success:function(data)
				{  
				   $('.post_box_center').html(data); 
				},

		  }); 
   
   }


</script>



</head>

<body>
<div class="post_box">
	<div class="post_box_left">
    	<div class="post_box_pic" id="picDiv"><img class="dragAble" id="pic" src=<?=$url?> width="100%" height="100%" >
        
             <!--<div id="div4" class="blink" style="left:<?=$left_x?>px;top:<?=$left_y?>px;position:absolute;"><label id='le'>左</label></div>
             <div id='div5' class="blink" style="left:<?=$right_x?>px; top:<?=$right_y?>px;position:absolute;"><label id='ri'>右</label></div>-->
             
              <div id="jingkuang">
  
              </div>
             
        </div>
         
        
      <div class="post_box_pic_1">
        	<div class="post_box_pic_2">
            	<a href="index2.php" onFocus="this.blur()"><input type="image" src="img/anniu_3.png"></a>
          </div>
        </div>
    </div>
    <div class="post_box_right">
    	<div class="post_box_top">天明眼镜试戴</div>
        <div class="post_box_center">
        

          <?
		  
		    $rs=mysql_query("select count(*) from ecs_goods",$conn);
			$myrow=mysql_fetch_array($rs);
			$pagesize=9; 
			$numrows=$myrow[0];   //总数
			$pages=intval($numrows/$pagesize);  //页数
		  
		  
		     $sql ="select * from ecs_goods  order by goods_id desc limit 0,9"; //SQL语句   
			 $result = mysql_query($sql,$conn); //查询 

             while($row = mysql_fetch_array($result))   
			 {   
		  ?>
        	<div class="post_box_a">
            	<div class="post_box_a_1">
                	 <a href="javascript:huanjing('../images/upload/<?=$row['goods_pic']?>')" onFocus="this.blur()" style="display:block">
                     <img src="../images/upload/<?=$row['goods_pic']?>" width="100%" height="100%">
                     </a>
                </div>
              <div class="post_box_a_2"><?=$row['goods_name']?></div>
              <div class="post_box_a_3">
                	<span class="sp_1">￥<?=$row['shop_price']?></span>&nbsp;
                    <span class="sp_2">￥<?=$row['market_price']?></span>
              </div>
          </div>
          <?
			 }
		  ?>
                    
                    
                    
                    <div class="fen">
         	当前为第<span style="color:#F00;">1/<?=$pages?></span>页，总共<span style="color:#F00;"><?=$numrows?></span>个产品 &nbsp;
            <input name="" onClick="javascript:fenye_jian('0')" type="button" value="上一页">
            <input name="" onClick="javascript:fenye_add('1')" type="button" value="下一页">
                    </div>
           
        </div>
    </div>
</div>
</body>
</html>
