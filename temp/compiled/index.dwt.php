<!DOCTYPE HTML>
<html>
<meta property="qc:admins" content="205636752161230371262062002163757" />
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8">
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<script src="themes/meilele/js/jq.js?1119"></script>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1123" />
<link rel="stylesheet" href="themes/meilele/css/index.min.css?1123" />


</head>
<body onload="createCodepx()">
<SCRIPT LANGUAGE="JavaScript">
 function mobile_device_detect(url)
 {
        var thisOS=navigator.platform;
        var os=new Array("iPhone","iPod","iPad","android","Nokia","SymbianOS","Symbian","Windows Phone","Phone","Linux armv71","MAUI","UNTRUSTED/1.0","Windows CE","BlackBerry","IEMobile");
 for(var i=0;i<os.length;i++)
        {
 if(thisOS.match(os[i]))
        {   
  window.location=url;
 }
  
 }
 //因为相当部分的手机系统不知道信息,这里是做临时性特殊辨认
 if(navigator.platform.indexOf('iPad') != -1)
        {
  window.location=url;
 }
 //做这一部分是因为Android手机的内核也是Linux
 //但是navigator.platform显示信息不尽相同情况繁多,因此从浏览器下手，即用navigator.appVersion信息做判断
  var check = navigator.appVersion;
  if( check.match(/linux/i) )
          {
   //X11是UC浏览器的平台 ，如果有其他特殊浏览器也可以附加上条件
   if(check.match(/mobile/i) || check.match(/X11/i))
                 {
   window.location=url;
   }  
 }
 //类in_array函数
 Array.prototype.in_array = function(e)
 {
  for(i=0;i<this.length;i++)
  {
   if(this[i] == e)
   return true;
  }
  return false;
 }
 } 
mobile_device_detect("http://121.41.56.121:8080/mobile/");
 </SCRIPT>
<script type="text/javascript">(function(){var screenWidth=window.screen.width;if(screenWidth>=1280){document.body.className="root_body";window.LOAD=true;}else{window.LOAD=false;}})()</script>


<?php echo $this->fetch('library/page_header.lbi'); ?>
<script language="javascript">
document.getElementById('globa_submenu').style.display = 'none';


</script>


<div class="slide_banner root_table" >
  <div id="JS_slide_container" class="slide_stage">
    <table id="JS_side_stage" style="width:500%;">
      <tr>
	  <?php $_from = get_flash_xml(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'playerdb');$this->_foreach['get_flash_xml'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_flash_xml']['total'] > 0):
    foreach ($_from AS $this->_var['playerdb']):
        $this->_foreach['get_flash_xml']['iteration']++;
?>
	 
	 
        <td><div class="bg" style="background:url(/images/nav/<?php echo $this->_foreach['get_flash_xml']['iteration']; ?>.jpg) 0 0 repeat-x;"><a href="<?php echo $this->_var['playerdb']['url']; ?>" target="_blank" title="<?php echo $this->_var['playerdb']['text']; ?>" style="background:url(<?php if ($this->_foreach['get_flash_xml']['iteration'] < 2): ?>/<?php echo $this->_var['playerdb']['src']; ?><?php else: ?>/images/loading.gif<?php endif; ?>) center center no-repeat;" data-bg="<?php echo $this->_var['playerdb']['src']; ?>"></a></div></td>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
      </tr>
    </table>
  </div>
  <div class="slide_handdler">
    <div id="JS_side_nav" class="w"><?php $_from = get_flash_xml(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'playerdb');$this->_foreach['get_flash_xml'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_flash_xml']['total'] > 0):
    foreach ($_from AS $this->_var['playerdb']):
        $this->_foreach['get_flash_xml']['iteration']++;
?><a <?php if ($this->_foreach['get_flash_xml']['iteration'] < 2): ?>class="current first"<?php endif; ?> href="javascript:;"></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
  </div>
</div>





<div class="w w1184 shop-custom abs" style="margin:auto;margin-top:10px; ">

	<div class="header clearfix" style="height: 35px;overflow: hidden;clear: both;background-color: #faf4f6;">
		<div class="Left"><span class="title" style="font-size: 22px">眼镜分类</span></div>
		<div class="Right"><span class="words"></span><a class="more" href="javascript:;" style="color:#cc0200"></a></div>
	</div>

	<div class="main_new no_subject" style="clear: both;padding: 0 0 5px 0;margin-top:0;border-top: #000 2px solid;font-size: 0;" >
		<div class="zui_area" style="width: 890px;overflow: hidden; float: left; "><?php echo $this->_var['SITE_URL']; ?>
			<img src="<?php echo $this->_var['SITE_URL']; ?>images/index_cate_module_1.png" usemap="#Map_s1_1z_1" style="vertical-align:top;">

			<map name="Map_s1_1z_1">
				<area  shape="rect" coords="0,0,  304,258"   href="search.php?intro=new" target="_blank" title="新品专区" alt="新品专区">
				<area  shape="rect" coords="0,262,304,520"   href="search.php?intro=hot" target="_blank" title="热卖专区" alt="热卖专区">

				<area  shape="rect" coords="310,0,594,520"   href="33333" target="_blank" title="平光镜专区" alt="平光镜专区">
				<area  shape="rect" coords="600,0,884,520"   href="category.php?id=3&brand=0" target="_blank" title="太阳镜专区" alt="太阳镜专区">

				<area  shape="rect" coords="890,0,1182,258"   href="555555" target="_blank" title="防蓝光专区" alt="防蓝光专区" >
				<area  shape="rect" coords="890,262,1182,520"   href="search.php?encode=YToyOntzOjg6ImtleXdvcmRzIjtzOjk6IuiAgeiKsemVnCI7czoxODoic2VhcmNoX2VuY29kZV90aW1lIjtpOjE0NzQ1MDg0MDQ7fQ==" target="_blank" title="老花镜专区" alt="老花镜专区" >

				<area  shape="rect" coords="89, 541,195,630"   href="777" target="_blank" title="所有产品" alt="所有产品" >
				<area  shape="rect" coords="246,541,353,630"   href="category.php?id=1&brand=0" target="_blank" title="男士太阳镜" alt="男士太阳镜" >
				<area  shape="rect" coords="406,541,513,630"   href="category.php?id=2&brand=0" target="_blank" title="女士太阳镜" alt="女士太阳镜" >
				<area  shape="rect" coords="566,541,672,630"   href="555555" target="_blank" title="平光镜" alt="平光镜" >
				<area  shape="rect" coords="716,541,823,630"   href="555555" target="_blank" title="防蓝光镜" alt="防蓝光镜" >


				<!--<area  shape="rect" coords="867,541,973,630"   href="search.php?encode=YToyOntzOjg6ImtleXdvcmRzIjtzOjk6IuiAgeiKsemVnCI7czoxODoic2VhcmNoX2VuY29kZV90aW1lIjtpOjE0NzQ1MDg0MDQ7fQ==" target="_blank" title="老花镜" alt="老花镜" >
				<area  shape="rect" coords="990,541,1080,630"   href="category.php?id=117&brand=0" target="_blank" title="近视镜片" alt="近视镜片" >-->

			</map>


		</div>



		<div class="side Left" style="width:293px;margin-right: 0px;" >

			<div class="ad">
				<?php $_from = get_advlist_by_id(2); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
				<a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>"><img data-src2="<?php echo $this->_var['ad']['image']; ?>" src="/themes/meilele/images/blank.gif" width="291" height="102" alt="<?php echo $this->_var['ad']['name']; ?>" /></a>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>

			<div class="tab mt10">

				<div id="JS_side_tab_nav" class="head">
					<a href="javascript:;" class="first current" style="width: 150px;">网站公告</a>
					<a href="javascript:;" style="width: 140px;">订单状态查询</a>
				</div>

				<div id="JS_side_tab_body" class="body" style="height: 302px;">

					<div class="show_news tBody current">
						<ul class="gg ">
							
							<?php $this->assign('articles',$this->_var['articles_9']); ?><?php $this->assign('articles_cat',$this->_var['articles_cat_9']); ?><?php echo $this->fetch('library/cat_articles.lbi'); ?>
							
						</ul>
					</div>
					<div class="tBody query">
						<div class="input">
							<input type="text" class="uOrder" id="JS_ordersn" value="请输入订单号" onFocus="this.value=this.value=='请输入订单号'?'':this.value" onBlur="this.value=this.value==''?'请输入订单号':this.value" />
						</div>
						<div class="input mt10">
							<a class="imgBtn" href="javascript:;" id="JS_check_order" title="查询" style="margin-left:0px"></a></div>
						<p class="login" id="JS_login_status"><a href="user.php" title="登录">登录</a>进入<a href="user.php?act=order_list" target="_blank" title="订单中心">订单中心</a>查询</p>
					</div>

				</div>


				<?php if ($this->_var['indexBonus']): ?>
				<div style="height:70px; text-align: center;color: red;;"  class="body">
					<h3>领取优惠券</h3>
				</div>
				<?php endif; ?>


			</div>

		</div>




	</div>



	<div class="main_new no_subject" style="clear: both;padding: 0 0 5px 0;margin-top:0;font-size: 0;" >
		<div class="zui_area" style="overflow: hidden;  "><?php echo $this->_var['SITE_URL']; ?>
			<img src="<?php echo $this->_var['SITE_URL']; ?>images/index_cate_module_2.png" usemap="#Map_s1_1z_2" style="vertical-align:top;">

			<map name="Map_s1_1z_2">

				<!-- <area  shape="rect" coords="89, 0,195,110"   href="777" target="_blank" title="所有产品" alt="所有产品" > -->
				<area  shape="rect" coords="246,0,353,110"   href="category.php?id=1&brand=0" target="_blank" title="男士太阳镜" alt="男士太阳镜" >
				<area  shape="rect" coords="406,0,513,110"   href="category.php?id=2&brand=0" target="_blank" title="女士太阳镜" alt="女士太阳镜" >
				<area  shape="rect" coords="566,0,672,110"   href="555555" target="_blank" title="平光镜" alt="平光镜" >
				<area  shape="rect" coords="716,0,823,110"   href="555555" target="_blank" title="防蓝光镜" alt="防蓝光镜" >


				<area  shape="rect" coords="867,0,973,110"   href="search.php?encode=YToyOntzOjg6ImtleXdvcmRzIjtzOjk6IuiAgeiKsemVnCI7czoxODoic2VhcmNoX2VuY29kZV90aW1lIjtpOjE0NzQ1MDg0MDQ7fQ==" target="_blank" title="老花镜" alt="老花镜" >
				<area  shape="rect" coords="990,0,1080,110"   href="category.php?id=117&brand=0" target="_blank" title="近视镜片" alt="近视镜片" >

			</map>


		</div>

    </div>

</div>











<div class="w w1184 mt20 floor1 floor1_2">
  <div class="header clearfix">
    <div class="Left"><a class="title" href="search_list.php?encode=YToyOntzOjU6ImludHJvIjtzOjM6Im5ldyI7czoxODoic2VhcmNoX2VuY29kZV90aW1lIjtpOjEzOTU4ODY5OTU7fQ==" target="_blank"></a></div>
    <div class="Right"><a class="more" href="search_list.php?encode=YToyOntzOjU6ImludHJvIjtzOjM6Im5ldyI7czoxODoic2VhcmNoX2VuY29kZV90aW1lIjtpOjEzOTU4ODY5OTU7fQ==" style="color:#cc0200" target="_blank">更多新品</a></div>
  </div>
  <div class="main_new" id="JS_hover_img_box_2"><?php $_from = get_advlist_by_id(4); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>" class="a_<?php echo $this->_foreach['index_image']['iteration']; ?> <?php if ($this->_foreach['index_image']['iteration'] == 1): ?>SCREEN-SHOW<?php endif; ?>"><img class="img_<?php echo $this->_foreach['index_image']['iteration']; ?>" src="/themes/meilele/images/blank.gif" data-src2="<?php echo $this->_var['ad']['image']; ?>"></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>


<div class="w w1184 mt20 floor1">
  <div class="header clearfix">
    <div class="Left"><a class="title" target="_blank"></a></div>
  </div>
  <div class="main_new" id="JS_hover_img_box_1"><?php $_from = get_advlist_by_id(5); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?><a href="<?php echo $this->_var['ad']['url']; ?>" target="_blank" title="<?php echo $this->_var['ad']['name']; ?>" class="a_<?php echo $this->_foreach['index_image']['iteration']; ?> <?php if ($this->_foreach['index_image']['iteration'] == 1): ?>SCREEN-SHOW<?php endif; ?>"><img class="img_<?php echo $this->_foreach['index_image']['iteration']; ?>" src="/themes/meilele/images/blank.gif" data-src2="<?php echo $this->_var['ad']['image']; ?>"></a><?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?></div>
</div>

<?php $this->assign('ads_id','79'); ?><?php $this->assign('ads_num','5'); ?><?php echo $this->fetch('library/ad_position.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_1']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_1']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_2']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_2']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>
<?php $this->assign('cat_goods',$this->_var['cat_goods_3']); ?><?php $this->assign('goods_cat',$this->_var['goods_cat_3']); ?><?php echo $this->fetch('library/cat_goods.lbi'); ?>








<script language="javascript">
$('.cat_floor').each(
	function(i){
	var index = i + 1;
	$(this).addClass('floor2_'+index);
	
	}
);

</script>
<div class="w todayDown" style="display:none;">
  <div class="head"><strong class="name"><a href="search.php?intro=new" title="今日新品" target="_black">今日新品</a></strong></div>
  <div class="body">
  <?php $_from = get_cat_new_goods_5(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['get_cat_new_goods_5'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_new_goods_5']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['get_cat_new_goods_5']['iteration']++;
?>
    <div class="goods4_list mt20 <?php if ($this->_foreach['get_cat_new_goods_5']['iteration'] == 1): ?>first<?php endif; ?><?php if ($this->_foreach['get_cat_new_goods_5']['iteration'] == 5): ?>SCREEN-SHOW<?php endif; ?>">
      <div class="img"><?php if ($this->_var['goods']['save_rate'] > 0): ?><span class="yahei"><strong><?php echo $this->_var['goods']['save_rate']; ?></strong><br>折</span><?php endif; ?><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><img src="/themes/meilele/images/blank.gif" data-src2="/<?php echo $this->_var['goods']['thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a> </div>
      <div class="info"> <a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?></a><br />
        特价：<span class="yen red"></span><strong class="pr red"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></strong> </div>
    </div>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    
  </div>
</div>
<div class="w hotBrand"  style="display:none;">
  <div class="header yahei"><a href="brand.php" target="_blank">热门品牌</a></div>
  <table id="JS_hotBrand_table">
    <tr class="first">
	<?php $_from = get_advlist_by_id(6); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
	<?php if ($this->_foreach['index_image']['iteration'] < 8): ?>
      <td class="td_<?php echo $this->_foreach['index_image']['iteration']; ?>"><div class="bd">
          <div class="bg"></div>
          <div class="text"><?php echo $this->_var['ad']['name']; ?><br />
            <a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="_blank">去看商品</a></div>
          <div class="img"><img src="/themes/meilele/images/blank.gif" data-src2="/<?php echo $this->_var['ad']['image']; ?>" width="85" height="50" /><br />
            <?php echo $this->_var['ad']['name']; ?></div>
        </div></td>
	 <?php endif; ?>	
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	
     
    </tr>
    <tr>
    <?php $_from = get_advlist_by_id(6); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
	<?php if ($this->_foreach['index_image']['iteration'] > 7): ?>
      <td class="td_<?php echo $this->_foreach['index_image']['iteration']; ?>"><div class="bd">
          <div class="bg"></div>
          <div class="text"><?php echo $this->_var['ad']['name']; ?><br />
            <a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="_blank">去看商品</a></div>
          <div class="img"><img src="/themes/meilele/images/blank.gif" data-src2="/<?php echo $this->_var['ad']['image']; ?>" width="85" height="50" /><br />
            <?php echo $this->_var['ad']['name']; ?></div>
        </div></td>
	 <?php endif; ?>	
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </tr>
  </table>
</div>

<div class="w mt20">
  <div class="frameLay">
    <div class="showMyHome Left">
      <div class="layHead"> <strong class="name"><a href="article_cat.php?id=10" title="晒镜达人" target="_black">晒镜达人</a></strong>
        <div id="JS_focus_xspace_nav" class="tNav"><a href="javascript:;" class="current"></a><a href="javascript:;"></a><a href="javascript:;"></a></div>
      </div>
      <div class="layBody">
        <div class="stage">
          <table id="JS_focus_xspace_body" cellspacing="0" cellpadding="0">
            <tr>
			<?php $_from = get_cat_arts_9(10); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['artciles_list']['iteration']++;
?>
              <td><div class="list <?php if ($this->_foreach['artciles_list']['iteration'] == 1): ?>first<?php endif; ?>">
                  <div class="img"><a href="<?php echo $this->_var['article']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>"><img src="/themes/meilele/images/blank.gif" data-src2="/<?php echo $this->_var['article']['file_url']; ?>" width="167" height="200" alt="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" /></a></div>
                  <p class="txt"><?php echo htmlspecialchars($this->_var['article']['title']); ?></p>
                </div></td>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 	
              
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div id="JS_newdeal" class="articleTab">
      <div class="layHead">
        <div id="JS_tab_article_nav" class="tabNav"><a class="first current" href="javascript:;" title="最新评价">最新评价</a><a href="javascript:;" title="配镜指南">配镜指南</a></div>
      </div>
      <div id="JS_tab_article_body" class="layBody">
        <div id="INDEX_LeiHao_XXXXX" class="tabBody dealRecord current">
          <div style="margin-top: -182px;" id="JS_scroll_out_box" class="scrollBox">
		  <?php $_from = get_new_comment_30(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'msg');$this->_foreach['message_lists'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['message_lists']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['msg']):
        $this->_foreach['message_lists']['iteration']++;
?>
        <div class="item">
          <div class="img"><a href="goods-<?php echo $this->_var['msg']['goods_id']; ?>.html" target="_blank" title="<?php echo $this->_var['msg']['goods_name']; ?>"><img src="/<?php echo $this->_var['msg']['goods_thumb']; ?>" alt="<?php echo $this->_var['msg']['goods_name']; ?>" height="79" width="117"></a></div>
          <div class="txt"><a href="goods-<?php echo $this->_var['msg']['goods_id']; ?>.html" target="_blank" title="<?php echo $this->_var['msg']['goods_name']; ?>"><?php echo $this->_var['msg']['goods_name']; ?></a><br>
            <span class="time"><?php echo $this->_var['msg']['user_name']; ?></span> 评价了<br>
            <a href="goods.php?id=<?php echo $this->_var['msg']['goods_id']; ?>" target="_blank" title="<?php echo $this->_var['msg']['content']; ?>" style="color:#999"><?php echo sub_str($this->_var['msg']['content'],30); ?></a></div>
        </div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </div>
		  
        </div>
        <div class="tabBody">
          <div class="notes clearfix">
		  <?php $_from = get_cat_top_arts_1(11); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['artciles_list']['iteration']++;
?>
            <div class="img"><a href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" target="_blank"><img src="/themes/meilele/images/blank.gif" data-src="/<?php echo $this->_var['article']['file_url']; ?>" alt="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" width="161" height="106" /></a></div>
            <h3><a href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" target="_blank"><?php echo $this->_var['article']['short_title']; ?></a></h3>
            <p><a class="gray" href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" target="_blank"><?php echo sub_str($this->_var['article']['description'],40); ?></a></p>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </div>
          <ul class="clearfix">
		  <?php $_from = get_cat_arts_12(11); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['artciles_list']['iteration']++;
?>
            <li class="gray">&bull;&ensp;<a class="gray" href="<?php echo $this->_var['article']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" target="_blank"><?php echo $this->_var['article']['short_title']; ?></a></li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--<script src="themes/meilele/js/jq.js?1119"></script>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />-->
<link rel="stylesheet" type="text/css" href="themes/meilele/css1/style.css"/>
<link rel="stylesheet" type="text/css" href="themes/meilele/css1/style1.css"/>
<!--<script type="text/javascript" src="themes/meilele/js/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="themes/meilele/js/jquery-1.8.3.min.js"></script>-->
<script src="themes/meilele/js/js.KinerCode.js"></script>
<style>
	*{margin:0; padding:0;}
	ul li{list-style:none;}
	.usr{width:1190px; height:auto; margin:auto; margin-top:20px; margin-bottom:20px;}
	.usr_h3{border-bottom:3px solid #000; padding-bottom:5px; position:relative; font-weight:700; font-size:16px;}
	.usr_h3_span{color:#D02; font-size:16px;}
	.usr_cent{width:1190px; height:196px; overflow:hidden; position:relative;}
	.usr_cent ul{width:1190px; height:196px;}
	.usr_cent ul li a{width:391px; height:196px; margin-right:8.5px;  float:left;}
	.ps{width:391px; height:196px;  float:left; margin:0 !important;}
	.usr_btn{width:1190px; height:auto; margin:auto;}
	.usr_btn_left{width:265px; height:226px; padding:10px; float:left; margin-right:2px; border:1px solid #ddd;}
	.usr_btn_center{width:895px; height:246px; overflow:hidden; float:left; margin-ledt:2px; border:1px solid #ddd;}
	.usr_btn_right{width:296px; height:246px; float:right; text-align:center;}
	.usr_btn_left_a{width:260px; height:226px; border:1xp solid red;}
	.usr_btn__left_b{width:260px; height:220px;  overflow-y:auto; overflow-x:hidden;}/*下拉条*/
	.usr_btn_c{width:260px; /*height:35%;*/}
	.c1{width:60px; height:auto; font-weight:700; font-size:14px; line-height:24px; float:left; /*border-bottom:1px dashed #ddd;*/}
	.c2{width:200px; height:auto; font-size:14px; line-height:24px; float:right;/* border-bottom:1px dashed #ddd;*/}
	.usr_btn_center_a{width:539px; height:221px; margin:auto;}
	.a{/*border-bottom:1px dashed #ddd;*/ height:100%; line-height:24px;}
	.b{width:50px; font-size:14px; font-weight:700; float:left;}
	.cc{width:200px; float:left; color:#4d4d4d; font-size:14px;}
	.span_a{display: inline-block;  cursor:pointer; color:red;}
</style>
<script type="text/javascript">
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
</script>

<div style="width:1200px; height:500px; border-bottom:20px; margin:auto;">
	<div class="usr">
    	<h3 class="usr_h3">体验店(目前全国有<span class="usr_h3_span"><?php echo $this->_var['suppliers_num']; ?></span>家直营体验店)</h3>
        <div class="usr_cent">
       	  <ul>
            <li>
            	<a href="#"><img src="themes/meilele/imgs/1.jpg"></a>
                <a href="#"><img src="themes/meilele/imgs/2.jpg"></a>
                <a class="ps" href="#"><img src="themes/meilele/imgs/3.jpg"></a>
            </li>
          </ul>
        </div>
    </div>
    <div class="usr_btn">
    	<div class="usr_btn_left">
        	<div class="usr_btn_left_a">
            	 <div class="usr_btn__left_b">
                 	<div class="usr_btn_c">
                       <?php if ($this->_var['city_info1']): ?>
                        <?php $_from = $this->_var['city_info1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'citys');$this->_foreach['city'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['city']['total'] > 0):
    foreach ($_from AS $this->_var['citys']):
        $this->_foreach['city']['iteration']++;
?>
                        <dl class="a">
                        	<dt class="b"><?php echo $this->_var['citys']['region_name']; ?></dt>
                        	<dd class="cc">
                                 <?php $_from = $this->_var['citys']['suppliers_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'suppliers');$this->_foreach['suppliers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['suppliers']['total'] > 0):
    foreach ($_from AS $this->_var['suppliers']):
        $this->_foreach['suppliers']['iteration']++;
?>
                            	<span class="span_a" id="<?php echo $this->_var['suppliers']['suppliers_id']; ?>" style="font-size:13px; margin:0 10px 0 10px;"><?php echo $this->_var['suppliers']['suppliers_name']; ?></span>&nbsp;&nbsp;
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                               
                            </dd>
                        </dl>
                         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                         
                         <?php endif; ?>
                        <div style="clear:both"></div>
                        
                       <?php $_from = $this->_var['city_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'citys');$this->_foreach['city'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['city']['total'] > 0):
    foreach ($_from AS $this->_var['citys']):
        $this->_foreach['city']['iteration']++;
?>
                    	<dl class="a">
                        	<dt class="b"><?php echo $this->_var['citys']['region_name']; ?></dt>
                        	<dd class="cc">
                                 <?php $_from = $this->_var['citys']['suppliers_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'suppliers');$this->_foreach['suppliers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['suppliers']['total'] > 0):
    foreach ($_from AS $this->_var['suppliers']):
        $this->_foreach['suppliers']['iteration']++;
?>
                            	<span class="span_a" id="<?php echo $this->_var['suppliers']['suppliers_id']; ?>" style="font-size:13px; margin:0 10px 0 10px;"><?php echo $this->_var['suppliers']['suppliers_name']; ?></span>&nbsp;&nbsp;
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                               
                            </dd>
                        </dl>
                        <div style="clear:both"></div>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        
                        
                        
                    </div>
                 </div> 
            </div>
        </div>
          
          
           <span id="tt_nei">
        <div class="usr_btn_center">
                <div class="focus" id="focus">
                  <div class="left">
                    <ul>
                     <li class="active" style="opacity:1; filter:alpha(opacity=100);"><p>图一</p>
                            <div style="width:550px; height:220px; margin-left:20px;"><?php echo $this->_var['suppliers_info']['gallery']; ?></div>
                     </li>
                     <li style='padding:10px; font-size:14px;'><span>公交：<?php echo $this->_var['suppliers_info']['line']; ?></span></li>
                     <li style='padding:10px; font-size:14px;' id="address_info"  data="<?php echo $this->_var['suppliers_info']['address']; ?>">
                     <?php echo $this->_var['suppliers_info']['address']; ?>
                     
                     <br>
                     <br>
                     <p></p>
                     
                     <input type="text" style="width:150px; height:24px; border:1xp solid #999;" class='tel_num' placeholder='请输入手机号'>
                     <input style="width:60px; height:28px;" class="send_position" type="button" value="发送">
                     </li>
                     <li style='padding:10px; font-size:14px;'>工作日周一至周五：<?php echo $this->_var['suppliers_info']['work_time']; ?></li>
                    </ul>
                  </div>
                  <div class="right">
                    <ul>
                     <li class="active">+查看实体店<br/>View Store</li>
                     <li>+附近交通<br/>Direction</li>
                     <li>+发送店地址到手机<br/>Send To Mobile</li>
                     <li>+营业时间<br/>Business  Hours</li>
                     <button class="tc" style="margin:30px 0 0 40px; border:0px; cursor:pointer;"><img src="themes/meilele/imgs/1.png"></button>
                    </ul>
                   </div>
                </div>	      
        </div>
           </span>
           
    </div>
    
    
    <div id="gray" style="left:0px;"></div>

<div class="popup" id="popup" style="position:fixed;">

	<div class="top_nav" id='top_nav'>
		<div align="center">
			<i></i>
			<span><h4 style="color:#333;">在线预约到店体验</h4></span>
			<a class="guanbi"></a>
		</div>
	</div>
	
	<div class="min">
	
		<div class="tc_login">
		
            <div class="txt_top">请选择您想要去的<span style="color:red;">城市</span>和<span style="color:red;">门店</span>&nbsp;!</div>
            
            <form action="uc3.php" method="POST" name="form1" id="form1"  onSubmit="return ren_test();">
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
               		<div class="inp"><input name="tel" id="tc_tel" type="text" / class="put"></div>
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
                            <a style="cursor:pointer; text-decoration:none;" onclick="createCodepx()">获取验证码</a>    
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
             </form> 
           
   			
		</div>
	
	</div>

</div>
</div>
 
    <style type="text/css">
    .code1{background:url(code_bg.jpg);font-family:Arial;font-style:italic;color:blue; font-size:20px;padding:2px 3px;letter-spacing:3px; font-weight:bolder; float:left;cursor:pointer;width:80px; height:24px; line-height:24px;text-align:center;vertical-align:middle; background:#F60;}
    a{text-decoration:none;}
    a:hover{text-decoration:underline;}
    </style>
    <script language="javascript" type="text/javascript">
       
	  
	   
	   
	   var m=$('.selopt').val();
	   var action="yuyue";
	   t_yuyue(action,m);
	   
	   
		$(function(){
            $('.selopt').change(function(e){
				 action="yuyue";
                 m=$(this).val();
				 t_yuyue(action,m);
 
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
					},
			  }); 
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
            else if (inputCode.toUpperCase() != code1.toUpperCase())
            {
                alert("验证码输入有误！");
                createCodepx();
            }
            else
            {
                return true;
            }       
        }   
     </script>


  
<script type="text/javascript">

//窗口效果
//点击登录class为tc 显示
$(".tc").click(function(){
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

<style>
/**{padding:0px;margin:0px;}
body{min-width:980px;background-color:#fafafa;font:12px/1.5 arial,sans-serif;}
body,ul,h1{margin:0px;}
ul{list-style-type:none;}
img{display:block;}
a{text-decoration:none;}*/

/*--弹窗样式--*/

#gray1{width:100%;height:100%;background:rgba(0,0,0,0.3);position:fixed;top:0px;display:none;z-index:99;}
.popup1{width:580px; height:auto;background-color:#fff;position:fixed;z-index:100;border:1px solid #ebeaea;left:400px;top:96px;display:none;box-shadow:2px 2px 20px #666666; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.popup1 .top_nav1{width:580px;height:46px;border-bottom:1px solid #ebeaea;position:relative; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.popup1 .top_nav1 span{font:18px/18px 'microsoft yahei';color:#707070;display:block;position:absolute;top:13px;left:16px; color:#000; font-weight:600; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.popup1 .top_nav1 a.guanbi1 {background:url(themes/meilele/imgs/popup_guanbi.png) repeat 0px 0px; width:35px; height: 35px; display: block; position:absolute;top:8px;right:10px;cursor:pointer; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.popup1 .top_nav1 a.guanbi1 span {display: none; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.popup1 .top_nav1 a.guanbi1:hover {background: url(themes/meilele/imgs/popup_guanbi.png) repeat 0px -35px; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.popup1 .min1{width:552px;height:auto; margin:auto; padding-bottom:10px; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tc_login1{width:552px;height:400px;background-color:#fff; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tianming_box_1{width:552px; height:24px; line-height:24px; font-size:14px; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tianming_box_2{width:552px; height:24px; margin-top:10px;  border-bottom:1px solid #000; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tianming_box_3{width:552px; height:300px; margin-top:2px; background:#f5f5f5; font-size:14px; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tianming_box_4{width:552px; height:30px; margin-top:10px; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tianming_box_an{width:130px; height:30px; background:#F00; text-align:center; line-height:30px; color:#FFF; cursor:pointer; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tianming_box_5{width:552px; height:30px; line-height:30px; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tianming_box_ul{/*-moz-column-count:3; -webkit-column-count:3; -ms-column-count:3; -o-column-count:3;  column-count:3;*/ width:552px; height:30px;}
.tianming_box_li{width:170px; height:30px; line-height:30px; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important; float:left;}
.wen_s{float:left;}
.wen_div{margin-left:15px; width:155px; height:30px; line-height:30px; overflow:visible;  word-wrap:break-word; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.wen_div a{padding:1px; width:155px; height:30px; line-height:30px; /*-moz-white-space: nowrap; -ms-white-space: nowrap; -o-white-space: nowrap; -webkit-white-space: nowrap;*/ font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}
.tianming_box_5 a{color:#999; font-size:12px; line-height:30px; text-decoration:none; font-family:"微软雅黑"; font-family: "Microsoft YaHei" !important;}

</style>
<!--<div align="center">
	<p><a href="#" class="tabx">登录</a></p>
</div>-->
<?php if (! $this->_var['tt_session']): ?>
<div id="gray1"></div>

<div class="popup1" id="popup2">

	<div class="top_nav1" id='top_nav1'>
		<div align="center">
			<i></i>
			<span><strong style="color:#F00;">天明眼镜</strong>-国内知名的O2O配镜电商</span>
			<a class="guanbi1"></a>
		</div>
	</div>
	
	<div class="min1">
    
		<div class="tc_login1">
			<div class="tianming_box_1">目前全国已有<span style="color:#F00; font-weight:700; font-size:16px; vertical-align:bottom;"><?php echo $this->_var['suppliers_num']; ?></span>家直营体验店，请选择您所在城市</div>
            <div class="tianming_box_2">
            	<div style="width:150px; height:24px; float:left;">
                    <span style="font-size:16px; font-weight:600; color:#000;"><?php echo $this->_var['now_city']['region_name']; ?>站</span>&nbsp;&nbsp;
                    <span style="color:#646464; font-size:14px; line-height:24px;"><?php echo $this->_var['now_city']['pin_yin']; ?></span>
                </div>
                <div style="float:right; color:#F60; line-height:24px; font-size:12px; cursor:pointer;">查看附近的体验店</div>
               
            </div>
            <div>
                 
                    <div class="tianming_box_3">
                    
                        <div class="tianming_box_5">热门城市：
                        <span>
                        <?php $_from = $this->_var['hot_city']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'hotcity');$this->_foreach['hot_citys'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_citys']['total'] > 0):
    foreach ($_from AS $this->_var['hotcity']):
        $this->_foreach['hot_citys']['iteration']++;
?>
                        <a href="/<?php echo $this->_var['hotcity']['pin_yin']; ?>"><?php echo $this->_var['hotcity']['region_name']; ?></a> 
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </span>
                        </div>
                        
                        <ul class="tianming_box_ul">
                             
                           <?php $_from = $this->_var['hot_city_pai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'hotcity');$this->_foreach['hot_citys'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_citys']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['hotcity']):
        $this->_foreach['hot_citys']['iteration']++;
?>
                            <li class="tianming_box_li">
                                <span class="wen_s"><?php echo $this->_var['key']; ?></span>
                                 <?php $_from = $this->_var['hot_city_pai'][$this->_var['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'hotcity1');$this->_foreach['hot_citys1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hot_citys1']['total'] > 0):
    foreach ($_from AS $this->_var['hotcity1']):
        $this->_foreach['hot_citys1']['iteration']++;
?>
                                  <span class="wen_div"><a href="/<?php echo $this->_var['hotcity1']['pin_yin']; ?>"><?php echo $this->_var['hotcity1']['region_name']; ?></a></span>
                                 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                               
                            </li>
                            
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                           
                        </ul>
                    </div>
                    
                    <div class="tianming_box_4">
                        <div class="tianming_box_an"><img src="themes/meilele/imgs/suba.jpg"></div>
                    </div>
            </div>
            
           
   			
		</div>
    
	</div>

</div>


<script type="text/javascript">
//窗口效果
//点击登录class为tc 显示

/*	$(".tabx").click(function(){
	$("#gray1").show();
	$("#popup2").show();//查找ID为popup的DIV show()显示#gray
	tc_center1();
});*/
	
	function logo1(){
		$("#gray1").show();
		$("#popup2").show();//查找ID为popup的DIV show()显示#gray
		tc_center1();
		}
		window.onload=logo1;

//点击关闭按钮
$("a.guanbi1").click(function(){
	$("#gray1").hide();
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
<?php endif; ?>




<div class="w mt20" id="expr_list" style="display:none">
  <div class="randomExpr">
    <div class="title"><strong><a href="javascript:;" target="_blank"><?php 
$k = array (
  'name' => 'area_name',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>体验店</a></strong></div>
    <div class="body">
	<?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'supplier');$this->_foreach['get_suppliers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_suppliers']['total'] > 0):
    foreach ($_from AS $this->_var['supplier']):
        $this->_foreach['get_suppliers']['iteration']++;
?>
      <div class="list <?php if ($this->_foreach['get_suppliers']['iteration'] == 1): ?>first<?php endif; ?>">
        <div class="name Left">
          <h3 style="width:150px"><a href="expr_show-<?php echo $this->_var['supplier']['suppliers_id']; ?>.html" title="<?php echo $this->_var['supplier']['suppliers_name']; ?>" target="_blank"><?php echo $this->_var['supplier']['suppliers_name']; ?></a></h3>
        </div>
        <div id="JS_hide_map_menu_1" class="addr Left" onmouseover="_show_(this);" onmouseout="_hide_(this);" style="margin-left:150px">
          <div class="floatMap">
            <div class="arrow"></div>
            <div class="map"><img src="/<?php echo $this->_var['supplier']['position_img']; ?>" width="250" height="238" alt="<?php echo $this->_var['supplier']['suppliers_name']; ?>" /></div>
          </div>
          <p>地址：<a href="expr_show-<?php echo $this->_var['supplier']['suppliers_id']; ?>.html" target="_blank" title="><?php echo $this->_var['supplier']['address']; ?>"><?php echo $this->_var['supplier']['address']; ?></a></p>
          <p>乘车路线：<span><?php echo $this->_var['supplier']['line']; ?></span></p>
        </div>
        <div class="phone Left" style="float:right; border-right:0px"> 体验热线：<strong class="f_13 red yen"><?php echo $this->_var['supplier']['tel']; ?></strong><br />
          营业时间：<?php echo $this->_var['supplier']['work_time']; ?> </div>
        
      </div>
	  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
      
    </div>
  </div>
</div>
<script language="javascript">

$(".span_a").click(function(){ 
     
	var id=this.id;

	 $.ajax({
				    type:"POST",                         
				    url:"uc2.php",
				    data:{id:id},                      
				    dataType:"html",
					success:function(data)
					{  
					   $('#tt_nei').html(data);
					},
			  }); 
	 
	 
});


$(".send_position").click(function(){ 
     
	var tel_num=$('.tel_num').val();
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
	var info=$('#address_info').attr("data")
   
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
	 
	 
});



$(".txt_btnn2").click(function(){ 
     
	var tel_num=$('#tc_tel').val();
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
	var info=$('#address_info').attr("data")
   
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
	 
	 
});





$('#expr_list .body').each(
	function (i){
		if ($.trim($(this).html()) != ''){
			$('#expr_list').show();
		}
	}
);
</script>
<?php echo $this->fetch('library/help.lbi'); ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?>

<script language="javascript">

_show_(document.getElementById('JS_common_head_menu_812'),{source:'JS_all_head_category_menu',target:'JS_head_expand_menu_target'});
</script>


<script src="/themes/meilele/js/back_to_top.min.js?1127"></script>

<script type="text/javascript">
function limitCount() {

	var a = limitCount.doms = limitCount.doms || $("#JS_limit_table div.JS_leaveTime");
	a.each(function() {
		var c = $(this);
		var b = c[0]._timeline = c[0]._timeline || c.data("timeline");
		c.html(limitFormatTime(b - limitCount.unixTime));
	});
	limitCount.unixTime++;
}

function limitFormatTime(e) {
	if (e < 0) {
		e = 0;
	}
	var f = Math.floor(e / 3600 / 24),
	c = Math.floor((e / 3600) % 24),
	a = Math.floor((e % 3600) / 60),
	b = Math.floor((e % 3600) % 60);
	if (c < 10) {
		c = "0" + c;
	}
	if (a < 10) {
		a = "0" + a;
	}
	if (b < 10) {
		b = "0" + b;
	}
	return "剩余" + (f > 0 ? '<span class="digital">' + f + "</span>天": "") + '<span class="digital">' + c + '</span>时<span class="digital">' + a + '</span>分<span class="digital">' + b + "</span>秒";
}
function _COMMON_UNIX_TIME() {
		limitCount.unixTime = 0;
		setInterval(limitCount, 1000);
}
_COMMON_UNIX_TIME();
function getNewDealRecord() {
	
}
function formatTime(i) {
	if (!i) {
		return "刚刚";
	}
	var b = parseInt((new Date()).getTime() / 1000);
	var f = b - i;
	if (f < 0) {
		f = 0;
	}
	var e = f % 60;
	var a = parseInt(f % 3600 / 60);
	var c = parseInt(f % (3600 * 24) / 3600);
	var g = parseInt(f / (3600 * 24));
	if (g) {
		return g + "天前";
	} else {
		if (c) {
			return c + "小时前";
		} else {
			if (a) {
				return a + "分钟前";
			} else {
				if (e) {
					return e + "秒前";
				} else {
					return "刚刚";
				}
			}
		}
	}
}
function dealRecordAnimate() {
	window._JS_ZZ_LOCK_ = false;
	var e = $("#JS_scroll_out_box");
	var b = $("#JS_scroll_out_box .item");
	var a = window.LOAD ? parseInt(b.length / 2) : b.length;
	var c;
	if (a > 3) {
		e.css("margin-top", a * ( - 91) + "px");
		c = -a;
		e.hover(function() {
			window._JS_ZZ_LOCK_ = true;
		},
		function() {
			window._JS_ZZ_LOCK_ = false;
		});
		var d = e.html();
		d += d;
		e.html(d);
		setInterval(f, 4000);
	}
	function f() {
		if (window._JS_ZZ_LOCK_) {
			return;
		}
		c++;
		e.animate({
			"margin-top": c * 91 + "px"
		},
		200, "linear",
		function() {
			if (c > -1) {
				e.css("margin-top", a * ( - 91) + "px");
				c = -a;
			}
		});
	}
}
dealRecordAnimate();
$(function() {
	$.lazyImg.start("both", {
		attributeTag: "data-src2"
	});
	window._currentWidth = document.body.clientWidth;
	window.onresize = function() {
		window._currentWidth = document.body.clientWidth;
		c = 0;
		g();
	};
	var f = $("#JS_side_stage"),
	a = $("#JS_side_stage a"),
	i = $("#JS_side_nav a"),
	b = $("#JS_side_stage a"),
	d = i.length,
	e = 0,
	c = 0;
	i.on("mouseover",
	function() {
		c = $(this).index();
		if (h) {
			clearInterval(h);
		}
		g();
	}).on("mouseout",
	function() {
		h = setInterval(function() {
			g();
		},
		6000);
	});
	var g = function() {
		$(i.get(e)).removeClass("current");
		$(i.get(c)).addClass("current");
		f.stop(true, false).animate({
			"margin-left": (0 - c) * window._currentWidth + "px"
		},
		200);
		e = c;
		var l = $(b.get(e));
		var j = l.attr("data-bg");
		if (j) {
			l.css({
				background: "url(" + j + ") center center no-repeat"
			}).removeAttr("data-bg");
		}
		c = (c >= d - 1) ? 0 : c + 1;
	};
	var h = setInterval(function() {
		g();
	},
	6000);
});
function slideLazy(a) {
	if (a.index > 0) {
		var b = a["_img_" + a.index] || a.stage.find("img").get(a.index);
		if (b && !b._lazYDone) {
			$.lazyImg.prepend([{
				target: b,
				src: b.getAttribute("lazy-src2")
			}]);
			a["_img_" + a.index] = b;
			b._lazYDone = true;
		}
	}
}
$(function() {
	$.tab($("#JS_expr_num_box td.enav"), $("#JS_expr_num_box td.ebody"), {
		lazy: false
	});
	$.tab($("#JS_side_tab_nav a"), $("#JS_side_tab_body .tBody"), {
		lazy: false
	});
	$("#JS_group_buy_body").on("mouseover",
	function() {
		this.className = "body current";
	}).on("mouseout",
	function() {
		this.className = "body";
	});
	$.slide({
		prevBtn: $("#JS_group_nav_prev"),
		nextBtn: $("#JS_group_nav_next")
	},
	$("#JS_groupBuy_stage"), {
		step: 210
	});
	$.slide({
		prevBtn: $("#JS_limit_left"),
		nextBtn: $("#JS_limit_right")
	},
	$("#JS_limit_table"), {
		step: window.LOAD ? 960 : 750,
		onSlide: function(b) {
			if (b.index > 0 && !b._lazYDone) {
				var e = b.stage.find("div.img img");
				var d = [];
				for (var c = 3; c < 6; c++) {
					if (e[c]) {
						d.push({
							target: e[c],
							src: e[c].getAttribute("lazy-src2")
						});
					}
				}
				if (d.length) {
					$.lazyImg.prepend(d);
				}
				b._lazYDone = true;
			}
		}
	});
	$("#JS_limit_table").on("mouseenter", "td",
	function() {
		this.className = "current";
	});
	$("#JS_limit_table").on("mouseleave ", "td",
	function() {
		this.className = "";
	});
	$("#JS_check_order").on("click",
	function() {
		orderQuery();
	});
	for (var a = 1; a <= 4; a++) {
		
		$.slide($("#JS_floor_focus_nav_" + a + " a"), $("#JS_floor_focus_stage_" + a), {
			step: 473,
			eventType: "mouseenter",
			autoRun: 5000,
			onSlide: slideLazy
		});
	}
});

function orderQuery()
{
  var order_sn = $('#JS_ordersn').val();

  var reg = /^[\.0-9]+/;
  if (order_sn.length < 10 || ! reg.test(order_sn))
  {
    $.alert('无效订单号!');
    return;
  }
  $.ajax({
					type:"GET",
					url:'user.php?act=order_query&order_sn=s' + order_sn,
					cache:false,
					dataType:'json',     //接受数据格式
					data:'',
					success:orderQueryResponse
				});
}

function orderQueryResponse(result)
{
  if (result.message.length > 0)
  {
    $.alert(result.message);
  }
  if (result.error == 0)
  {
	$.alert(result.content);
  }
}

$(window).on("load",
function() {
	$.slide($("#JS_zx_slide_nav a"), $("#JS_zx_slide_body"), {
		step: 510,
		eventType: "mouseenter",
		autoRun: 3000,
		onSlide: slideLazy
	});
	$.slide($("#JS_focus_xspace_nav a"), $("#JS_focus_xspace_body"), {
		step: 567,
		eventType: "mouseenter",
		autoRun: 3500,
		onSlide: function(b) {
			var a = b.index;
			if (a > 0 && !b["_lazyDone_" + a]) {
				var e = b.stage.find("div.img img");
				var d = [];
				for (var c = a * 3; c < (a + 1) * 3; c++) {
					if (e[c]) {
						d.push({
							target: e[c],
							src: e[c].getAttribute("lazy-src2")
						});
					}
				}
				if (d.length) {
					$.lazyImg.prepend(d);
				}
				b["_lazyDone_" + a] = true;
			}
		}
	});
	$.tab($("#JS_tab_article_nav a"), $("#JS_tab_article_body div.tabBody"));
	getNewDealRecord();
	$("#JS_hotBrand_table").on("mouseenter", "td",
	function() {
		$(this).addClass("current");
	});
	$("#JS_hotBrand_table").on("mouseleave ", "td",
	function() {
		$(this).removeClass("current");
	});
});
/*LDZ:2013-08-16 15:52:28*/</script>


</body>
</html>
<!--
GH:2013-10-22 18:31:38
-->
