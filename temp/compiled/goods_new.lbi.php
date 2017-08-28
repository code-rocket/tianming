
<div class="comment mt10">
      <div class="title_1"><span class="icon"></span><span class="zh">本月新品</span></div>
      <?php $_from = get_cat_new_goods_10(0); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_item_0_68195400_1477380988');$this->_foreach['best_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['best_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods_item_0_68195400_1477380988']):
        $this->_foreach['best_goods']['iteration']++;
?>
      <div class="list clearfix <?php if ($this->_foreach['best_goods']['iteration'] == 1): ?>first<?php endif; ?><?php if (($this->_foreach['best_goods']['iteration'] == $this->_foreach['best_goods']['total'])): ?>last<?php endif; ?>">
        <div class="Left"><a href="<?php echo $this->_var['goods_item_0_68195400_1477380988']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item_0_68195400_1477380988']['name']); ?>" target="_blank"><img width="96" height="64" src="<?php echo $this->_var['goods_item_0_68195400_1477380988']['thumb']; ?>"  alt="<?php echo htmlspecialchars($this->_var['goods_item_0_68195400_1477380988']['name']); ?>" /></a></div>
        <div class="Right"> <a href="<?php echo $this->_var['goods_item_0_68195400_1477380988']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods_item_0_68195400_1477380988']['name']); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods_item_0_68195400_1477380988']['short_name']); ?></a>
          <p class="gray">本站价：<span class="red yen"></span><span class="red JS_show_price_ajax" data-goods_id=""><?php if ($this->_var['goods_item_0_68195400_1477380988']['promote_price'] != ""): ?><?php echo $this->_var['goods_item_0_68195400_1477380988']['promote_price']; ?><?php else: ?><?php echo $this->_var['goods_item_0_68195400_1477380988']['shop_price']; ?><?php endif; ?></span></p>
        </div>
      </div>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
    </div>