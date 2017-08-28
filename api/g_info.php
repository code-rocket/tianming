<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;

$g_id=$_GET['g_id'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

<link rel="stylesheet" href="css/tab.css" />
</head>
<body>
<div class="nav_box_tab">
    <div id="tab">
        <h3 class="up" id="two1" onclick="setContentTab('two',1,2)">商品描述</h3>
              <div class="block" id="con_two_1">
                  <?php
					 $info=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$g_id);
					 echo $info['goods_desc'];
				  ?> 
                    <p style="text-align:center;"><img class="img_box" src="../mobile/themes/default/images/copyright.png"  width="153" height="60" /></p>
              </div>
        <h3 id="two2" onclick="setContentTab('two',2,2)">商品属性</h3>
        <div id="con_two_2" style="width:96%; padding:0 5px 10px 5px; margin-top:5px;">
                    <p style="text-align:center;"><img class="img_box" src="../mobile/themes/default/images/copyright.png" width="153" height="60"  /></p>
        </div>
    </div>
  <!-- <div class="po"><img src="img/pic.png" / width="153" height="60"></div>-->
</div>	
<script type="text/javascript">
function setContentTab(name, curr, n) {
    for (i = 1; i <= n; i++) {
        var menu = document.getElementById(name + i);
        var cont = document.getElementById("con_" + name + "_" + i);
        menu.className = i == curr ? "up" : "";
        if (i == curr) {
            cont.style.display = "block";
        } else {
            cont.style.display = "none";
        }
    }
}
</script>