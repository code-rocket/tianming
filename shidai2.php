<?php
 $imgs=$_GET['imgs'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>本地试戴</title>
<link href="css/index.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

<script src="js/jquery.min.js"></script>
<style>
#div4 ,#div5
{
	display:none;
	position:absolute;
	border:2px solid #F60; 
	width:1px; 
	height:1px;
}

/* 定义keyframe动画，命名为blink */

@keyframes blink{
  0%{opacity: 1;}
  50%{opacity: 1;}
  50.01%{opacity: 0;} /* 注意这里定义50.01%立刻透明度为０，可以设置闪烁效果 */
  100%{opacity: 0;} 
}

/* 添加兼容性前缀 */

@-webkit-keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 1; }
    50.01% { opacity: 0; }
    100% { opacity: 0; }
}

@-moz-keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 1; }
    50.01% { opacity: 0; }
    100% { opacity: 0; }
}

@-ms-keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 1; }
    50.01% { opacity: 0; }
    100% { opacity: 0; }
}

@-o-keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 1; }
    50.01% { opacity: 0; }
    100% { opacity: 0; }
}

/* 定义blink类*/
.blink{
    animation: blink .2s linear infinite;  
    /* 其它浏览器兼容性前缀 */
    -webkit-animation: blink .2s linear infinite;
    -moz-animation: blink .2s linear infinite;
    -ms-animation: blink .2s linear infinite;
    -o-animation: blink .2s linear infinite;
    color: #dd4814;
}

.txt_box{ width:900px; height:650px;  margin:0 auto;}
.txt_box_top{ width:900px; height:30px; text-align:center; line-height:30px; font-size:16px; color:#000;}
.txt_box_center{ width:900px; height:460px; margin-top:10px;}
.txt_box_center_1{ width:352px; height:430px; margin:auto; border:10px solid #e0ebf1;}
.txt_box_btn{ width:900px; height:35px;}
.txt_box_btn_a{ width:360px; height:35px; margin:auto;}
.txt_box_btn_1{ width:360px; height:35px; float:left; text-align:center;}
.txt_box_btn_2{ width:120px; height:35px; float:left; text-align:center;}
.txt_box_btn_3{ width:120px; height:35px; float:left; text-align:center;}
</style>
</head>

<body>
<div class="txt_box" style="border:0px;">
<div id="newdiv">
	<div class="txt_box_top">天明眼镜试戴</div>
    
    
    <div style="width:900px; height:24px; text-align:center; color:#F00; line-height:24px;">注：请鼠标点击头像的左右瞳孔进行瞳距定位，谢谢配合！</div>
    <div class="txt_box_center">
    	<div class="txt_box_center_1" id="div2"> 
        
        
              <div id="div3" style="height:100%; width:100%;">
              
              <!--图片区域-->
             <div id="div4"  style="display:none;" class="blink"><label id='le'>左</label></div>
             <div id='div5' style="display:none;" class="blink"><label id='ri'>右</label></div>
             <!--图片区域-->
              
              </div>
        
        
        </div>
        
    </div>
    <div class="txt_box_btn" style="margin-top:0px;">
    	<div class="txt_box_btn_a">
            <div class="txt_box_btn_1">
            	<input style="border:0px;" id="f" type="file" name="f" onchange="change()" />
            </div>
            <div class="txt_box_btn_2">
            	<a href="#" onFocus="this.blur()" style="display:block;" id="shijing"><input style="border:0px;" type="image" src="img/anniu_2.png"></a>
            </div>
            
            <div class="txt_box_btn_3">
            	<a href="#" onFocus="this.blur()" style="display:block;" id="but"><input style="border:0px;" type="image" src="img/anniu_4.png"></a>
            </div>
            
             <div class="txt_box_btn_3">
            	<a href="javascript:void()" onClick="shang()" onFocus="this.blur()" style="display:block;"><input style="border:0px;" type="image" src="img/anniu_6.png"></a>
            </div>
        </div>
    </div>
    
  
    
</div>

  </div>


</body>
</html>
<script>

$(document).ready(function(){ 

var mn=GetRequest();

if(mn!="")
{
	     var tturl="shidai/shearphoto/"+mn['imgs'];
	      var pic = document.getElementById("div2");

		  pic.style.backgroundSize = "100% 100%";
		  pic.style.backgroundImage = "url("+tturl+")";  
}

});


function shang()
{
	$.ajax({
				   type:"POST",                         
				   url:"shidai.php",
				   data:{},                      
				   dataType:"html",
					success:function(data)
					{  
					},
						complete: function(XMLHttpRequest, textStatus){
						var module=XMLHttpRequest.responseText;
						// alert(module);
						//$('.txt_box').css('display','none');
						$('#newdiv').html(module);   
					 },
			  }); 
}



function GetRequest() {
   var url = location.search; //获取url中？符后的字串
   var theRequest = new Object();
   if (url.indexOf("?") != -1) {
      var str = url.substr(1);
      strs = str.split("&");
      for(var i = 0; i < strs.length; i ++) {
         theRequest[strs[i].split("=")[0]]=(strs[i].split("=")[1]);
      }
   }
   return theRequest;
}



var i=0;
var ccc;
var ddd;
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

//document.addEventListener("click",function(e){alert(e.clientX)});

$("#shijing").click(function(){ 
 // alert(ccc+','+ddd);
   var url=$("#div2").css('backgroundImage');
   var vz=($('#div4').css('display'));
   var mz=($('#div5').css('display'));
   
   var left_x=($('#div4').css('left'));
   var left_y=($('#div4').css('top'));
   
   var right_x=($('#div5').css('left'));
   var right_y=($('#div5').css('top'));
   

   var m_c_left=$('#div4').position().left-$('#div3').position().left;
   var m_c_top=$('#div4').position().top-$('#div3').position().top;
   
   
   var b_c_left=$('#div5').position().left-$('#div3').position().left;
   var b_c_top=$('#div5').position().top-$('#div3').position().top;
  
   if(vz=="none"||mz=="none")
   {
	   alert('注：请鼠标点击头像的左右瞳孔进行瞳距定位，谢谢配合！');
	   return false;
   }
   else
   {
	   //left_x_1=left_x.replace("px","");
	  // right_x_1=right_x.replace("px","");
	  // 
	  // left_y_1=left_y.replace("px","");
	 //  right_y_1=right_y.replace("px","");
	  // alert(left_x_1+','+right_x_1);
	   if(parseInt(m_c_left)>=parseInt(b_c_left))
	   {
		    alert('请选择正确的左右眼瞳孔');
		    qc();
	   }
	   else
	   { 
		   $.ajax({
				   type:"POST",                         
				   url:"shidai4.php",
				   data:{left_x:m_c_left,left_y:m_c_top,right_x:b_c_left,right_y:b_c_top,url:url,type:1},                      
				   dataType:"html",
					success:function(data)
					{  
					},
						complete: function(XMLHttpRequest, textStatus){
						var module=XMLHttpRequest.responseText;
						// alert(module);
						$('.txt_box').css('display','none');
						$('#newdiv').html(module);   
					 },
			  }); 
	   }
   }
});

$("#but").click(function(){ 
   qc();
	//miaodian();  
});
$(".txt_box_center_1").click(function(event){ 

   var pic = document.getElementById("div2")
   pic1=pic.style.backgroundImage;
   if(pic1=="")
   {
	   alert('请先选图片');
	   return;
   }

if(liulanqi=='Firefox')
{

	huohu(event);
}
else
{

   miaodian();
}
});

function  qc()
{
	i=0;
	//$("#div4").remove();
    $('#div4').css('left',-2000);
	$('#div5').css('left',-2000);
}
function huohu(e)
{

	var z =e.clientX;//鼠标横坐标    
	var f=e.clientY;//鼠标纵坐标
    var tt=f-90;
    
    var n=($('.theme-popover').position().left-420);
	var b=($('#div2').position().top);
	
	
	var m=($('#div2').position().left)
	
	var mm=($('#div2').position().top)
	var mb=f-mm;
	
	var nos=z-m-n;
	 
   
	  // alert(b);
		var a_b;
		i=i+1;
		document.addEventListener("click",function(e)
		{
			 t=($('.theme-popover').css('width'));
			 tm=t.replace("px","");
			 
			 ccc=e.clientX-(tm/2);
			 ddd=e.clientY;
             
			 if(i<=1)
			  {
				  $('#div4').css('display','block');
				  $('#div4').css('left',z-n);
				  $('#div4').css('top',tt);
			  }
			  else
			  {
				  $('#div5').css('display','block');
				  $('#div5').css('left',z-n);
				  $('#div5').css('top',tt);
			  }
		}
		);
}


function miaodian()
{	
	i=parseInt(i)+1;
	
	
//left

var a_b = event.offsetX;   //div3与鼠标点击的距离


var b_c=$('#div3').position().left - $('#div2').position().left



var m_c=$('#div3').position().left - $('.txt_box').position().left


var m=document.getElementById("div2").offsetLeft

var n=document.getElementById("div3").offsetLeft
var m_n=n-m;   //div3-div2的距离

ccc=m_n+a_b+m;  //div2到鼠标点击的距离

var m_b=a_b+($('#div3').position().left);
var a_c=a_b+b_c-m_c;   //头部到鼠标点击的地方

//top
var a_b_1 = event.offsetY; 
var b_c_1=$('#div3').position().top;

ddd=a_b_1+b_c_1;


if(i<=1)
{

	$('#div4').css('display','block');
	$('#div4').css('left',ccc);
	$('#div4').css('top',ddd);
}
else
{

	$('#div5').css('display','block');
	$('#div5').css('left',ccc);
	$('#div5').css('top',ddd);
}
//alert('X：'+ccc+',Y：'+ddd);
}

/*$(function(){
      var w=0,tip=$("<b>");
      tip.css({
   "z-index":99999,position:"absolute",color:"red",display:"none"
              }),
      $("body").append(tip),//页面创建b标签用来显示数字
      $(document).on("click",function(e){
            var x=e.pageX,y=e.pageY;//获取点击页面坐标
            tip.text("+"+ ++w).css({//数字加1
              display:"block",top:y-15,left:x,opacity:1//定位显示
            }).stop(!0,!1).animate({//stop(stopAll,goToEnd),如果发生多次点击时，要停止上一个动画的执行
                              top:y-180,opacity:0},800,function(){
                                        tip.hide()
                                    }),
            e.stopPropagation()
      });
});*/

</script>

<!--图片及时预览-->
<script>
function change() {
	qc();
    var pic = document.getElementById("div2"),
        file = document.getElementById("f");

    var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

     // gif在IE浏览器暂时无法显示
     if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
         alert("图片的格式必须为png或者jpg或者jpeg格式！"); 
         return;
     }
     var isIE = navigator.userAgent.match(/MSIE/)!= null,
         isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;	 
     if(isIE) {
        file.select();
        var reallocalpath = document.selection.createRange().text;
 
        // IE6浏览器设置img的src为本地路径可以直接显示图片
         if (isIE6) {
			pic.style.backgroundSize = "middle";
		    pic.style.backgroundImage = "url("+reallocalpath+")";
         }else {
            // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
             pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
             // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
			 pic.style.backgroundSize = "middle";
             pic.style.backgroundImage = "url('data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==')";
         }
     }else {

        html5Reader(file);
     }
}
 function html5Reader(file){
     var file = file.files[0];

     var reader = new FileReader();
     reader.readAsDataURL(file);
     reader.onload = function(e){
         var pic = document.getElementById("div2");

		  pic.style.backgroundSize = "100% auto";
		  pic.style.backgroundRepeat  = "no-repeat";
		  pic.style.backgroundPosition  = "center";
		  pic.style.backgroundImage = "url("+this.result+")";  
     }
 }
</script>