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
	
	$face_top=$right_y-$face_width/2;

if(empty($url))
{
	$url=$url1;
}



?>

<!--<html>
<head>
<title>试戴</title>
<script language="javascript">
<!--
down = false;
var x,y,imgID;
function dragImage(obj){
imgID = obj;
x = event.x - parseInt(imgID.style.left);
y = event.y - parseInt(imgID.style.top);
down=true;
}
function cancelDrag(){	down=false;	}
function moveImage(){
if(down){
imgID.style.left  = event.x - x;
imgID.style.top   = event.y - y;
event.returnValue = false;
}
}
document.onmousemove = moveImage;
document.onmouseup = cancelDrag;
//-->
</script>
<!--</head>
<body>
<div style="width:300px; height:200px; position:relative; background-image:<?php echo $url?>">
<img src="http://www.veryhuo.com/images/logo.gif" style="position:absolute;left:0px;top=0px"
onMouseDown="dragImage(this)">

</div>
</body>
</html><br /><center></center>-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" Content="text/html; charset=UTF-8">
 <link rel="stylesheet" href="css/style.css" type="text/css" />
<head >
    <title>试镜-开始</title>
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
        margin:0 auto;
		
        border:1px solid #666666;
        padding:0;
        width:550px;
        height:647px;
       
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
		width:<?=$face_c?>;
		left :<?=$face_left?>;
		top:<?=$face_top?>;
		height:<?=$face_width?>; 
		border:0px solid #F00; 
		position:absolute; 
		background-image:url(images/20160423124312.png);
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
</head>
<body>
    
    
    <div id="picDiv" >
        <img id="pic"  class="dragAble" alt="头像" src=<?=$url?> width="100%" />
        <br />
       
    </div>
    
           <div id="jingkuang">
           
           
        
           </div>
        
        <div style="position:absolute; top:50px; left:100px; border:1px solid #F00; width:400px; height:600px; background:#FFF; padding:10px;">
           <a href="javascript:huanjing('images/20160423124312.png')" style="display:block"><div style="width:45%; height:150px; float:left;">
           <img src="images/20160423124312.png" width="100%" />
           <br /><p style="color:#000;">智能眼镜1</p>
           <p style="color:#F00;">￥175</p>
           </div></a>
           <a href="javascript:huanjing('images/201604231042125.png')" style="display:block"><div style="width:45%; height:150px; float:right;">
           <img src="images/201604231042125.png" width="100%" />
           <br /><p style="color:#000;">智能眼镜2</p>
           <p style="color:#F00;">￥1950</p>
           </div></a>
           
           <a href="javascript:huanjing('images/2013101615524753.png')" style="display:block"><div style="width:45%; height:150px; float:left;">
           <img src="images/2013101615524753.png" width="100%" />
           <br /><p style="color:#000;">智能眼镜3</p>
           <p style="color:#F00;">￥1055</p>
           </div></a>
           
           <a href="javascript:huanjing('images/201604231246512.png')" style="display:block"><div style="width:45%; height:150px; float:right;">
           <img src="images/201604231246512.png" width="100%" />
           <br /><p style="color:#000;">智能眼镜4</p>
           <p style="color:#F00;">￥4300</p>
           </div></a>
           
           
           <a href="javascript:huanjing('images/2016042312431622.png')" style="display:block"><div style="width:45%; height:150px; float:left;">
           <img src="images/2016042312431622.png" width="100%" />
           <br /><p style="color:#000;">智能眼镜5</p>
           <p style="color:#F00;">￥4055</p>
           </div></a>
           
           <a href="javascript:huanjing('images/201604231243789.png')" style="display:block"><div style="width:45%; height:150px; float:right;">
           <img src="images/201604231243789.png" width="100%" />
           <br /><p style="color:#000;">智能眼镜6</p>
           <p style="color:#F00;">￥350</p>
           </div></a>
           
           
           <a href="javascript:huanjing('images/201604231243134.png')" style="display:block"><div style="width:45%; height:150px; float:left;">
           <img src="images/201604231243134.png" width="100%" />
           <br /><p style="color:#000;">智能眼镜7</p>
           <p style="color:#F00;">￥855</p>
           </div></a>
           
           <a href="javascript:huanjing('images/20160423134535.png')" style="display:block"><div style="width:45%; height:150px; float:right;">
           <img src="images/20160423134535.png" width="100%" />
           <br /><p style="color:#000;">智能眼镜8</p>
           <p style="color:#F00;">￥5500</p>
           </div></a>
           
           </div>
        </div>
     <!--  <div id="btn">
     <input id="btn1" type="button" value="放大" onclick="ImageChange(true)" />
     <input id="btn2" type="button" value="缩小" onclick="ImageChange(false)" />
     </div>-->
    
    <!--  <input id="btn3" type="button" value="div的坐标" onclick="getDivPosition()" />  -->
</body>
</html>