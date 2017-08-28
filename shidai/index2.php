<?php
 $imgs=$_GET['imgs'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>本地试戴</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">

<link href="css/index.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

<script src="js/jquery.min.js"></script>
</head>

<body>
<div class="txt_box" style="border:0px;">
	<div class="txt_box_top">天明试戴</div>
    <div class="txt_box_center">
    	<div class="txt_box_center_1" id="div2"> 
        
        
              <div id="div3" style="height:100%;width:100%;">
              
              <!--图片区域-->
             <div id="div4" class="blink"><label id='le'>左</label></div>
             <div id='div5' class="blink"><label id='ri'>右</label></div>
             <!--图片区域-->
              
              </div>
        
        
        </div>
        
    </div>
    <div class="txt_box_btn">
    	<div class="txt_box_btn_a">
            <div class="txt_box_btn_1">
            	<input id="f" type="file" name="f" onchange="change()" />
            </div>
            <div class="txt_box_btn_2">
            	<a href="#" onFocus="this.blur()" style="display:block;" id="shijing"><input type="image" src="img/anniu_2.png"></a>
            </div>
            
            <div class="txt_box_btn_3">
            	<a href="#" onFocus="this.blur()" style="display:block;" id="but"><input type="image" src="img/anniu_4.png"></a>
            </div>
        </div>
    </div>
    
</div>
<div id="newdiv"></div>
</body>
</html>
<script>


$(document).ready(function(){ 

var mn=GetRequest();
if(mn!="")
{
	     var tturl="shearphoto/"+mn['imgs'];
	      var pic = document.getElementById("div2");

		  pic.style.backgroundSize = "100% 100%";
		  pic.style.backgroundImage = "url("+tturl+")";  
}

});


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
	   alert('请点击左右眼瞳孔');
	   return false;
   }
   else
   {
	  
	   if(parseInt(m_c_left)>=parseInt(b_c_left))
	   {
		    alert('请选择正确的左右眼瞳孔');
		    qc();
	   }
	   else
	   { 
	    

		   $.ajax({
				   type:"POST",                         
				   url:"index4.php",
				   data:{left_x:m_c_left,left_y:m_c_top,right_x:b_c_left,right_y:b_c_top,url:url},                      
				   dataType:"html",
					success:function(data)
					{  
					   $('.txt_box').css('display','none');
						$('#newdiv').html(data); 
					},	
			  }); 
	   }
   }
});

$("#but").click(function(){ 
   qc();
	//miaodian();  
});
$(".txt_box_center_1").click(function(){ 

   var pic = document.getElementById("div2")
   pic1=pic.style.backgroundImage;
  

if(liulanqi=='Firefox')
{

	huohu();
}
else
{

   miaodian();
}
});

function  qc()
{
	i=0;
    $('#div4').css('left',-2000);
	$('#div5').css('left',-1000);
}
function huohu()
{
		var a_b;
		i=i+1;
		document.addEventListener("click",function(e)
		{
			 ccc=e.clientX;
			 ddd=e.clientY;
           
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
		}
		);
}


function miaodian()
{	
	i=i+1;
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

		  pic.style.backgroundSize = "100% 100%";
		  pic.style.backgroundImage = "url("+this.result+")";  
     }
 }
</script>