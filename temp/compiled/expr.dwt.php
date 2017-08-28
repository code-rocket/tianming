<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="themes/meilele/css/mll_common.min.css" />
<script src="themes/meilele/js/jq.js?1119"></script>
<link href="themes/meilele/css/sub_expr.min.css" rel="stylesheet" type="text/css" />
<title><?php 
$k = array (
  'name' => 'area_name',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>体验店</title>

</head>
<body style="background-color:#FFFFFF">
<?php echo $this->fetch('library/page_header.lbi'); ?>
<?php $_from = get_advlist_by_id(16); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ad');$this->_foreach['index_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['index_image']['total'] > 0):
    foreach ($_from AS $this->_var['ad']):
        $this->_foreach['index_image']['iteration']++;
?>
<div class="w mt20 top_banner" id="JS_banner" style="height: 168px; display: block; overflow: hidden;">
  <div id="JS_banner_box_0_howom9wa" style="display: block;"><a id="JS_banner_link_0_howom9wa" href="<?php echo $this->_var['ad']['url']; ?>" title="<?php echo $this->_var['ad']['name']; ?>" target="_blank"><img id="JS_banner_img_0_howom9wa" src="<?php echo $this->_var['ad']['image']; ?>" height="168" width="1190"></a></div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div id="exprGroup" class="w clearfix">
  <div class="indexTitle" style="padding-bottom:5px;"> <span class="titleCN"><?php 
$k = array (
  'name' => 'area_name',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>体验店</span>  </div>
  <div class="speLine" style="border-left:1px solid #dcdcdc;border-right:1px solid #dcdcdc;"></div>
  <div id="JS_expr_resort_box" class="exprGroup clearfix">
  <?php if ($this->_var['suppliers']): ?>
  <?php $_from = $this->_var['suppliers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'supplier');$this->_foreach['suppliers'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['suppliers']['total'] > 0):
    foreach ($_from AS $this->_var['supplier']):
        $this->_foreach['suppliers']['iteration']++;
?>
    <div class="eList">
      <div class="header"><span></span><strong><a class="name" href="expr_show.php?id=<?php echo $this->_var['supplier']['suppliers_id']; ?>" target="_blank" title="<?php echo $this->_var['supplier']['suppliers_name']; ?>"><?php echo $this->_var['supplier']['suppliers_name']; ?></a></strong></div>
      <div class="body">
        <div class="imgBox"><a href="expr_show.php?id=<?php echo $this->_var['supplier']['suppliers_id']; ?>" target="_blank"><img src="<?php echo $this->_var['supplier']['logo']; ?>" width="100%" height="100%" alt="<?php echo $this->_var['supplier']['suppliers_name']; ?>" /></a> </div>
        <ul class="infoBox">
          <li class="clearfix"><span class="name">服务电话：</span><span class="txt" title="<?php echo $this->_var['supplier']['tel']; ?>"><?php echo $this->_var['supplier']['tel']; ?>&ensp;</span></li>
          <li class="clearfix"><span class="name">营业时间：</span><span class="txt"><?php echo $this->_var['supplier']['work_time']; ?></span></li>
          <li class="clearfix"><span class="name">体验店地址：</span><a title="<?php echo $this->_var['supplier']['address']; ?>" href="expr_show.php?id=<?php echo $this->_var['supplier']['suppliers_id']; ?>" target="_blank" class="txt"><?php echo $this->_var['supplier']['address']; ?></a></li>
        
        </ul>
      </div>
    </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php else: ?>
<div style="padding:30px; text-align:center; font-size:14px; ">
<?php 
$k = array (
  'name' => 'area_name',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>暂无体验店！
</div>
<?php endif; ?>	
  </div>
</div>
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>
<!--
LDZ:2013-11-27 16:42:23
-->
