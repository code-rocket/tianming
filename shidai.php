<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>试戴</title>
<link href="css/index.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

<script src="js/jquery.min.js"></script>
<script>
function tz()
{
	$.ajax({
				   type:"POST",                         
				   url:"shidai2.php",
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


function tz1()
{
	$.ajax({
				   type:"POST",                         
				   url:"shidai3.php",
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


function tz2()
{
	/*window.location.href="shidai/shearphoto";*/
	window.open("shidai/shearphoto");
}


</script>
</head>

<body>
        
            <div class="box" style="border:0px;">
                <div class="box_top"><span>照片隐私保护：</span>天明眼镜尊重顾客隐私，我们承诺不会将照片用于其它任何途径，除非您个人同意分享照片。</div>
                <div class="box_center">
                  <div class="box_center_1">
                        <div class="box_center_a">
                          <a href="javascript:tz()" onFocus="this.blur()"><img src="img/index_1.png"></a>
                          <p><a href="javascript:tz()" onFocus="this.blur()">本地上传照片</a></p>
                        </div>
                        <div class="box_center_b">
                          <a href="javascript:tz1()" onFocus="this.blur()"><img src="img/index_2.png"></a>
                          <p><a href="javascript:tz1()" onFocus="this.blur()">自选模特</a></p>
                        </div>
                        <div class="box_center_c">
                          <a href="javascript:tz2()" onFocus="this.blur()"><img src="img/index_3.png"></a>
                          <p><a href="javascript:tz2()" onFocus="this.blur()">摄像头拍摄</a></p>
                        </div>
                    </div>
                </div>
                <div class="box_btn" style="background:url(img/index_4.jpg)"></div>
            </div>
           

<div id="newdiv"></div>
</body>
</html>
