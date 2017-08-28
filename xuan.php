<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>JS获得鼠标位置（兼容多浏览器ie,firefox）脚本之家修正版</title> 
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

<script src="js/jquery.min.js"></script>
</head> 

<body> 

<script> 
function mouseMove(ev) 
{ 
ev= ev || window.event; 
var mousePos = mouseCoords(ev); 
//alert(ev.pageX); 
document.getElementById("xxx").value = mousePos.x; 
document.getElementById("yyy").value = mousePos.y; 
} 

function mouseCoords(ev) 
{ 
if(ev.pageX || ev.pageY){ 
return {x:ev.pageX, y:ev.pageY}; 
} 
return { 
x:ev.clientX + document.body.scrollLeft - document.body.clientLeft, 
y:ev.clientY + document.body.scrollTop - document.body.clientTop 
}; 
} 


</script> 
鼠标 X 轴: 
<input id=xxx type=text> 

鼠标 Y 轴: 
<input id=yyy type=text> 
<div id="shijing" style="width:500px; height:600px; margin:0 auto; border:1px solid #000;"></div>



<script>
$("#shijing").click(function(){ 

   document.onmousemove = mouseMove; 
   alert(mousePos.x);
});

</script>
</body>