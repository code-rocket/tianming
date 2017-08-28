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
   
   
    $id=$_POST['id'];
   
    $sql ="select * from ecs_suppliers where suppliers_id='".$id."'"; //SQL语句   
	$result = mysql_query($sql,$conn); //查询 
	$row = mysql_fetch_array($result);
    
	
	echo "
	
	<script language='javascript' type='text/javascript'>

        var code1;
        function createCodepx() {
            code1 = '';
            var codeLength = 4; //验证码的长度
            var checkCode = document.getElementById('checkCode1');
            var codeChars = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
            'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'); //所有候选组成验证码的字符，当然也可以用中文的
            for (var i = 0; i < codeLength; i++)
            {
                var charNum = Math.floor(Math.random() * 52);
                code1 += codeChars[charNum];
            }
            if (checkCode)
            {
                checkCode.className = 'code1';
                checkCode.innerHTML = code1;
            }
        }
      
     </script>

<!--验证码的结束-->
  
<script type='text/javascript'>


$('.tc').click(function(){
	$('#gray').show();
	$('#popup').show();
	tc_center();
});

$('a.guanbi').click(function(){
	$('#gray').hide();
	$('#popup').hide();//查找ID为popup的DIV hide()隐藏
})


$(window).resize(function(){
	tc_center();
});

function tc_center(){
	var _top=($(window).height()-$('.popup').height())/2;
	var _left=($(window).width()-$('.popup').width())/2;
	
	$('.popup').css({top:_top,left:_left});
}	
</script>

<script type='text/javascript'>
$(document).ready(function(){ 

	$('.top_nav').mousedown(function(e){ 
		
		var offset = $(this).offset();
		var x = e.pageX - offset.left;
		var y = e.pageY - offset.top;
		$(document).bind('mousemove',function(ev){ 
		
			$('.popup').stop();//加上这个之后 
			
			var _x = ev.pageX - x;//获得X轴方向移动的值 
			var _y = ev.pageY - y;//获得Y轴方向移动的值 
		
			$('.popup').animate({left:_x+'px',top:_y+'px'},10); 
		}); 

	}); 

	$(document).mouseup(function() { 
		$('.popup').css('cursor','default'); 
		$(this).unbind('mousemove'); 
	});
}) 
</script>
	
	
	
	
	<script type='text/javascript'>
$(function(){
	var oFocus=$('#focus'),
		oRight=oFocus.find('.right'),
		oLeft=oFocus.find('.left'),
		aRLi=oRight.find('li'),
		aLLi=oLeft.find('li'),
		index=0,
		timer = null;
	aRLi.hover(function(){
		index=$(this).index()
		$(this).addClass('active').siblings().removeClass();
		aLLi.eq(index).addClass('active').siblings().removeClass();
		aLLi.eq(index).stop().animate({'opacity':1},300).siblings().stop().animate({'opacity':0},300);
		stopFoucs();
	})
	oLeft.mouseenter(function(){
		stopFoucs();
	}).mouseleave(function(){		
		startFocus();
	});
	
	function stopFoucs(){
		clearInterval(timer);
	}
})


$('.send_position').click(function(){ 
     
	var tel_num=$('.tel_num').val();
	var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
	 
	var tel_num=$('.tel_num').val();
	
	if(tel_num=='')
	{
		alert('请输入手机号');
		return false;
	}
	else
	{
		if (reg.test(tel_num)) 
		 {
		 }
		 else
		 {
			  alert('请输入正确的电话号码');
			  return false;
		 }
	}
	
	var info=$('#address_info').attr('data')
	 $.ajax({
				    type:'POST',                         
				    url:'sms_api/SendSms.php',
				    data:{content:info,tel:tel_num},                      
				    dataType:'html',
					success:function(data)
					{  
					   if(data>0)
					   {
						   alert('发送成功!')
					   }
					   else
					   {
						   alert('发送失败')
					   }
					},
			  }); 
	 
	 
});



$('.txt_btnn2').click(function(){ 
     
	var tel_num=$('#tc_tel').val();
	var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
	 
	var tel_num=$('.tel_num').val();
	
	if(tel_num=='')
	{
		alert('请输入手机号');
		return false;
	}
	else
	{
		if (reg.test(tel_num)) 
		 {
		 }
		 else
		 {
			  alert('请输入正确的电话号码');
			  return false;
		 }
	}
	
	var info=$('#address_info').attr('data')
	 $.ajax({
				    type:'POST',                         
				    url:'sms_api/SendSms.php',
				    data:{content:info,tel:tel_num},                      
				    dataType:'html',
					success:function(data)
					{  
					   if(data>0)
					   {
						   alert('发送成功!')
					   }
					   else
					   {
						   alert('发送失败')
					   }
					},
			  }); 
	 
	 
});




</script>
	
	
	
	<div class='usr_btn_center'>

                <div class='focus' id='focus'>
                  <div class='left'>
                    <ul>
                     <li class='active' style='opacity:1; filter:alpha(opacity=100);'><p>图一</p>
                            <div style='width:550px; height:220px; margin-left:20px;'>".$row['gallery']."</div>
                     </li>
                     <li style='padding:10px; font-size:14px;'><span>公交：".$row['line']."</span></li>
                     <li style='padding:10px; font-size:14px;' id='address_info'  data='".$row['address']."'>".$row['address']."
					 <br>
                     <br>
                     <p></p>
                     
                     <input style='width:150px; height:24px; border:1xp solid #999;' type='text' class='tel_num' placeholder='请输入手机号'>
					 <input style='width:60px; height:28px;' class='send_position' type='button' value='发送'>
					 </li>
                     <li style='padding:10px; font-size:14px;'>工作日周一至周五：".$row['work_time']."</li>
                    </ul>
                  </div>
                  <div class='right'>
                    <ul>
                     <li class='active'>+查看实体店<br/>View Store</li>
                     <li>+附近交通<br/>Direction</li>
                     <li data='".$row['address']."'>+发送店地址到手机<br/>Send To Mobile</li>
                     <li>+营业时间<br/>Business  Hours</li>
                     <button class='tc' style='margin:30px 0 0 40px; border:0px; cursor:pointer;'><img src='themes/meilele/imgs/1.png'></button>
                    </ul>
                   </div>
                </div>	
            
    </div>
	
	";
   
  
?>