
<div class="tab_body">
<?php if ($this->_var['notes']): ?>
    <table>
      <tbody>
        <tr>
          <th><?php echo $this->_var['lang']['username']; ?></th>
          <th><?php echo $this->_var['lang']['number']; ?></th>
          <th><?php echo $this->_var['lang']['bought_time']; ?></th>
          <th><?php echo $this->_var['lang']['order_status']; ?></th>
        </tr>
		<?php $_from = $this->_var['notes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'note');if (count($_from)):
    foreach ($_from AS $this->_var['note']):
?>
        <tr>
          <td><?php if ($this->_var['note']['user_name']): ?><?php echo htmlspecialchars($this->_var['note']['user_name']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?></td>
          <td><?php echo $this->_var['note']['goods_number']; ?></td>
          <td class="l"><?php echo $this->_var['note']['add_time']; ?></td>
          <td><?php if ($this->_var['note']['order_status']): ?><?php echo $this->_var['lang']['turnover']; ?><?php else: ?><?php echo $this->_var['lang']['is_cancel']; ?><?php endif; ?></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </tbody>
    </table>
    <div class="mt20 r page">
	<form name="selectPageForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <?php if ($this->_var['pager']['styleid'] == 0): ?>
        <div id="buy_pager">
          <?php echo $this->_var['lang']['pager_1']; ?><?php echo $this->_var['pager']['record_count']; ?><?php echo $this->_var['lang']['pager_2']; ?><?php echo $this->_var['lang']['pager_3']; ?><?php echo $this->_var['pager']['page_count']; ?><?php echo $this->_var['lang']['pager_4']; ?> <span> <a href="<?php echo $this->_var['pager']['page_first']; ?>"><?php echo $this->_var['lang']['page_first']; ?></a> <a href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a> <a href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a> <a href="<?php echo $this->_var['pager']['page_last']; ?>"><?php echo $this->_var['lang']['page_last']; ?></a> </span>
            <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_22789700_1477450466');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_22789700_1477450466']):
?>
            <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_22789700_1477450466']; ?>" />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
        <?php else: ?>

        
         <div id="buy_pager" class="pagebar">
          <span class="f_l f6" style="margin-right:10px;"><?php echo $this->_var['lang']['total']; ?> <b><?php echo $this->_var['pager']['record_count']; ?></b> <?php echo $this->_var['lang']['user_comment_num']; ?></span>
          <?php if ($this->_var['pager']['page_first']): ?><a href="<?php echo $this->_var['pager']['page_first']; ?>">1 ...</a><?php endif; ?>
          <?php if ($this->_var['pager']['page_prev']): ?><a class="prev" href="<?php echo $this->_var['pager']['page_prev']; ?>"><?php echo $this->_var['lang']['page_prev']; ?></a><?php endif; ?>
          <?php $_from = $this->_var['pager']['page_number']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_22823100_1477450466');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_22823100_1477450466']):
?>
                <?php if ($this->_var['pager']['page'] == $this->_var['key']): ?>
                <span class="page_now"><?php echo $this->_var['key']; ?></span>
                <?php else: ?>
                <a href="<?php echo $this->_var['item_0_22823100_1477450466']; ?>">[<?php echo $this->_var['key']; ?>]</a>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          <?php if ($this->_var['pager']['page_next']): ?><a class="next" href="<?php echo $this->_var['pager']['page_next']; ?>"><?php echo $this->_var['lang']['page_next']; ?></a><?php endif; ?>
          <?php if ($this->_var['pager']['page_last']): ?><a class="last" href="<?php echo $this->_var['pager']['page_last']; ?>">...<?php echo $this->_var['pager']['page_count']; ?></a><?php endif; ?>
          <?php if ($this->_var['pager']['page_kbd']): ?>
            <?php $_from = $this->_var['pager']['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item_0_22860600_1477450466');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item_0_22860600_1477450466']):
?>
            <input type="hidden" name="<?php echo $this->_var['key']; ?>" value="<?php echo $this->_var['item_0_22860600_1477450466']; ?>" />
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <kbd style="float:left; margin-left:8px; position:relative; bottom:3px;"><input type="text" name="page" onkeydown="if(event.keyCode==13)selectPage(this)" size="3" class="B_blue" /></kbd>
            <?php endif; ?>
        </div>
        

        <?php endif; ?>
        </form>
        <script type="Text/Javascript" language="JavaScript">
        <!--
        
        function selectPage(sel)
        {
          sel.form.submit();
        }
        
        //-->
        </script>
	</div>
	  
	 <?php else: ?>
  <div class="c gray">暂无购买记录。</div>
  <?php endif; ?> 
  </div>
   <script type="Text/Javascript" language="JavaScript">
		function gotoBuyPage(page, id)
		{
		  $.ajax({
					type:"GET",
					url:"goods.php?act=gotopage",
					cache:false,
					dataType:'json',     //接受数据格式
					data:'page=' + page + '&id=' + id,
					success:gotoBuyPageResponse
				});
		}
		
		function gotoBuyPageResponse(result)
		{
		  document.getElementById("ECS_BOUGHT").innerHTML = result.result;
		}
        <!--
        
        function selectPage(sel)
        {
          sel.form.submit();
        }
        
        //-->

        </script>