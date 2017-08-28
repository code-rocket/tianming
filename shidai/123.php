<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>试镜--选图</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

<script src="js/jquery.min.js"></script>





<div id="div1">
    <div id="div2">
    <img id="preview" alt="" name="pic" />
              <div id="div3">
              </div>
    
    
     <div style=" margin-top:320px; margin-left:-130px;">
     <input id="f" type="file" name="f" onchange="change()" />
     
     <input id="but" type="button" value="清 除" />
     <br />
     <br />
      <input id="shijing" type="button" value="开始试镜" />
     </div>
    
    
    </div>
    
    <!--瞄点-->
    <div id="div4" class="blink"><label>左</label></div>
    <div id='div5' class="blink"><label>右</label></div>
    <!--瞄点-->
    
   
</div>
<div id="newdiv"></div>
<script>
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
   if(vz=="none"||mz=="none")
   {
	   alert('请点击左右眼瞳孔');
   }
   else
   {
	   left_x_1=left_x.replace("px","");
	   right_x_1=right_x.replace("px","");
	   
	   left_y_1=left_y.replace("px","");
	   right_y_1=right_y.replace("px","");
	  // alert(left_x_1+','+right_x_1);
	   if(parseInt(left_x_1)>=parseInt(right_x_1))
	   {
		    alert('请选择正确的左右眼瞳孔');
		    qc();
	   }
	   else
	   { 
	   
	    
         
		   $.ajax({
				   type:"POST",                         
				   url:"456.php",
				   data:{left_x:left_x,left_y:left_y,right_x:right_x,right_y:right_y,url:url},                      
				   dataType:"html",
					success:function(data)
					{  
					},
						complete: function(XMLHttpRequest, textStatus){
						var module=XMLHttpRequest.responseText;
						// alert(module);
						$('#div1').css('display','none');
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
$("#div3").click(function(){ 

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
    $('#div5').css('left',-2000);
	$('#div4').css('left',-3000);
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

var m_c=$('#div3').position().left - $('#div1').position().left


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
		  pic.style.backgroundSize = "middle";
		  pic.style.backgroundImage = "url("+this.result+")";  
     }
 }
</script>