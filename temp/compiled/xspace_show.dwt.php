<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta charset="utf-8">
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<link rel="stylesheet" type="text/css" href="themes/meilele/css/xspace_common.min.css?0913" />
<script src="themes/meilele/js/jq.js?1119"></script>
<script src="themes/meilele/js/jquery.json.min.js"></script>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="xspace_bg">
  <div class="no_mt">
    <div class="w mt10 mb10 top_banner" style="height:60px;display:none;overflow:hidden;" id="JS_banner">
      <div id="JS_banner_in"></div>
    </div>
  </div>
  <div class="w clearfix" style="margin-bottom:5px"> 当前位置: <a href=".">首页</a> <code>&gt;</code> <a href="xspace.html">秀家</a> <code>&gt;</code> <?php echo htmlspecialchars($this->_var['article']['title']); ?> </div>
  <div class="w clearfix xspace_box" id="JS_detail_box">
    <div class="Left detail_left" id="JS_detail_left">
      <div class="title cont_mid">
        <h3><?php echo htmlspecialchars($this->_var['article']['title']); ?><span id="JS_slider_index" class="red">[<span id="JS_now_count">1</span>/<font id="img_len"></font>]</span></h3>
      </div>
      <div class="slider_box">
        <div class="slider cont_mid" id="JS_slider" style="min-height:400px"> </div>
        <div class="nav"> <a href="javascript:;" class="prev arrow icon_sprite" id="JS_prev_img"></a> <a href="javascript:;" class="next arrow icon_sprite" id="JS_next_img"></a> </div>
        <div id="show_content" style="display:none"> <?php echo $this->_var['article']['content']; ?> </div>
        <script language="javascript">
		var content = '';
		var img_len = 0;
		$('#show_content img').each(
			function(i){
			    img_len = i + 1;
				var src = $(this).attr('src');
				if (i == 0){
var temp = '<a href="javascript:;" ><img src="'+src+'" width="700" border="0"/></a> ';
				}else{
var temp = '<a href="javascript:;" class="none"><img src="themes/meilele/images/blank.gif" lazy-src="'+src+'" width="700" border="0"/></a> ';
				}
				
				content += temp;
			}
		);

		$('#JS_slider').html(content);
		$('#img_len').html(img_len);
		</script>
      </div>
      <div class="tools cont_mid clearfix">
        <div class="Left share_box gray">
          <div class="Left share_text">分享到：</div>
          <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <span class="bds_more"></span> <a class="shareCount"></a> </div>
        </div>
        <div class="msg_box clearfix Right">
          <div class="Left"> <a href="javascript:;" data-tid="13546" class="icon_sprite icon_like JS_i_like"></a><i class="icon_sprite icon_like_only JS_only_like" style="display:none;"></i> </div>
          <div class="red Left ml5 link_num_x JS_like_num" id="JS_already_love"><?php echo $this->_var['article']['click']; ?></div>
        </div>
      </div>
      <div class="relation_xspace clearfix"> <?php if ($this->_var['prev_article']): ?>
        <div class="Left clearfix"><a class="w_80" href="xspace_show.php?id=<?php echo $this->_var['prev_article']['article_id']; ?>"><span class="simsun">&nbsp;&lt;&lt;</span> 上一秀家</a> <a href="xspace_show.php?id=<?php echo $this->_var['prev_article']['article_id']; ?>" class="text-overflow w_215"><?php echo $this->_var['prev_article']['title']; ?></a></div>
        <?php endif; ?>
        <?php if ($this->_var['next_article']): ?>
        <div class="Right clearfix"><a href="xspace_show.php?id=<?php echo $this->_var['next_article']['article_id']; ?>" class="w_80">下一秀家 <span class="simsun">&gt;&gt;&nbsp;</span></a> <a class="text-overflow w_215" href="xspace_show.php?id=<?php echo $this->_var['next_article']['article_id']; ?>"><?php echo $this->_var['next_article']['title']; ?></a></div>
        <?php endif; ?> </div>
      <div id="ECS_COMMENT"> <?php 
$k = array (
  'name' => 'comments',
  'type' => '1',
  'id' => $this->_var['article']['article_id'],
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?></div>
    </div>
    <div class="Right detail_right">
      <div style="margin-bottom: 19px;">
        <h3 class="title clearfix h_l20"> <span class="Left">相关商品</span> </h3>
        <div class="content" style="padding-top:10px">
          <?php $_from = $this->_var['order_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <div class="hot_list clearfix">
            <div class="Left"> <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>" target="_blank"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['goods']['goods_thumb']; ?>" alt="" width="108" height="73" border="0" /></a> </div>
            <div class="Right x_right">
              <div class="mt7"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>" target="_blank"><?php echo sub_str($this->_var['goods']['goods_name'],10); ?></a></div>
              <div class="middle"> <span class="color_666">本站价：</span></span><span class="yen red"></span><span class="price yahei red"><?php echo $this->_var['goods']['goods_price']; ?> </span> </div>
              <div class="clearfix"> <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" title="<?php echo $this->_var['goods']['goods_name']; ?>" target="_blank" class="goods_buy">去购买</a></a> </div>
            </div>
          </div>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'releated_goods_data');$this->_foreach['related_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['related_goods']['total'] > 0):
    foreach ($_from AS $this->_var['releated_goods_data']):
        $this->_foreach['related_goods']['iteration']++;
?>
          <div class="hot_list clearfix">
            <div class="Left"> <a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" target="_blank"><img src="themes/meilele/images/blank.gif" data-src="<?php echo $this->_var['releated_goods_data']['goods_thumb']; ?>" alt="" width="108" height="73" border="0" /></a> </div>
            <div class="Right x_right">
              <div class="mt7"><a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" target="_blank"><?php echo sub_str($this->_var['releated_goods_data']['short_name'],10); ?></a></div>
              <div class="middle"> <span class="color_666">本站价：</span></span><span class="yen red"></span><span class="price yahei red">
                <?php if ($this->_var['releated_goods_data']['promote_price'] != 0): ?>
                <?php echo $this->_var['releated_goods_data']['formated_promote_price']; ?>
                <?php else: ?>
                <?php echo $this->_var['releated_goods_data']['shop_price']; ?>
                <?php endif; ?>
                </span> </div>
              <div class="clearfix"> <a href="<?php echo $this->_var['releated_goods_data']['url']; ?>" title="<?php echo $this->_var['releated_goods_data']['goods_name']; ?>" target="_blank" class="goods_buy">去购买</a></a> </div>
            </div>
          </div>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
      </div>
      <div class="mb25">
        <h3 class="title clearfix"> <span>最新秀家</span>
        </h3>
        <div class="content" style="padding-top:10px">
		<?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_0_95162000_1477414784');if (count($_from)):
    foreach ($_from AS $this->_var['article_0_95162000_1477414784']):
?>
          <div class="hot_list clearfix">
            <div class="Left"> <span class="icon_sprite icon_hot"></span> <a href="xspace_show.php?id=<?php echo $this->_var['article_0_95162000_1477414784']['id']; ?>" title="" target="_blank"><img src="<?php echo $this->_var['article_0_95162000_1477414784']['file_url']; ?>" alt="" border="0" height="73" width="108"></a> </div>
            <div class="Right x_right">
              <h4> <a href="xspace_show.php?id=<?php echo $this->_var['article_0_95162000_1477414784']['id']; ?>" class="f14 post_title" title="" target="_blank"></a> </h4>
              <p class="post_content"><?php echo $this->_var['article_0_95162000_1477414784']['title']; ?></p>
              <div class="post_extra clearfix">
                <div class="Left clearfix"><i class="icon_sprite icon_love"></i><span>喜欢</span><span class="red"><?php echo $this->_var['article_0_95162000_1477414784']['click']; ?></span></div>
                <div class="Right clearfix"><span>评论</span><span class="red"><?php echo $this->_var['article_0_95162000_1477414784']['pager']['record_count']; ?></span></div>
              </div>
            </div>
          </div>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		  
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script type="text/javascript" id="bdshare_js" data="type=tools"></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<script>
var G_obj = {
    tid : '13546',
    pageName : 'detail',
    listNum : 3
}
</script>
<script type="text/javascript" src="themes/meilele/js/xspace_common.min.js?0913"></script>
</body>
</html>
<!--
czc:2013-09-14 13:26:01
-->
