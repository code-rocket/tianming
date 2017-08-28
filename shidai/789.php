<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>试镜--选模特</title>
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>


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



   function huanjing(url)
   {

        $.ajax({
			   type:"POST",                         
			   url:"?",
			   data:{url:url},                      
			   dataType:"text",
  
				success:function(data)
				{   
				    document.getElementById('jing').src=url;
				},

		  }); 
   
   }
   function send()
   {  
        var left_x;
		var left_y;
		var right_x;
		var right_y; 
        if(liulanqi=="Firefox")
		{
			left_x='874';
			left_y='307';
			right_x='1047';
			right_y='307';
		}
		else
		{
			 left_x='854';
			 left_y='307';
			 right_x='1027';
			 right_y='307';
		}
		var url=document.getElementById('jing').src;
         //alert(url);
		$.ajax({
				   type:"POST",                         
				   url:"456.php",
				   data:{left_x:left_x,left_y:left_y,right_x:right_x,right_y:right_y,url1:url},                      
				   dataType:"html",
					success:function(data)
					{  
                     
					 },
					 complete: function(XMLHttpRequest, textStatus){
						var module=XMLHttpRequest.responseText;
						 //alert(module);
						$('#ms').css('display','none');
						$('#yj').css('display','none');
						$('#newdiv').html(module);   
					 },
			  }); 
	}
   </script>





<div id="ms" style="width:100%; position:relative; margin:0 auto;">

<div id="yj" style=" width:600px;height:640px; float:left; border:0px solid #00F; padding:10px;">
 
           <a href="javascript:huanjing('images/20160423110654.png')">
           <div style="width:152px; height:174px; float:left; overflow:hidden;margin:20px;">
           <img src="images/20160423110654.png" width="100%">
           </div></a>
          
           <a href="javascript:huanjing('images/20160428140203.png')">
           <div style="width:152px; height:174px; float:left; overflow:hidden; margin:20px;">
           <img src="images/20160428140203.png" width="100%">
           </div></a>
           
           <a href="javascript:huanjing('images/20160428140220.png')">
           <div style="width:152px; height:174px; float:left; overflow:hidden;margin:20px;">
           <img src="images/20160428140220.png" width="100%">
           </div></a>           
           
           <a href="javascript:huanjing('images/20160428140437.png')">
           <div style="width:152px; height:174px; float:left; overflow:hidden;margin:20px;">
           <img src="images/20160428140437.png" width="100%">
           </div></a>
           
           <a href="javascript:huanjing('images/20160428140448.png')">
           <div style="width:152px; height:174px; float:left; overflow:hidden;margin:20px;">
           <img src="images/20160428140448.png" width="100%">
           </div></a>
           
           <a href="javascript:huanjing('images/20160428140458.png')">
           <div style="width:152px; height:174px; float:left; overflow:hidden;margin:20px;">
           <img src="images/20160428140458.png" width="100%">
           </div></a>
           
           <a href="javascript:huanjing('images/20160428140506.png')">
           <div style="width:152px; height:174px; float:left; overflow:hidden;margin:20px;">
           <img src="images/20160428140506.png" width="100%">
           </div></a>
                   
        
        </div>

<div style="width:500px; height:640px;  float:left; border:0px solid #F00;">
<img id="jing" src="images/20160423110654.png" width="100%">
<br />
<br />
<input type="button" style="padding:10px;"  onclick="javascript:send()" value="开 始 试 镜"/>
</div>

   
</div>
<div id="newdiv" >
</div>