<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css?1122" />
<script src="themes/meilele/js/jq.js?1119"></script>
<link rel="stylesheet" type="text/css" href="themes/meilele/css/article_list.min.css?0220"/>
</head>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>
<div class="position w clearfix"><?php echo $this->fetch('library/ur_here.lbi'); ?></div>
<div class="listMain w clearfix">
  <div class="listMainL Left">
  <?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
    <div class="listBox">
      <div class="listBoxT one">
        <h2><span>发布日期：<?php echo $this->_var['article']['add_time']; ?></span><a href="<?php echo $this->_var['article']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>"><?php echo htmlspecialchars($this->_var['article']['title']); ?></a></h2>
        <div class="lable"><i class="pen"></i><span class="name">关键字：</span> <?php if ($this->_var['article']['keywords']): ?><a class="lb"><?php echo $this->_var['article']['keywords']; ?></a><?php endif; ?> </div>
        <i class="coner"></i> </div>
      <div class="listBoxC">
        <p class="txt"><?php echo sub_str($this->_var['article']['description'],30); ?><a href="<?php echo $this->_var['article']['url']; ?>" target="_blank" title="【查看全文】">【查看全文】</a></p>
        <p class="img"><a href="<?php echo $this->_var['article']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>"><img width="600" height="400" src="<?php echo $this->_var['article']['file_url']; ?>" alt="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" /></a></p>
      </div>
    </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	
    <?php echo $this->fetch('library/pages2.lbi'); ?>
  </div>
  <div class="listMainR Right">
    
    <?php $_from = get_advlist_by_id(9); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
  <div id="ad" class="zxFocus current" style="margin-bottom:15px"><a href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="undefined"><img src="<?php echo $this->_var['ad']['image']; ?>" alt="<?php echo $this->_var['ad']['name']; ?>" height="250" width="300"></a></div>

  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    <div class="rBox clearfix">
      <h3>最新文章</h3>
      <div class="clickRank">
        <dl>
          <dd>
            <ul class="imgBox clearfix">
			<?php $_from = get_cat_arts_10(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['artciles_list']['iteration']++;
?>
			<?php if ($this->_foreach['artciles_list']['iteration'] < 3): ?>
              <li <?php if ($this->_foreach['artciles_list']['iteration'] < 2): ?>class="first"<?php endif; ?>><a href="<?php echo $this->_var['article']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>"><img src="<?php echo $this->_var['article']['file_url']; ?>" width="135" height="85" alt="<?php echo htmlspecialchars($this->_var['article']['title']); ?>"/></a><br/>
                <a href="<?php echo $this->_var['article']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>"><?php echo sub_str($this->_var['article']['title'],10); ?></a></li>
			<?php endif; ?>	
				 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
             
            </ul>
          </dd>
        </dl>
		<?php $_from = get_cat_arts_10(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');$this->_foreach['artciles_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['artciles_list']['total'] > 0):
    foreach ($_from AS $this->_var['article']):
        $this->_foreach['artciles_list']['iteration']++;
?>
			<?php if ($this->_foreach['artciles_list']['iteration'] > 2): ?>
        <dl>
          <dt><a href="<?php echo $this->_var['article']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['article']['title']); ?>"><?php echo $this->_var['article']['short_title']; ?></a></dt>
          <dd></dd>
        </dl>
        <?php endif; ?>	
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
      </div>
    </div>
    <div class="rBox clearfix">
      <h3>热销产品</h3>
      <div id="JS_shop_body" class="shopBody tabBody">
        <ul class="ul current clearfix">
		<?php $_from = get_cat_hot_goods_10(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['get_cat_new_goods_5'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['get_cat_new_goods_5']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['get_cat_new_goods_5']['iteration']++;
?>
          <li class="Left clearfix">
            <div class="list Left">
              <div><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"> <img src="<?php echo $this->_var['goods']['thumb']; ?>" width="130" height="86" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" /></a> </div>
              <p><a href="<?php echo $this->_var['goods']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>"><?php echo sub_str($this->_var['goods']['name'],10); ?></a><br />
                本站价：<b class="red yen"><?php if ($this->_var['goods']['promote_price'] != ""): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?></b> </p>
            </div>
          </li>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
		  
          <li class="more"><a href="search.php?intro=hot" target="_blank" title="更多产品&raquo;">更多产品&raquo;</a></li>
        </ul>
        
      </div>
    </div>
    
  </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
<!--
LDZ:1369815350
-->
