<!DOCTYPE html>
<html onload="createCode()">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<script src="themes/meilele/js/jq.js"></script>
<script src="themes/meilele/js/jquery.json.min.js"></script>

<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<link href="themes/meilele/css/goods_wide.min.css?1112fv" rel="stylesheet" type="text/css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,utils.js')); ?>
<script src="themes/meilele/js/common.js"></script>
<link href="themes/meilele/css/magiczoom.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="themes/meilele/js//mzp-packed-me.js"></script>
</head>
<body>
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className="root_body";window.LOAD=true;}else{window.LOAD=false;}})()</script>

<?php echo $this->fetch('library/page_header.lbi'); ?> 
<?php $_from = get_advlist_by_id(15); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
<div class="w mt10 mb10 top_banner" style="height:60px;overflow:hidden;" id="JS_banner">
  <div id="JS_banner_in">
  <a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="_blank" style="display:block;height:60px;background:url(<?php echo $this->_var['ad']['image']; ?>) center 0 no-repeat;"><img src="themes/meilele/images/blank.gif" style="background:none" height="60" width="100%"></a>
  </div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div id="JS_nav_guide" class="nav_guide w"><?php echo $this->fetch('library/ur_here.lbi'); ?></div>

<div class="goods_title w" id="JS_goods_title_34742">
  <h1 class="goods_name"><span id="JS_attr_title_name"><?php echo $this->_var['goods']['goods_style_name']; ?></span> <span class="goods_sn" id="JS_attr_title_sn">编号：<?php echo $this->_var['goods']['goods_sn']; ?></span> <strong id="JS_attr_title_event" class="red f14"></strong> </span> </h1>
  <h2 class="goods_sub_title red" id="JS_attr_sub_title"> <?php echo $this->_var['goods']['goods_brief']; ?> </h2>
</div>
<div class="w clearfix">
  <div class="big_img Left">
    <div id="JS_view_current_big_img">
      <div class="img">
        <div id="JS_attr_limit_buy" class="img_tags limit_buy" style="display:none"></div>
      <a id="Zoomer" class="MagicZoomPlus" rel="" title="点击查看<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>图片"  href="<?php echo $this->_var['pictures']['0']['img_url']; ?>" onclick="window.open('gallery.php?id=<?php echo $this->_var['goods']['goods_id']; ?>'); return false;"> 
      <img class="img_<?php echo $this->_var['goods']['goods_id']; ?>" src="<?php echo $this->_var['pictures']['0']['img_url']; ?>" width="680" height="374" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /> </a>
      </div>
      <a class="float_view" href="javascript:;" onclick="window.open('gallery.php?id=<?php echo $this->_var['goods']['goods_id']; ?>'); return false;" title="点击查看<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>图片"></a> </div>
	  <script language="javascript">
	  var screenWidth=window.screen.width;
	  if(screenWidth>=1280){
	  		$('#Zoomer').attr('rel', 'selectors-effect:false;zoom-fade:true;background-opacity:70;zoom-width:250;zoom-height:200;caption-source:img:title;thumb-change:mouseover');
		}else{
			$('#Zoomer').attr('rel', 'selectors-effect:false;zoom-fade:true;background-opacity:70;zoom-width:410;zoom-height:372;caption-source:img:title;thumb-change:mouseover');
		}
	  
	  </script>
	  <?php echo $this->fetch('library/goods_gallery.lbi'); ?>
    <div class="extra clearfix">
      <div id="bdshare" class="Left bdshare_t bds_tools get-codes-bdshare">
        <div class="bds_more extra_field share_bd"> <span class="extra_icon"></span><span class="extra_text">分享</span> </div>
      </div>
      <div id="JS_collect_2" class="Left extra_field collect" onClick="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)"> <span class="extra_icon"></span><span class="extra_text co red">收藏</span><span class="extra_text cd">已收藏</span> </div>

      <span class="gray Right share_text">付款方式：<a class="pays gray" target="_blank" title="付款方式">支付宝|网银|刷卡</a></span>
     
    </div>
  </div>
  <div id="JS_panel_34742" class="panel Right current">
    <div class="sale_price">
      <p style="float:left;" id="JS_panel_row_price_34742" class="gray"><span id="JS_panel_shop_price_34742" class="" style="font-size:14px;">市场价：<span class="yen"><del><?php echo $this->_var['goods']['market_price']; ?></del></span>&emsp;</span></p>
      <div style="float:left;font-size:14px;" class="p_left"><span class="red" id="JS_panel_price_type_34742" >本站价：</span><span id="JS_panel_show_price_34742" class="red f24 yen bold" <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>style="font-size:12px; text-decoration:line-through"<?php endif; ?>><?php echo $this->_var['goods']['shop_price_formated']; ?></span>&emsp;&emsp; 
      </div>
	  <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
	  <div class="p_left" style="font-size:12px;"><span class="red" id="JS_panel_price_type_34742" style="font-size:12px;">促销价：</span><span id="JS_panel_show_price_34742" class="red f24 yen bold"><?php echo $this->_var['goods']['promote_price']; ?></span>&emsp;&emsp;
        
      </div>
	  <?php endif; ?>
    </div>
   
   
   <?php if ($this->_var['goods_clors']): ?>
   <div style="width:480px; height:80px; margin:5px 0 5px 0; float:none; clear:both;">
   
   		<span style=" font-size:14px; color:#666; float:left;">颜&emsp;色：</span>
        
        <?php $_from = $this->_var['goods_clors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'color');if (count($_from)):
    foreach ($_from AS $this->_var['color']):
?>
        
        <a href="javascript:colorhuan('<?php echo $this->_var['color']['goods_id']; ?>','<?php echo $this->_var['color']['col_id']; ?>')" style="width:100px; height:50px; float:left; margin-left:10px; padding:10px; text-decoration:none;">
        	<img src="<?php echo $this->_var['color']['img']; ?>" width="100" height="50" style="border:1px solid #999;">
            <p style="font-size:12px; line-height:20px; text-align:center;"><?php echo $this->_var['color']['color_name']; ?></p>
        </a>
        
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
        
   </div>
    <?php endif; ?>
   
   <div class="infos clearfix" style="font-size:14px;">
      <ul>
	  <?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?>
	  <?php echo $this->smarty_insert_scripts(array('files'=>'lefttime.js')); ?>
        <li class="gray" style="" id="JS_panel_activity_21994" >活&emsp;动：<span class="active"><span id="JS_panel_active_type_21994" class="active_type" style="font-size:14px;">限时促销</span><span class="time none" id="JS_panel_time_21994">剩余时间：<font class="f4" id="leftTime"><?php echo $this->_var['lang']['please_waiting']; ?></font></span></span></li>
	  <?php endif; ?>	
	  <?php if ($this->_var['goods']['is_real'] == 1): ?>
		<?php if ($this->_var['regions']): ?>
	 <!-- <li class="clearfix" id="JS_express_nav_34742">
	  <div class="ps_litext gray">配送至：</div>
	  <?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
	  <?php if ($this->_var['key'] == 0): ?>
	  <div class="nav1" id="JS_peisong_text_address_34742"><span id="JS_peisong_address_nav_34742"><?php echo $this->_var['value']['region_name']; ?></span><span class="icon"></span></div>
	  <div class="spot_mix" id="JS_stock_div_34742"> <span style="color:#FF0000" id="JS_stock_info_34742"><?php $_from = $this->_var['value']['shippings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?><?php echo $this->_var['shipping']['shipping_name']; ?>:<?php if ($this->_var['goods']['is_shipping']): ?>免运费 <?php else: ?><?php echo $this->_var['shipping']['shipping_price']; ?>元 <?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span> </div>
	  <?php endif; ?>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	  <div class="ps_main" id="JS_express_type_34742">
		<div class="select_area clearfix">
		  <div class="container none" id="JS_peisong_address_34742" onMouseOver="GL[34742].showAdressBox()" onMouseOut="GL[34742].hideAddress();"> <a style="position:absolute;display:block;width: 16px;height: 16px;top:0;right: 0; background:#787878;color: #fff;line-height: 16px;text-align: center;" href="javascript: void(0);" onClick="GL[34742].hideAddress();return false;">✕</a>
			<div class="d_list">
			  <div class="province_name" id="JS_transfer_province_34742"> 
			  <?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['value']):
?>
				<a href="javascript:;" class="province_list" onclick="show_shipping('<?php echo $this->_var['value']['region_name']; ?>','<?php $_from = $this->_var['value']['shippings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'shipping');if (count($_from)):
    foreach ($_from AS $this->_var['shipping']):
?><?php echo $this->_var['shipping']['shipping_name']; ?>:<?php if ($this->_var['goods']['is_shipping']): ?>免运费 <?php else: ?><?php echo $this->_var['shipping']['shipping_price']; ?>元 <?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>')"><?php echo $this->_var['value']['region_name']; ?></a>
			 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</li>-->
	<script>
		function show_shipping(name,price)
		{
		document.getElementById("JS_peisong_address_nav_34742").innerHTML = name;
		document.getElementById("JS_stock_info_34742").innerHTML = price;
		}

		</script>
<?php endif; ?>
<?php endif; ?>
	  
        <li class="gray" style="font-size:14px;">品&emsp;牌：<a href="<?php echo $this->_var['goods']['goods_brand_url']; ?>" ><?php echo $this->_var['goods']['goods_brand']; ?></a></li>
        <li class="gray" style="font-size:14px;">已&emsp;售：<a href="javascript:void(0);" id="JS_boughts_notes_34742" class="red" style="font-size:14px;"><span style="font-size:14px;" id="JS_boughts_number"><?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><?php echo $this->_var['goods_data']['total_sells']; ?><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></span>件</a>&ensp;			
          用户评分：<span style="font-size:14px;" class="pf pf_<?php echo $this->_var['goods']['comment_rank']; ?>"></span>（<a href="javascript:void(0);" id="JS_comment_scroll_34742" class="gray">已有<span id="JS_comment_num" class="JS_comment_num">0</span>人评价</a>）</li>
        <li class="gray" style="font-size:14px;">承&emsp;诺：<!--由 <span class="red">天明眼镜</span> 发货并提供售后服务。--> 01.线上线下同价 &nbsp;&nbsp;02.免费港式验光&nbsp;&nbsp;03.7天退换&nbsp;&nbsp;04.终身保修 </li>
        <li id="JS_panel_gift_34742" class="gray none"></li>
       <!-- <li class="tips" id="JS_panel_tips_nav_34742">
          
          <div class="tips_i_box"><a id="JS_expr_url" class="tip_i first" target="_blank">到店体验</a><span class="line">|</span><a class="tip_i" target="_blank">45天退换</a><span class="line">|</span><a class="tip_i" target="_blank">质保三年</a><span class="line">|</span><a class="tip_i" target="_blank">价格保护</a></div>
          <a href="javascript:void(0);" class="goods_kefu"></a></li>-->
        
      </ul>
    </div>
	<script language="javascript">
	function colorhuan(goods_id,id)
	{
		var action="huantu1";
		var hh_t="img_"+goods_id;
		
		//alert(hht);
		$.ajax({
				    type:"POST",                         
				    url:"uc3.php",
				    data:{action:action,val:id,goods_id:goods_id},                      
				    dataType:"text",
					success:function(data)
					{  
					   $('.'+hh_t).attr('src',data);
					},
			  }); 
	}
	
	
	
	  function changeAtt(t) {
		var obj = document.getElementById('spec_value_'+t.getAttribute("name"));
		if (obj){
			obj.checked='checked';
		}
		
		for (var i = 0; i<t.parentNode.childNodes.length;i++) {
				if (t.parentNode.childNodes[i].className == 'current') {
					t.parentNode.childNodes[i].className = '';
				}
			}
		t.className = "current";
		changePrice();
		}
		
		
	function tt_dushu(value)
	{
         
		if(value=="1")
		{
			document.getElementById('tb_js').style.display="block";
			document.getElementById('tb_ys').style.display="none";
			document.getElementById('tb_jj').style.display="none";
			document.getElementById('tb_lh').style.display="none";
		}
		
		if(value=="2")
		{
			document.getElementById('tb_js').style.display="none";
			document.getElementById('tb_ys').style.display="block";
			document.getElementById('tb_jj').style.display="none";
			document.getElementById('tb_lh').style.display="none";
		}
		
		if(value=="3")
		{
			document.getElementById('tb_js').style.display="none";
			document.getElementById('tb_ys').style.display="none";
			document.getElementById('tb_jj').style.display="block";
			document.getElementById('tb_lh').style.display="none";
		}
		
		if(value=="4")
		{
			document.getElementById('tb_js').style.display="none";
			document.getElementById('tb_ys').style.display="none";
			document.getElementById('tb_jj').style.display="none";
			document.getElementById('tb_lh').style.display="block";
		}
	}	
		
	  </script>
      
      <?php if ($this->_var['or_jingpian'] == 1): ?>
       <div style="width:470px; height:24px;">
       
      	 <span style="font-size:14px; color:#666; float:left;">光度范围：</span><div style="width:60px; float:left; height:24px; background:#dcdcdc; text-align:center; line-height:24px;"><a href="javascript:void(0);" style="color:red; text-decoration:none;">现有片</a></div><div style="width:98px; float:left; height:22px; border:1px solid #dcdcdc; text-align:center; line-height:24px;">0度-1000度</div>
      </div>
      <?php endif; ?>
      <style>
	    #tb_js,tb_ys,tb_jj,tb_lh{width:470px;}
      	#tb_js td,#tb_ys td,#tb_jj td,#tb_lh td{border:1px solid #ddd; text-align:center; font-weight:500; line-height:24px; width:86px; height:26px;}
      </style>
      
     <?php if ($this->_var['or_jingpian'] <> 2): ?>
    <p id="jingpian" > 
<div style="width:470px; clear:both;">
<p style="font-size:14px; line-height:30px;">OPTOMETRY LIST / <span style="font-size:14px; line-height:30px; font-weight:700;">请填写您的验光单</span></p>
<form id="jingpian_canshu">
<table class="jobjs" width="470" id="tb_js" style="display:block;">
   
      <tr>
        <td>
            <select id="yj_type" onChange="tt_dushu(this.value)">
                <option value="1" selected>近视</option>
                <option value="2">远视</option>
                <option value="3">渐进</option>
                <option value="4">老花</option>
            </select>
        </td>
        <td>度数(Sph)</td>
        <td>瞳距(PD)</td>
        <td>散光(Cyl)</td>
        <td>轴位(Axis)</td>
      </tr>
      
      
     
      <tr>
        <td>右眼R</td>
        <td>
        	<select name="" id="y_dushu">
               <?php $_from = $this->_var['dushu_info1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               
                  <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
              
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td rowspan="2">
        	<select name="" id="y_tongju">
                <?php $_from = $this->_var['dushu_info3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name=""  id="y_sanguang">
                <option value="无">无</option>
                <?php $_from = $this->_var['dushu_info4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name=""  id="y_zhouwei">
                <option value="无">无</option>
               <?php $_from = $this->_var['dushu_info5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
      </tr>
      
      <tr>
      	<td>左眼L</td>
        <td>
        	<select name="" id="z_dushu">
               <?php $_from = $this->_var['dushu_info1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name=""  id="z_sanguang">
                <option value="无">无</option>
                <?php $_from = $this->_var['dushu_info4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="z_zhouwei">
                <option value="无" >无</option>
                <?php $_from = $this->_var['dushu_info5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
      </tr>
 
     

</table>

<table class="jobjs" width="470" id="tb_ys" style="display:none;">
   
      <tr>
        <td>
            <select id="yj_type" onChange="tt_dushu(this.value)">
                
                <option value="2" selected>远视</option>
                <option value="1">近视</option>
                <option value="3">渐进</option>
                <option value="4">老花</option>
            </select>
        </td>
        <td>度数(Sph)</td>
        <td>瞳距(PD)</td>
        <td>散光(Cyl)</td>
        <td>轴位(Axis)</td>
      </tr>

         <tr>
        <td>右眼R</td>
        <td>
        	<select name="" id="y_dushu">
               <?php $_from = $this->_var['dushu_info2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
              <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td rowspan="2">
        	<select name="" id="y_tongju">
                <?php $_from = $this->_var['dushu_info3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
              <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="y_sanguang">
                <option value="无" >无</option>
                <?php $_from = $this->_var['dushu_info4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
              <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="y_zhouwei">
                <option value="无" >无</option>
               <?php $_from = $this->_var['dushu_info5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
              <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
      </tr>
      
        <tr>
      	<td>左眼L</td>
        <td>
        	<select name="" id="z_dushu">
               <?php $_from = $this->_var['dushu_info2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="z_sanguang">
                <option value="无" >无</option>
                <?php $_from = $this->_var['dushu_info4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
                <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="z_zhouwei">
                <option value="无" >无</option>
                <?php $_from = $this->_var['dushu_info5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
      </tr>


</table>

<table class="jobjs" width="470" id="tb_jj" style="display:none;">
   
      <tr>
        <td>
            <select id="yj_type" onChange="tt_dushu(this.value)">
                <option value="3" selected>渐进</option>
                <option value="1">近视</option>
                <option value="2">远视</option>
               
                <option value="4">老花</option>
            </select>
        </td>
        <td>度数(Sph)</td>
        <td>瞳距(PD)</td>
        <td>散光(Cyl)</td>
        <td>轴位(Axis)</td>
        <td>下加光(Add)</td>
      </tr>

        <tr>
        <td>右眼R</td>
        <td>
        	<select name="" id="y_dushu">
               <?php $_from = $this->_var['dushu_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
              <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td rowspan="2">
        	<select name="" id="y_tongju">
                <?php $_from = $this->_var['dushu_info3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
              <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="y_sanguang">
                <option value="无" >无</option>
                <?php $_from = $this->_var['dushu_info4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="y_zhouwei">
                <option value="无" >无</option>
               <?php $_from = $this->_var['dushu_info5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        
        
         <td rowspan="2">
        	<select name="" id="y_xiajiaguang">
                <option value="无" >无</option>
               <?php $_from = $this->_var['dushu_info6']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
      </tr>
      
        <tr>
      	<td>左眼L</td>
        <td>
        	<select name="" id="z_dushu">
               <?php $_from = $this->_var['dushu_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="z_sanguang">
                <option value="无" >无</option>
                <?php $_from = $this->_var['dushu_info4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
                <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="z_zhouwei">
                <option value="无">无</option>
                <?php $_from = $this->_var['dushu_info5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        
       
      </tr>

</table>

<table class="jobjs" width="470" id="tb_lh" style="display:none;">

      <tr>
        <td>
            <select id="yj_type" onChange="tt_dushu(this.value)">
                <option value="4" selected>老花</option>
                <option value="1">近视</option>
                <option value="2">远视</option>
                <option value="3">渐进</option>
                
            </select>
        </td>
        <td>度数(Sph)</td>
        <td>瞳距(PD)</td>
        <td>散光(Cyl)</td>
        <td>轴位(Axis)</td>
      </tr>

           <tr>
        <td>右眼R</td>
        <td>
        	<select name="" id="y_dushu">
               <?php $_from = $this->_var['dushu_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td rowspan="2">
        	<select name="" id="y_tongju">
                <?php $_from = $this->_var['dushu_info3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="y_sanguang">
                <option value="无">无</option>
                <?php $_from = $this->_var['dushu_info4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="y_zhouwei">
                <option value="无">无</option>
               <?php $_from = $this->_var['dushu_info5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
      </tr>
      
           <tr>
      	<td>左眼L</td>
        <td>
        	<select name="" id="z_dushu">
               <?php $_from = $this->_var['dushu_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
              <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="z_sanguang">
                <option value="无">无</option>
                <?php $_from = $this->_var['dushu_info4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
        <td>
        	<select name="" id="z_zhouwei">
                <option value="无">无</option>
                <?php $_from = $this->_var['dushu_info5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'dushu');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['dushu']):
?>
               <option value="<?php echo $this->_var['dushu']; ?>"><?php echo $this->_var['dushu']; ?></option>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </td>
      </tr>

 
</table>

</form>
</div>
 </p>
 
 <?php endif; ?>
 

      
	
    <div id="JS_join_list" class="choose" style="font-size:14px;">
    <form action="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
	
      <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
	  <?php if ($this->_var['spec']['attr_type'] == 1): ?>
                      <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
      <dl class="clearfix">
        <dt><?php echo $this->_var['spec']['name']; ?>：</dt>
        <dd>
		<?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');$this->_foreach['spec_values'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spec_values']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
        $this->_foreach['spec_values']['iteration']++;
?>
		<a class="<?php if (($this->_foreach['spec_values']['iteration'] - 1) == 0): ?>current<?php endif; ?>" onclick="changeAtt(this)" href="javascript:;" target="_self"  name="<?php echo $this->_var['value']['id']; ?>" title="<?php echo $this->_var['value']['label']; ?>"><?php echo $this->_var['value']['label']; ?></a>
		<input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if (($this->_foreach['spec_values']['iteration'] - 1) == 0): ?>checked<?php endif; ?> />  
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		
		</dd>
      </dl>
	  <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
				  <?php endif; ?>
			      <?php endif; ?> 
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      	
      
      <dl class="clearfix" style="font-size:14px;">
        <dt>数&emsp;量：</dt>
        <dd>
          <input class="number" id="JS_goods_number_34742" value="1" name="number" onblur="changePrice();"/>
          <strong class="number_panel"><a href="javascript:;" id="JS_goods_number_add_34742"></a><a href="javascript:;" id="JS_goods_number_del_34742"></a></strong> 件 <strong style="margin-left:20px"><?php echo $this->_var['lang']['amount']; ?>：</strong><font id="ECS_GOODS_AMOUNT" class="red f24 yen bold"></font></dd>
      </dl>
      <div class="buttons">
         <?php if ($this->_var['or_jingpian'] == 2): ?>
      	<a class="buy"  href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" title=""></a>&nbsp;&nbsp;
         <?php endif; ?>
         
         <?php if ($this->_var['or_jingpian'] == 1): ?>
      	<a class="buy"  href="javascript:or1_addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" title=""></a>&nbsp;&nbsp;
         <?php endif; ?>
         
         
         <?php if ($this->_var['or_jingpian'] == 0): ?>
      	<a class="buy"  href="javascript:or1_addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" title=""></a>&nbsp;&nbsp;
         <?php endif; ?>
        
        <a class="theme-login" href="meibai.php?goods_id=<?php echo $this->_var['goods']['goods_id']; ?>"><img src="themes/meilele/images/goods2/posxx.png"></a>&nbsp;&nbsp;
        <?php if ($this->_var['or_jingpian'] == 0): ?>
        <a class="tff" href="javascript:;"><img src="themes/meilele/images/goods2/posxx1.png"></a>  
        <?php endif; ?>
      </div> 
      
      
      <script>
	  
	 
	  
	  function or1_addToCart(goods_id)
	  {

             var choose_table="tb_js";
			 $('#jingpian_canshu table').each(function()
			 {
				 if($(this).is(":visible"))
				 {
					 choose_table=this.id;
				 }
			 });

		    y_dushu=$("#" + choose_table +" "+ "#y_dushu option:selected").text();
			
			y_tongju=$("#" + choose_table +" "+ "#y_tongju option:selected").text();
			
			y_sanguang=$("#" + choose_table +" "+ "#y_sanguang option:selected").text();
			
			y_zhouwei=$("#" + choose_table +" "+ "#y_zhouwei option:selected").text();
			
			z_dushu=$("#" + choose_table +" "+ "#z_dushu option:selected").text();
			
			z_sanguang=$("#" + choose_table +" "+ "#z_sanguang option:selected").text();
			
			z_zhouwei=$("#" + choose_table +" "+ "#z_zhouwei option:selected").text();
			
			
			
			y_xiajiaguang=$("#" + choose_table +" "+ "#y_xiajiaguang option:selected").text();
			
			
			
			
			type=$("#yj_type").find("option:selected").val(); 
			
			
		   var jingpian_cs = {};//定义一个数组
	       jingpian_cs['type'] = type;
		   
		   jingpian_cs['y_dushu'] = y_dushu;
		   jingpian_cs['y_tongju'] = y_tongju;
		   jingpian_cs['y_sanguang'] = y_sanguang;
		   jingpian_cs['y_zhouwei'] = y_zhouwei;
		   jingpian_cs['z_dushu'] = z_dushu;
		   jingpian_cs['z_sanguang'] = z_sanguang;
		   jingpian_cs['z_zhouwei'] = z_zhouwei;
		   jingpian_cs['y_xiajiaguang'] = y_xiajiaguang;
		  
           
		   
		  
		   addDiyToCart1(goods_id,jingpian_cs);
		
		 /* $.ajax({
				    type:"POST",                         
				    url:"shopping_order.php",
				    data:{goods_id:goods_id,jingpian_cs:jingpian_cs},                      
				    dataType:"text",
					success:function(data)
					{  
					  alert(data);
					},
			  }); */
		 
		  
	  }
	  </script>
                
   <!-- <link rel="stylesheet" type="text/css" href="themes/meilele/css1/style.css"/>-->
    <link rel="stylesheet" type="text/css" href="themes/meilele/css1/style1.css"/>
    <script src="themes/meilele/js/js.KinerCode.js"></script>
       <div id="gray" style="left:0px;"></div>
     </form>
<div class="popup" id="popup" style="position:fixed;">

	<div class="top_nav" id='top_nav'>
		<div align="center">
			<i></i>
			<span><h4 style="color:#333;">在线预约到店体验</h4></span>
			<a class="guanbi"></a>
		</div>
	</div>
    
	<form action="uc3.php" method="POST" name="form1" id="form1"  onSubmit="return ren_test();">
	<div class="min">
	 
		<div class="tc_login">
		
         
            <div class="txt_top">请选择您想要去的<span style="color:red; font-size:16px;">城市</span>和<span style="color:red; font-size:16px;">门店</span>&nbsp;!</div>
            
            
         
            <input type="hidden" name="action" value="tt_jiao">
             <div class="txt_top1">
               <div class="txt_top_l">预约门店</div> 
               <div class="txt_top_r">
               		<select name="yuyue" class="selopt">
                     <?php if ($this->_var['city_info1']): ?>
                      <?php $_from = $this->_var['city_info1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'citys');$this->_foreach['city'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['city']['total'] > 0):
    foreach ($_from AS $this->_var['citys']):
        $this->_foreach['city']['iteration']++;
?>
                       <option value="<?php echo $this->_var['citys']['region_id']; ?>"><?php echo $this->_var['citys']['region_name']; ?></option>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endif; ?> 
                    
                    
                      <?php $_from = $this->_var['city_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'citys');$this->_foreach['city'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['city']['total'] > 0):
    foreach ($_from AS $this->_var['citys']):
        $this->_foreach['city']['iteration']++;
?>
                    	<option value="<?php echo $this->_var['citys']['region_id']; ?>"><?php echo $this->_var['citys']['region_name']; ?></option>
                        
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <span id="tt_md">
                    <select name="mendian" class="selopt1">
                    	
                    </select>
                    </span>
                    
               </div> 
             </div>
             <div class="txt_top1">
               <div class="txt_top_l">手机号码</div> 
               <div class="txt_top_r">
               		<div class="inp"><input name="tel" type="text" / class="put"></div>
               </div> 
             </div>
              <div class="txt_top1">
               <div class="txt_top_l">预约需求</div> 
               <div class="txt_top_r">
               		<div class="inp"><input name="content" type="text" / class="put" placeholder="请填写您要预约的商品"></div>
               </div> 
             </div>
             <div class="txt_top1">
               <div class="txt_top_l">验证码</div> 
               <div class="txt_top_r">
                    <div style="width:300px; height:26px;">
                        <div style="width:100px; height:26px; float:left;"><input name="yzm" id="inputCode" type="text" style="width:100px; height:26px; border:1px solid #09F;" placeholder="请输入验证码"></div>
                        <!-- <img src="captcha.php?is_login=1&amp;0.10862512394201129" alt="captcha" class="fkcaptcha" style="vertical-align: middle;cursor: pointer; width:100px; height:28px; " onclick="this.src='captcha.php?is_login=1&amp;'+Math.random()">   -->
                        
                        <div style="width:200px; margin-top:0px; height:25px; float:left;">
                            <div class="code1" id="checkCode1" onclick="createCodepx()" ></div>&nbsp;&nbsp; 
                            <a onclick="createCodepx()"></a>    
                        </div>
                     </div>
               </div> 
             </div>
             <div class="txt_top1_1">
               <div class="txt_top_zhu">注：为保证每份眼镜的质量，下单后统一由天明眼镜加工中心进行加工。</div>
             </div>
              <div class="txt_top1" style="">
              		<input class="txt_btnn1" style="margin:0 auto; text-align:center; display:block; border:0px;" type="submit" value="预约免费验光">
              </div>
              <div class="txt_top1">
               		<div class="txt_btnn2">发送体验店地址到手机上</div>
             </div>
            
        
   			
		</div>
	
	</div>
    </form>
    
    <style type="text/css">
    .code1{background:url(code_bg.jpg);font-family:Arial;font-style:italic;color:blue; font-size:20px;padding:2px 3px;letter-spacing:3px; font-weight:bolder; float:left;cursor:pointer;width:80px; height:25px; line-height:25px;text-align:center;vertical-align:middle; background:#F60;}
    a{text-decoration:none;}
    a:hover{text-decoration:underline;}
    </style>
    <script language="javascript" type="text/javascript">
        
		 var m=$('.selopt').val();
		 var mn=$('#m_selopt').val();
		// alert(mn);
		 
	   var action="yuyue";
	   var  two_action="yuyue2";
	   var  tress_action="ditu";
	   
	   
	   t_yuyue(action,m);
	   
	   d_yuyue(tress_action,m);
	   
	   t_yuyue2(two_action,m)
	   
		$(function(){
            $('.selopt').change(function(e){
				 action="yuyue";
				 two_action="yuyue2";
                  m=$(this).val();
				 
				 t_yuyue(action,m);
				  t_yuyue2(two_action,m);
				
 
            })
        });
		
		function t_yuyue(action,m)
		{
			$.ajax({
				    type:"POST",                         
				    url:"uc3.php",
				    data:{action:action,m:m},                      
				    dataType:"html",
					success:function(data)
					{  
					// alert(data);
					   $('#tt_md').html(data);
					  // $('#mm_md').html(data);
					},
			  }); 
		}
		
		
		function t_yuyue2(action,m)
		{
			$.ajax({
				    type:"POST",                         
				    url:"uc3.php",
				    data:{action:action,m:m},                      
				    dataType:"html",
					success:function(data)
					{  
					// alert(data);
					  
					   $('#mm_md').html(data);
					},
			  }); 
		}
		
      
	  function d_yuyue(action,m)
		{
			$.ajax({
				    type:"POST",                         
				    url:"uc3.php",
				    data:{action:action,m:m},                      
				    dataType:"html",
					success:function(data)
					{  
					//alert(data);
					   $('#dd_tt').html(data);
					},
			  }); 
		}
	  
	  
	   
		$(function(){
            $('#m_selopt').change(function(e){
				 action="m_yuyue";
                 m=$(this).val();
				 m_yuyue(action,m);
 
            })
        });
		
		
		function ti_yan_dian(tt)
		{
			t_d="ditu2";
			mx=tt;
			$.ajax({
				    type:"POST",                         
				    url:"uc3.php",
				    data:{action:t_d,m:mx},                      
				    dataType:"html",
					success:function(data)
					{  
				       // alert(data);
					   $('#dd_tt').html(data);
					},
			  });
		}
		
		function m_yuyue(action,m)
		{
			$.ajax({
				    type:"POST",                         
				    url:"uc3.php",
				    data:{action:action,m:m},                      
				    dataType:"html",
					success:function(data)
					{  
					// alert(data);
					   $('#mm_md').html(data);
					},
			  }); 
		}
		
		
		function tel_send()
		{
			var tel_num=$('#ms_tel').val();
			
			
			 var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
			 if(tel_num=="")
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
						alert("请输入正确的电话号码");
						return false;
				   }
			  }
			  
			  var info=$('#ms_address').val();
			  
			  if(info=="")
			  {
				  return false;
			  }
			  else
			  {
			         $.ajax({
							type:"POST",                         
							url:"sms_api/SendSms.php",
							data:{content:info,tel:tel_num},                      
							dataType:"html",
							success:function(data)
							{  
							   if(data>0)
							   {
								   alert('发送成功!短信将在1-15分钟内发送到您的手机,请耐心等待...')
							   }
							   else
							   {
								   alert('发送失败')
							   }
							},
					  }); 
			  
			  }
			  
			  
			   
			
		}
		
		
		
		
		
		
		function ren_test()
		{

			m_action="check_word";
			if(form1.mendian.value=="0"){
				alert("请选择预约门店!");
				form1.mendian.focus();
				return false;
			  }
			  
			 if(form1.tel.value==""){
				alert("请填写电话!");
				form1.tel.focus();
				return false;
			  }
			  
			  if(form1.content.value==""){
				alert("请填写需求!");
				form1.content.focus();
				return false;
			  } 
			  
			  if(form1.yzm.value==""){
				alert("请填写验证码!");
				form1.yzm.focus();
				return false;
			  } 
			  validateCode();
			 
			  
			return true;
		}
		
		
        var code1;
        function createCodepx() {
            code1 = "";
            var codeLength = 4; //验证码的长度
            var checkCode = document.getElementById("checkCode1");
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
                checkCode.className = "code1";
                checkCode.innerHTML = code1;
            }
        }
        function validateCode()
        {
            var inputCode = document.getElementById("inputCode").value;
            if (inputCode.length <= 0)
            {
                alert("请输入验证码！");
            }
            else if (inputCode.toUpperCase() != code.toUpperCase())
            {
                alert("验证码输入有误！");
                createCode();
            }
            else
            {
                alert("验证码正确！");
            }       
        }   
     </script>

     
    <script type="text/javascript">

//窗口效果
//点击登录class为tc 显示
$(".tff").click(function(){
	$("#gray").show();
	$("#popup").show();//查找ID为popup的DIV show()显示#gray
	tc_center();
});
//点击关闭按钮
$("a.guanbi").click(function(){
	$("#gray").hide();
	$("#popup").hide();//查找ID为popup的DIV hide()隐藏
})

//窗口水平居中
$(window).resize(function(){
	tc_center();
});

function tc_center(){
	var _top=($(window).height()-$(".popup").height())/2;
	var _left=($(window).width()-$(".popup").width())/2;
	
	$(".popup").css({top:_top,left:_left});
}	
</script>
    <script type="text/javascript">
$(document).ready(function(){ 
createCodepx();
	$(".top_nav").mousedown(function(e){ 
		/*$(this).css("cursor","move");*///改变鼠标指针的形状 
		var offset = $(this).offset();//DIV在页面的位置 
		var x = e.pageX - offset.left;//获得鼠标指针离DIV元素左边界的距离 
		var y = e.pageY - offset.top;//获得鼠标指针离DIV元素上边界的距离 
		$(document).bind("mousemove",function(ev){ //绑定鼠标的移动事件，因为光标在DIV元素外面也要有效果，所以要用doucment的事件，而不用DIV元素的事件 
		
			$(".popup").stop();//加上这个之后 
			
			var _x = ev.pageX - x;//获得X轴方向移动的值 
			var _y = ev.pageY - y;//获得Y轴方向移动的值 
		
			$(".popup").animate({left:_x+"px",top:_y+"px"},10); 
		}); 

	}); 

	$(document).mouseup(function() { 
		$(".popup").css("cursor","default"); 
		$(this).unbind("mousemove"); 
	});
}) 
</script>

   
    </div>
	</form>
    
    <div style="width:480px; height:200px; margin-top:10px;">
    	<div style="width:220px; height:160px; margin-top:20px; float:left;"><img src="/themes/meilele/imgs/stubab.jpg" / width="100%" height="100%"></div>
      	<div style="width:240px; height:160px; margin-top:20px; margin-left:8px; float:left;">
        	<h1 style="font-size:14px;">体验店地址:</h1>
            
             <div style="width:240px; height:80px; overflow-y:auto; overflow-x:hidden;">
             	<ul style="list-style:none;">
                
                   <?php $_from = $this->_var['suppliers_info_t']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'citys');$this->_foreach['city'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['city']['total'] > 0):
    foreach ($_from AS $this->_var['citys']):
        $this->_foreach['city']['iteration']++;
?>
                
                	<li class="tabx1" style="list-style:none; width:100px; height:40px; float:left; font-size:12px; line-height:40px; text-align:center;">
                    <a href="javascript:void()"><?php echo $this->_var['citys']['suppliers_name']; ?></a>
                    </li>
                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
               </ul>
             </div>
             <div class="tabx" style="width:120px; font-size:12px; height:24px; background:#F00; color:#FFF; line-height:24px; text-align:center; margin-top:15px; cursor:pointer;">免费发送地址到手机</div> 
             
        </div>
    </div>
 
<link rel="stylesheet" href="themes/meilele/css/lanrenzhijia.css" media="all">

<script>
jQuery(document).ready(function($) {
	$('.theme-login').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover').slideDown(200);
		
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
						
						$('#newdiv').html(module);   
					 },

		  }); 
		
		
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	})

})
</script> 
    
<style>
/*#gray2{width:100%;height:100%;background:rgba(0,0,0,0.3);position:fixed;top:0px;display:none;z-index:99;}*/
.popup1{width:480px; height:auto;background-color:#fff;position:fixed;z-index:100;border:1px solid #ebeaea;left:400px;top:96px;display:none;/*box-shadow:2px 2px 20px #666666;*/ border:1px solid #ccc;}
.popup1 .top_nav1{width:480px;height:46px;position:relative;}
.popup1 .top_nav1 span{font:18px/18px 'microsoft yahei';color:#707070;display:block;position:absolute;top:13px;left:16px; color:#000; font-weight:600;}
.popup1 .top_nav1 a.guanbi1 {background:url(themes/meilele/imgs/popup_guanbi.png) repeat 0px 0px; width:35px; height: 35px; display: block; position:absolute;top:8px;right:10px;cursor:pointer;}
.popup1 .top_nav1 a.guanbi1 span {display: none;}
.popup1 .top_nav1 a.guanbi1:hover {background: url(themes/meilele/imgs/popup_guanbi.png) repeat 0px -35px;}
.popup1 .min1{width:480px;height:auto; margin:auto; padding-bottom:10px;}
.tc_login1{width:460px;height:460px;background-color:#fff; margin:auto;}
.tiyan_box{width:460px; height:300px; border:1px solid #ddd;}
.tiyan_box_1{width:460px; height:30px; margin-top:10px;}
.tiyan_box_1_left{width:120px; height:30px; float:left; text-align:right; font-size:14px; line-height:30px; color:#333;}
.tiyan_box_1_right{width:310px; height:30px; float:right;}
.tiyan_box_sel{width:150px; height:30px; line-height:30px; border:1px solid #ddd;}
.tiyan_box_inp{width:148px; height:30px; border:1px solid #ddd;}
.tiyan_box_inpx{width:100px; height:30px; border:1px solid #ddd;}
.tiyan_box_butt{width:80px; height:30px; background:#F00; border:0px; color:#FFF; cursor:pointer; border-radius:5px;}
</style>
<!--<div align="center">
	<p><a href="#" class="tabx">登录</a></p>
</div>-->

<div id="gray2"></div>

<div class="popup1" id="popup2">

	<div class="top_nav1" id='top_nav1'>
		<div align="center">
			<i></i>
			<span><strong>全国共有<?php echo $this->_var['suppliers_num']; ?>家体验店</strong></span>
			<a class="guanbi1"></a>
		</div>
	</div>
	
	<div class="min1">
    
		<div class="tc_login1">
			<div class="tiyan_box">
                <div style="width:100%; height:100%; overflow:hidden;">
                
                <span id="dd_tt"><?php echo $this->_var['suppliers_info']['gallery']; ?>
                <input type="hidden"  value="suppliers_info.address" >
                </span>
                
                </div>
            </div>
            <div class="tiyan_box_1">
            	<div class="tiyan_box_1_left">城市：</div>
                <div class="tiyan_box_1_right">
                	<select class="tiyan_box_sel" name="m_city" id="m_selopt">
                    	
                        
                        <?php if ($this->_var['city_info1']): ?>
                        <?php $_from = $this->_var['city_info1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'citys');$this->_foreach['city'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['city']['total'] > 0):
    foreach ($_from AS $this->_var['citys']):
        $this->_foreach['city']['iteration']++;
?>
                       
                        <option value="<?php echo $this->_var['citys']['region_id']; ?>"><?php echo $this->_var['citys']['region_name']; ?></option>
                       
                         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                         <?php endif; ?>
                         <?php $_from = $this->_var['city_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'citys');$this->_foreach['city'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['city']['total'] > 0):
    foreach ($_from AS $this->_var['citys']):
        $this->_foreach['city']['iteration']++;
?>
                          <option value="<?php echo $this->_var['citys']['region_id']; ?>"><?php echo $this->_var['citys']['region_name']; ?></option>
                         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                       
                    </select>
                </div>
            </div>
            <div class="tiyan_box_1">
            	<div class="tiyan_box_1_left">体验店：</div>
                <div class="tiyan_box_1_right">
                
                  <span id="mm_md">

                	<select class="tiyan_box_sel" id="ti_yan" onChange="ti_yan_dian()">

                  
                        
                    </select>
                    </span>
                </div>
            </div>
            <div class="tiyan_box_1">
            	<div class="tiyan_box_1_left">手机号：</div>
                <div class="tiyan_box_1_right">
                	<input class="tiyan_box_inp" id="ms_tel" type="text"  placeholder="请输入手机号码"/>
                </div>
            </div>
      
             <div class="tiyan_box_1">
            	<div class="tiyan_box_1_left"></div>
                <div class="tiyan_box_1_right">
                	<button class="tiyan_box_butt" onClick="javascript:tel_send()">免费发送</button>
                </div>
            </div>
           
   			
		</div>
    
	</div>

</div>

  
<script type="text/javascript">
//窗口效果
//点击登录class为tc 显示
$(".tabx").click(function(){
	$("#gray2").show();
	$("#popup2").show();//查找ID为popup的DIV show()显示#gray
	tc_center1();
});

$(".tabx1").click(function(){
	$("#gray2").show();
	$("#popup2").show();//查找ID为popup的DIV show()显示#gray
	tc_center1();
});


//点击关闭按钮
$("a.guanbi1").click(function(){
	$("#gray2").hide();
	$("#popup2").hide();//查找ID为popup2的DIV hide()隐藏
})

//窗口水平居中
$(window).resize(function(){
	tc_center1();
});

function tc_center1(){
	var _top=($(window).height()-$(".popup1").height())/2;
	var _left=($(window).width()-$(".popup1").width())/2;
	
	$(".popup1").css({top:_top,left:_left});
}	
</script>
   
   
<!--<div class="theme-buy">
<a class="btn btn-primary btn-large theme-login" href="javascript:;">点击查看效果</a>
</div>-->
<div class="theme-popover" style="border:0px;">
  <div class="theme-poptit">
          <a href="javascript:;" title="关闭" class="close">×</a>
          <h3>天明眼镜试戴</h3>
     </div>
   <div id="newdiv">
   
   </div>
</div>
<div class="theme-popover-mask"></div>
  
    
  </div>
  
</div>

<div class="w clearfix group_area mt10">
<?php if ($this->_var['package_goods_list'] || $this->_var['fittings']): ?>
<div id="JS_goods_group_left" class="Left group_l">
<?php if ($this->_var['package_goods_list']): ?>
  <div id="JS_goods_order_similar" class="similar mt10 none">
    <h2 class="group_title">人气推荐</h2>
    <ul id="JS_similar_order" class="tab_body" style="height:235px">
	<?php $_from = get_cat_best_goods_4($GLOBALS[smarty]->_var[goods][cat_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item']):
        $this->_foreach['best_goods']['iteration']++;
?>
      <li <?php if ($this->_foreach['best_goods']['iteration'] == 1): ?>class="first"<?php endif; ?>>
        <div class="price yen red bold"><?php if ($this->_var['goods_item']['promote_price'] != ""): ?><?php echo $this->_var['goods_item']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_item']['shop_price']; ?><?php endif; ?></div>
        <h4><em><?php echo $this->_foreach['best_goods']['iteration']; ?></em><a href="<?php echo $this->_var['goods_item']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" class="JS_similar_ga"><?php echo sub_str($this->_var['goods_item']['short_name'],8); ?></a></h4>
        <div class="goods_ex"> <a href="<?php echo $this->_var['goods_item']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" class="JS_similar_ga"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods_item']['thumb']; ?>" width="180" height="118"  alt="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>"/></a>
          
         
        </div>
      </li>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
    </ul>
  </div>
 <?php endif; ?> 
  <div id="JS_goods_rel_cat" class="rel_cat mt10 none">
    <h2 class="group_title">相关分类</h2>
    <div id="JS_rel_cat" class="tab_body"><?php $_from = get_categories_tree($GLOBALS[smarty]->_var[goods][cat_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['get_categories_tree'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_categories_tree']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['get_categories_tree']['iteration']++;
?><a href="<?php echo $this->_var['cat']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['cat']['name']); ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
  </div>
  
</div>
<?php endif; ?>

<div id="JS_goods_group_right" class="Right group_r">
<?php if ($this->_var['package_goods_list']): ?>
<div class="extra_area mt10">
  <div class="extra_title clearfix">
    <ul class="extra_abs Left" id="JS_tz_nav">
	<?php $_from = $this->_var['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods');$this->_foreach['package_goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['package_goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['package_goods']):
        $this->_foreach['package_goods_list']['iteration']++;
?>
      <li data-index="<?php echo $this->_foreach['package_goods_list']['iteration']; ?>" <?php if ($this->_foreach['package_goods_list']['iteration'] < 2): ?>data-init="1" class="current"<?php endif; ?>>套餐组合<?php echo $this->_foreach['package_goods_list']['iteration']; ?></li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
    </ul>
    <a href="activity.php" target="_blank" class="Right more">更多套餐&gt;&gt;</a> </div>
  <div id="JS_tz_body" class="tz_body">
  <?php $_from = $this->_var['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods');$this->_foreach['package_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['package_list']['total'] > 0):
    foreach ($_from AS $this->_var['package_goods']):
        $this->_foreach['package_list']['iteration']++;
?>
    <div id="JS_tz_s<?php echo $this->_foreach['package_list']['iteration']; ?>_list" class="peitao clearfix <?php if ($this->_foreach['package_list']['iteration'] > 1): ?>none<?php endif; ?>">
     
      <div class="tz_list Right clearfix" style="float:left; margin-left:50px;">
        <div class="tz_detail_r Right clearfix">
          <div class="Left"> <span class="equal"></span> </div>
          <div class="Right tz_buy">
            <h4><a target="_blank" title="<?php echo $this->_var['package_goods']['act_name']; ?>"><?php echo $this->_var['package_goods']['act_name']; ?></a></h4>
            <p class="gray"><span class="red">套餐价：</span><span class="yen red bold f16"><?php echo $this->_var['package_goods']['package_price']; ?></span> <br/>
              总价：<del class="yen"><?php echo $this->_var['package_goods']['subtotal']; ?></del><br/>
              <span class="tz_save_icon"></span><span class="yen red bold"><?php echo $this->_var['package_goods']['saving']; ?></span> </p>
            <a href="javascript:addPackageToCart(<?php echo $this->_var['package_goods']['act_id']; ?>)" class="tz_button"></a> </div>
        </div>
        <div class="extra_goods Right">
          <div class="stage">
            <table id="JS_tz_s<?php echo $this->_foreach['package_list']['iteration']; ?>_table">
              <tr>
			  <?php $_from = $this->_var['package_goods']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_list');$this->_foreach['package_goods_goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['package_goods_goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods_list']):
        $this->_foreach['package_goods_goods_list']['iteration']++;
?>
                <td><div class="list">
              
                    	 <div class="img_box"><a href="goods.php?id=<?php echo $this->_var['goods_list']['goods_id']; ?>" title="<?php echo $this->_var['goods_list']['goods_name']; ?>" target="_blank"><img src="<?php echo $this->_var['goods_list']['goods_thumb']; ?>" alt="<?php echo $this->_var['goods_list']['goods_name']; ?>" width="148" height="96" /></a></div>
                   
                    
                    <div class="info gray">
                      <p><a href="goods.php?id=<?php echo $this->_var['goods_list']['goods_id']; ?>" class="goods_name_x1" title="<?php echo $this->_var['goods_list']['goods_name']; ?>" target="_blank"><?php echo $this->_var['goods_list']['goods_name']; ?></a></p>
                      <p>本站价：<span class="red yen"><?php echo $this->_var['goods_list']['rank_price']; ?></span></p>
                     
                    </div>
                  </div></td>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </tr>
            </table>
          </div>
          <div class="nav"> <a id="JS_tz_s<?php echo $this->_foreach['package_list']['iteration']; ?>_left" class="toleft"></a> <a id="JS_tz_s<?php echo $this->_foreach['package_list']['iteration']; ?>_right" class="toright"></a> </div>
        </div>
      </div>
    </div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
	
    
	
	
	
  </div>
</div>
<?php endif; ?>
<?php if ($this->_var['fittings']): ?>
<div class="extra_area mt10">
<div class="extra_title">
  <ul id="JS_extra_change" class="extra_abs">
    <li id="JS_extra_pt" class="current">DIY搭配</li>
   
  </ul>
</div>
<div id="JS_extra_pt_body" style="height:294px">

  <div class="peitao pt_main clearfix peitao_has_sky">
    <div class="main_goods Left">
      <div class="img"><img id="JS_tz_main_img" src="<?php echo $this->_var['goods']['goods_img']; ?>" width="148" height="96" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></div>
      <div class="info">
        <p title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" id="JS_peitao_main_name" style="width:148px;height: 1.8em;overflow: hidden;"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></p>
        <strong class="red yen" id="JS_peitao_show_price"><?php if ($this->_var['goods']['is_promote'] && $this->_var['goods']['gmt_end_time']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price_formated']; ?><?php endif; ?></strong>&emsp;</div>
		<?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?>
			<?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?>
			<input type="checkbox" checked=checked autocomplete="off" goods_id="<?php echo $this->_var['goods']['goods_id']; ?>" price1="<?php echo $this->_var['goods_data']['shop_price']; ?>" price2="<?php echo $this->_var['goods_data']['market_price']; ?>"  style="display:none" class="chk_fit">
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <div class="Left"><span class="add"></span></div>
    <div class="extra_goods Right">
      <div id="JS_pt_stage" class="stage" data-first="4">
        <table id="JS_scroll_table">
          <tr>
		  <?php $_from = $this->_var['fittings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item');$this->_foreach['fittings'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fittings']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item']):
        $this->_foreach['fittings']['iteration']++;
?>
            <td data-index="0" class="ptItem_0 "><div class="list">
                <div class="img_box"><a href="<?php echo $this->_var['goods_item']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods_item']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" width="148" height="96" /></a></div>
                <div class="info">
                  <p><a href="<?php echo $this->_var['goods_item']['url']; ?>" class="goods_name_x1" title="<?php echo htmlspecialchars($this->_var['goods_item']['name']); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods_item']['short_name']); ?></a></p>
                  <p class="gray"><span class="red yen bold"><?php echo $this->_var['goods_item']['fittings_price']; ?></span> &emsp;
                  <p class="gray" style="margin-top:5px;">
                    <?php $_from = get_goods_ex($GLOBALS[smarty]->_var[goods_item][goods_id]); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_data');$this->_foreach['get_goods_ex'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_goods_ex']['total'] > 0):
    foreach ($_from AS $this->_var['goods_data']):
        $this->_foreach['get_goods_ex']['iteration']++;
?><?php if ($this->_foreach['get_goods_ex']['iteration'] == 1): ?><input type="checkbox" checked="checked" autocomplete="off" goods_id="<?php echo $this->_var['goods_item']['goods_id']; ?>" onclick="sum_price()" price1="<?php echo $this->_var['goods_data']['shop_price']; ?>" price2="<?php echo $this->_var['goods_data']['market_price']; ?>" class="chk_fit"><?php endif; ?><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                   </p>
                </div>
				
              </div></td>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
            
            
          </tr>
        </table>
      </div>
      <div class="nav"> <a id="JS_peitao_left" class="toleft"></a> <a id="JS_peitao_right" class="toright"></a> </div>
    </div>
  </div>
  <div class="pt_result clearfix">
    <div class="arrow"></div>
    <div class="pt_result_l Left">
	<p class="tips"><b>省了<font  id="fit_price3" class="red">0</font>元</b></p>
	<p class="price_m">原  价：￥<span style="text-decoration:line-through" id="fit_price2">0.00</span>元
	<span class="bold" style="margin-left:30px">总价：￥<strong class="red yen f16" id="fit_price1">0.00</strong>元</span>
	</p>
     </div>
    <div class="pt_result_r Right"><a href="javascript:;" class="g2_btn1" onclick="addFittingsToCart()"></a></div>
  </div>
</div>
        <textarea id="JS_maiguo_textarea" class="none">
		<div class="stage">
				<table id="JS_maiguo_table">
                <tr>
				<?php $_from = $this->_var['bought_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bought_goods_data');$this->_foreach['bought_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bought_goods']['total'] > 0):
    foreach ($_from AS $this->_var['bought_goods_data']):
        $this->_foreach['bought_goods']['iteration']++;
?>
				<?php if ($this->_foreach['bought_goods']['iteration'] < 5): ?>
				<td>
						<div id="JS_maiguo_box_<?php echo ($this->_foreach['bought_goods']['iteration'] - 1); ?>" class="maiguo_box">
							<div class="img"><a href="<?php echo $this->_var['bought_goods_data']['url']; ?>" target="_blank" title="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>"><img width="160" height="106" src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['bought_goods_data']['goods_thumb']; ?>" alt="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>" /></a></div>
							<div class="info c">
								<a href="<?php echo $this->_var['bought_goods_data']['url']; ?>" class="goods_name_x1" target="_blank" title="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>"><?php echo $this->_var['bought_goods_data']['short_name']; ?></a>
							<p class="gray">本站价：<strong class="red yen"><?php if ($this->_var['bought_goods_data']['promote_price'] != 0): ?><?php echo $this->_var['bought_goods_data']['formated_promote_price']; ?><?php else: ?><?php echo $this->_var['bought_goods_data']['shop_price']; ?><?php endif; ?></strong></p>
								<a id="JS_maiguo_goods_0" href="javascript:void(0);" onclick="javascript:addToCart(<?php echo $this->_var['bought_goods_data']['goods_id']; ?>)" class="add_cart c bold">加入购物车</a>
							</div>
						</div>
				</td>
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					
				</tr>
               </table>
			</div>
					</div>
	</textarea>
<script language="javascript">
	var fittingsArr = new Array(); 
	var fittingsArrLen = 0;
	var addCartCount = 0;
	function sum_price(){
	    fittingsArr.length=0; 
		var sum_price1 = 0.00;
		var sum_price2 = 0.00;
		$('.chk_fit').each(
			function(){
			    var chk = this.checked;
				if (chk){
					var price1 = $(this).attr('price1');
					var price2 = $(this).attr('price2');
					sum_price1 += price1*1;
					sum_price2 += price2*1;
					
					fittingsArr.push($(this).attr('goods_id'));
				}
			}
		);
		$('#fit_price1').html(parseInt(sum_price1));
		$('#fit_price2').html(parseInt(sum_price2));
		$('#fit_price3').html(parseInt(sum_price2 - sum_price1));
	}
	sum_price();
	function addFittingsToCart(){
	      fittingsArrLen = fittingsArr.length;
		 // alert(fittingsArrLen);
		  if (fittingsArrLen == 1){
		  	alert('请选择套餐组合产品!');
			return;
		  }
		  for (var i = 0; i < fittingsArr.length; i ++){

			  var spec_arr     = new Array();
			  var number       = 1;
			  var quick		   = 0;
  
			  var goods        = new Object();
			  var formBuy      = document.forms['ECS_FORMBUY'];
			  goods.goods_id = fittingsArr[i];
			  goods.number   = 1;
			  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
			  
			  // 检查是否有商品规格 
			  if (i == 0 && formBuy)
			  {
				spec_arr = getSelectedAttributes(formBuy);
			
				if (formBuy.elements['number'])
				{
				  number = formBuy.elements['number'].value;
				}
			
				quick = 1;
			  }
			  
			  goods.spec     = spec_arr;
			  goods.number   = number;
			  goods.quick    = quick;
			  
			  $.ajax({
					type:"POST",
					url:"flow.php?step=add_to_cart",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'goods=' + $.toJSON(goods),
					success:addFittingsToCartResponse
				});
			  
			  
		  }
		  
	}
	function addFittingsToCartResponse(result)
	{
	  if (result.error > 0)
	  {
		
	  }
	  else
	  {
			addCartCount = addCartCount + 1;
			if (fittingsArrLen == addCartCount){
				$.addToCart(result.goods_number, result.goods_price);
				$('#cartInfo_number').html(result.goods_number);
				
				$.ajax({
							type:"POST",
							url:"flow.php?step=get_cart_list",
							cache:false,
							dataType:'json',     //接受数据格式
							data:'',
							success:function(result){
								$('#JS_header_cart_list').html(result.message);
							}
						});
			}
	  }
	}
	</script>
</div>
<?php endif; ?>



</div>
</div>

<div class="w clearfix mt10">
  <div class="main_left Left">
    <h2 class="group_title">大家还买了</h2>
    <ul class="tab_body">
	<?php $_from = $this->_var['bought_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bought_goods_data');$this->_foreach['bought_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bought_goods']['total'] > 0):
    foreach ($_from AS $this->_var['bought_goods_data']):
        $this->_foreach['bought_goods']['iteration']++;
?>
				<?php if ($this->_foreach['bought_goods']['iteration'] < 5): ?>
      <li <?php if ($this->_foreach['bought_goods']['iteration'] == 1): ?>class="first"<?php endif; ?>>
        <div class="img"> <a href="<?php echo $this->_var['bought_goods_data']['url']; ?>" title="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>" target="_blank"> <img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['bought_goods_data']['goods_thumb']; ?>" width="178" height="116" alt="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>" /> </a> </div>
        <div class="info c"> <a href="<?php echo $this->_var['bought_goods_data']['url']; ?>" title="<?php echo $this->_var['bought_goods_data']['goods_name']; ?>" target="_blank"><?php echo $this->_var['bought_goods_data']['short_name']; ?></a>
          <p><span>本站价：</span><span class="yen red"><?php if ($this->_var['bought_goods_data']['promote_price'] != 0): ?><?php echo $this->_var['bought_goods_data']['formated_promote_price']; ?><?php else: ?><?php echo $this->_var['bought_goods_data']['shop_price']; ?><?php endif; ?></span></p>
        </div>
      </li>
	  <?php endif; ?>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
    </ul>
    <h2 class="group_title mt10">大家还浏览了</h2>
    <ul class="tab_body">
	<?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data');if (count($_from)):
    foreach ($_from AS $this->_var['releated_goods_data']):
?>
      <li class="first">
        <div class="img"> <a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" target="_blank"> <img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['releated_goods_data']['goods_thumb']; ?>" width="178" height="116" alt="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" /> </a> </div>
        <div class="info c"> <a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" target="_blank"><?php echo $this->_var['releated_goods_data']['short_name']; ?></a>
          <p><span>本站价：</span><span class="yen red"><?php if ($this->_var['releated_goods_data']['promote_price'] != 0): ?><?php echo $this->_var['releated_goods_data']['formated_promote_price']; ?><?php else: ?><?php echo $this->_var['releated_goods_data']['shop_price']; ?><?php endif; ?></span></p>
        </div>
      </li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </ul>
  </div>
  <div class="main_right Right">
    <div class="navs">
      <div style="height:0px;position:absolute;" id="JS_float_navs_position"></div>
      <div class="float_navs" id="JS_float_navs"><a class="current first" href="javascript:;" id="JS_Tab_nav_xinxi">商品描述</a><a href="javascript:;" id="JS_Tab_nav_guige">配镜指南</a><a href="javascript:;" id="JS_Tab_nav_expr" style="display:none;">体验馆<span id="JS_count_expr" class="gray"></span></a><a href="javascript:;" id="JS_Tab_nav_pingjia">客户评价</a><a href="javascript:;" id="JS_Tab_nav_sheji" style="display:none">设计搭配</a><a href="javascript:;" id="JS_Tab_nav_jilu">购买记录</a><a href="javascript:;" id="JS_Tab_nav_zixun" style="display:none;">商品咨询<span id="JS_count_zixun" class="gray"></span></a><!--<a href="javascript:;" id="JS_Tab_nav_shouhou">售后服务</a>--><!--<a href="javascript:;" id="JS_Tab_nav_wenti">常见问题</a>--><a href="javascript:;" id="JS_Tab_nav_xuzhi" style="display:none;">购买须知</a><span href="javascript:void(0);" id="JS_quickly_buy" class="quickly_buy" onClick="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)"></span></div>
    </div>
    <div class="xinxi clearfix mt10" id="JS_Tab_body_xinxi">
      
      <div class="tupian mt10">
        <div class="mt10"></div>
        <div class="img_point mt10">
          <div class="tab_title"><span class="icon"></span>
            <h2 class="f16">商品描述</h2>
          </div>
          <div class="point_c">
            <?php echo $this->_var['goods']['goods_desc']; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="guige mt10" id="JS_Tab_body_guige">
      <div class="tab_title"> <span class="icon"></span>
        <h2>配镜指南</h2>
      </div>
      <table class="norm_info mt10">
        <tr>
        	<th><img src="themes/meilele/images/goods2/zhinan.jpg" width="100%"></th>
        </tr>

       <!-- <tr>
          <th colspan="2" class="norm_title f14">配镜指南</th>
        </tr>-->
		<?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
		<?php $_from = $this->_var['property_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'property');if (count($_from)):
    foreach ($_from AS $this->_var['property']):
?>
       <!-- <tr>
          <th class="r norm_left"><?php echo htmlspecialchars($this->_var['property']['name']); ?></th>
          <td><?php echo $this->_var['property']['value']; ?></td>
        </tr>-->
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
      </table>
    </div>
    <div class="expr mt10" id="JS_Tab_body_expr"> </div>
    <div class="sheji mt10 heihei" id="JS_Tab_body_sheji"> </div>
    <div class="jilu mt10" id="JS_Tab_body_jilu">
      <div class="tab_title"> <span class="icon"></span>
        <h2>购买记录</h2>
      </div>
<div id="ECS_BOUGHT"><?php 
$k = array (
  'name' => 'bought_notes',
  'id' => $this->_var['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
    </div>
   <!-- <div class="shouhou mt10" id="JS_Tab_body_shouhou">
      <div class="tab_title"> <span class="icon"></span>
        <h2>售后服务</h2>
      </div>
      <div class="tab_body">
        <div class="list clearfix"> <span class="icon Left"></span>
          <p class="Right"> <strong>退货和流程：</strong><br/>
            <a class="red" target="_blank"><u>45 天无理由退货</u></a>，因质量问题退换，商家承担邮费；非质量问题退换，仅限正价商品，买家承担邮费。影响二次销售的产品不能退换货。定制类产品非质量问题不能退换货。已明确注明“不予退换”的商品不能退换货。</p>
        </div>
        <div class="list list2 clearfix"> <span class="icon Left"></span>
          <p class="Right"> <strong>商品保修：</strong><br/>
            家具类商品的保修期限为<span class="red">三年</span>，建材类商品保修期限为<span class="red">一年</span>。在我们网站购买商品的客户均将自动成为我们的VIP客户，我们承诺为您的家具提供终身维护。 </p>
        </div>
        <div class="list list3 clearfix"> <span class="icon Left"></span>
          <p class="Right"> <strong>施工指导：</strong><br/>
            客户拿到我们的装修方案后，我们有专人可以提供方案的施工指导服务（电话或网络）。 </p>
        </div>
      </div>
    </div>-->
    <div class="xuzhi mt10" id="JS_Tab_body_xuzhi"> </div>
    <a name="pj"></a>
    <div class="pingjia mt10" id="JS_Tab_body_pingjia">
      <div class="tab_title"> <span class="icon"></span>
        <h2>客户评价</h2>
      </div>
	  <script language="javascript">
			var comment_rank = "<?php 
$k = array (
  'name' => 'comments_rank',
  'id' => $this->_var['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>";
			</script>
      <div id="ECS_COMMENT"> <?php 
$k = array (
  'name' => 'comments',
  'type' => $this->_var['type'],
  'id' => $this->_var['id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
    </div>
    <div class="zixun mt10" id="JS_Tab_body_zixun" style="display:none">
      <div class="tab_title"> <span class="icon"></span>
        <h2>商品咨询</h2>
      </div>
      <div class="tab_body"> <div class="c gray">暂无咨询。</div></div>
    </div>
    <div class="wenti mt10" id="JS_Tab_body_wenti">
      <div class="tab_title"> <span class="icon Left"></span>
        <h2>常见问题解答</h2>
      </div>
      <div class="tab_body">
        <ul class="went_tab JS_wenti_tab clearfix">
          <li class="Left JS_wenti_tab_goods current" data-type="goods"><i class="goods_icon"></i>商品相关</li>
          <li class="Left JS_wenti_tab_trans" data-type="trans"><i class="trans_icon"></i>物流配送</li>
          <li class="Left JS_wenti_tab_shouhou" data-type="shouhou"><i class="shouhou_icon"></i>售后问题</li>
          <li class="Left JS_wenti_tab_pay" data-type="pay"><i class="pay_icon"></i>付款相关</li>
        </ul>
        <div class="went_body JS_went_body_goods">
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">如何定制套镜（购买流程）？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">1. 挑选镜架；2.勾选套餐镜片；3. 结算页填写验光单；详细说明：http://www.eachsee.com/article-9.html<!--<a class="red" target="_blank" href="expr.php"><u>查看全国体验馆</u></a>--></p>
            </div>
          </div>
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">如何鉴别产品真伪？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">亿视丽眼镜网所售商品全部为正规渠道进货，100%保真。精工、李维斯等品牌镜架有防伪标签，刮开可到官网查询真伪。依视路、明月等品牌镜片上有防伪雾显标识，镜片包装上有防伪编码，刮开可到官网查询真伪。</p>
            </div>
          </div>
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">网上的产品和体验馆的产品在价格、质量等方面是否有区别？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">体验馆售价与网站统一；所展出的商品均为工厂直接发货，货源与您收到的商品是一致的，请您放心购买。</p>
            </div>
          </div>
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">网上配眼镜需要哪些数据？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">首先您要拥有一份准确的验光单，其中包括：配镜者左右眼的近视/远视度数；以及双眼瞳距；如果有散光，还需要提供散光度数以及散光的轴位！</p>
            </div>
          </div>
        </div>
        <div class="went_body JS_went_body_trans none">
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">订单什么时候发货？多久到货？?</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">非定制镜片：12点之前的订单当天可以发货。顺丰：全国一般地区1-2天，偏远地区（新疆等）2-3天到货。圆通：全国一般地区2-3天，偏远地区（新疆等）3-5天到货。</p>
            </div>
          </div>
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">配好的镜片不合适能退换吗？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">订单镜片是严格按照您的验光单数据来定制的，因镜片属于定制类产品，非质量问题一经加工就无法退换。请您在下单之前，务必确认验光单度数的准确性。</p>
            </div>
          </div>
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">商品包邮吗？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">由于各地物流费差异较大，标价没有包含运费；且美乐乐的商品是工厂直销，价格已经是最低了，就算产品加上运费性价比也很高。但有部分做活动的商品可以提供包邮。</p>
            </div>
          </div>
        </div>
        <div class="went_body JS_went_body_shouhou none">
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">配镜有何售后服务保障?</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">1. 亿视丽配镜严格按国标2011执行：多道质检环节，不达标2倍退款！2. 30天包退换：免除质量问题后顾之忧！亿视丽退换货政策：http://www.eachsee.com/article-9.html</p>
            </div>
          </div>
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">没有体验馆的城市怎么售后？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">天明眼镜自成立以来，在全国大部分地方建立了较完善的售后服务网络，没有体验馆的城市，我们也有合作的维修师傅，能为您提供优质完善的售后服务，请放心购买。</p>
            </div>
          </div>
        </div>
        <div class="went_body JS_went_body_pay none">
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">付款方式有哪几种呢？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">天明眼镜为在线购买的客户提供了网银在线支付、信用卡支付、支付平台支付（支付宝、易宝支付、财付通）、银行柜台转账汇款四种支付方式。您也可以到就近的体验馆使用现金支付、POS机刷卡支付。</p>
            </div>
          </div>
          <div class="list">
            <div class="question clearfix"><span class="icon Left"></span><strong class="Right">可以货到付款吗？为什么不能货到付款？先付款给你们有什么保障？</strong></div>
            <div class="answer clearfix"><span class="icon Left"></span>
              <p class="Right">由于目前国内物流到付风险较大，为了保证您的资金安全，天明眼镜暂时不支持货到付款服务。本网站经过ICP备案，同时也是支付宝特约商家，全国有N多家实体体验馆，您可以放心订购！</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script type="text/javascript">
var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;

onload = function(){
  changePrice();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{
  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;
  
  $.ajax({
					type:"GET",
					url:"goods.php",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty,
					success:changePriceResponse
				});

}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = res.result;
  }
}


</script>


<script type="text/javascript" src="themes/meilele/js/back_to_top.min.js?1121fv"></script>
<script type="text/javascript" src="themes/meilele/js/goods_wide.min.js?1121fv"></script>
<script type="text/javascript">

GL['34742'] = new Good({
	"goods_id": "34742",
	"show_type": "0",
	"goods_thumb_1": "",
	"ship_type": "1",
	"is_logistics": "0",
	"is_delete": "0",
	"is_on_sale": "1",
	"is_parent_goods": "0",
	"calc_type": "1",
	"goods_weight": "0",
	"goods_sn": "",
	"cloth_goods_id": "",
	"goods_volume": "0.1952",
	"stock_volumn": "0.1952",
	"goods_name": "",
	"limit_sale": "0",
	"discount_price": "0.00",
	"goods_thumb": "",
	"style_id": "303",
	"cat_id": "275",
	"brand_id": "213",
	"material_id": "304",
	"goods_attribute": "0",
	"shop_id": "1",
	"shop_name": "",
	"cname": "",
	"style_name": "",
	"brand_name": "",
	"discount_type": "1",
	"red_title": "",
	"clo_goods_id": null,
	"material_name": "",
	"add_time": "1308695210",
	"quotiety": "0.00",
	"img_leftshow_text": "0",
	"goods_list_tag": "0",
	"real_unit_use": "0",
	"change_unit_use": "1",
	"change_unit_ratio": "1.00000",
	"goods_unitname": "",
	"discount_name": "",
	"is_fitment": 0,
	"is_haier": 0,
	"is_redpacket": 0,
	"chandi": "",
	"brand_url": "",
	"style_url": "",
	"material_url": "",
	"price_type": {
		
	},
	"activity_type": "",
	"goods_activity_name": [],
	"favourite_num": 8287,
	"click": 7587,
	"sales_num": "1071",
	"attr_info": {
		"color_list": false,
		"spec_list": {
			
		},
		"sofa_list": false,
		"material_list": false
	},
	"join_list": null,
	"page_title": "",
	"real_unit_use_name": "",
	"change_unit_use_name": "",
	"relate_parent": [],
	"relate_show": [],
	"pinyin": "dianshigui",
	"exchange_limit": null
});
goodsInit();
</script>

<script type="text/javascript" id="bdshare_js" data="type=tools"></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>

</body>
</html>
