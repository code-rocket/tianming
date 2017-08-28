<?php
define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');

include_once(dirname(__FILE__) . '/includes/cls_captcha.php');

require_once(ROOT_PATH . '/includes/cls_json.php');
$json = new JSON;


$is_mobile = $_POST['is_mobile'];
$diy_config_str = $_POST['diy_config'];
$diy_config_str = str_replace("\\", "", $diy_config_str);
$diy_config = json_decode($diy_config_str, true);
$diy_goods_id_kuang = $diy_config["jingkuang_id"];
$diy_goods_id_tui = $diy_config["jingtui_id"];
$diy_goods_id_pian = $diy_config["jingpian_id"];

$act = $_POST['act'];
$type = $_POST['type'];
if ($act == "getdiys") {
    if ($type > 3) {
        echo "";
        exit;
    }
//找到使用这个的所有商品
    $goodsIds = array();
    if ($type == 1) {
        $type = 134; //kuang
        echo "";
        exit;
    } else if ($type == 2) {
        $type = 131; //tui
        $goodses_kuang = $GLOBALS['db']->getAll("SELECT distinct goods_id FROM " . $GLOBALS['ecs']->table('goods_diy') . " where diy_goods_id=" . $diy_goods_id_kuang . " and type = 134");
        foreach ($goodses_kuang as $goods_kuang) {
            $goodsIds[] = $goods_kuang["goods_id"];
        }
    } else if ($type == 3) {
        $type = 45; //pian
        $goodses_kuang = $GLOBALS['db']->getAll("SELECT distinct goods_id FROM " . $GLOBALS['ecs']->table('goods_diy') . " where diy_goods_id=" . $diy_goods_id_kuang . " and type = 134");
        $tempids = array();
        foreach ($goodses_kuang as $goods_kuang) {
            $tempids[] = $goods_kuang["goods_id"];
        }
        if (count($tempids) > 0) {
            $goodses_tui = $GLOBALS['db']->getAll("SELECT distinct goods_id FROM " . $GLOBALS['ecs']->table('goods_diy') . " where diy_goods_id=" . $diy_goods_id_tui . " and goods_id in (" . implode(",", $tempids) . ") and type = 131");
            if ($goodses_tui) {
                $tempids = array();
                foreach ($goodses_tui as $goods_tui) {
                    $goodsIds[] = $goods_tui["goods_id"];
                }
            } else {
                echo "";
            }
        } else {
            echo "";
        }
    }

    $diys = $GLOBALS['db']->getAll("SELECT distinct gd.diy_goods_id,gd.price,g.goods_name,g.goods_thumb FROM " . $GLOBALS['ecs']->table('goods_diy') . " as gd, " . $GLOBALS['ecs']->table('goods') . " as g where type=" . $type . " and gd.goods_id in (" . implode(",", $goodsIds) . ") and gd.diy_goods_id=g.goods_id");
    if ($diys) {
        foreach ($diys as $key => $diy) {
            $diys[$key]["colors"] = $GLOBALS['db']->getAll("SELECT col_id,color,color_name,img FROM " . $GLOBALS['ecs']->table('goods_color') . " where goods_id=" . $diy["diy_goods_id"]);
            if(empty($is_mobile))
			{
		   	    $diys[$key]["colors_json"] = json_encode($diys[$key]["colors"]);
			}
			else
			{
				
				$diys[$key]["colors_json"] = $diys[$key]["colors"];

			}
        }
		
		if(empty($is_mobile))
		{
           echo json_encode($diys);
		}
		else
		{
			$diy= new Diy;
			$diyobj2->value=$diys;
			$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$diys);
			echo $json->encode($results);
		}
    } else {
        echo "";
    }
} else if ($act == "getgoods") {
    $goodses_kuang = $GLOBALS['db']->getAll("SELECT distinct goods_id FROM " . $GLOBALS['ecs']->table('goods_diy') . " where diy_goods_id=" . $diy_goods_id_kuang . " and type = 134");
    $tempids = array();
    foreach ($goodses_kuang as $goods_kuang) {
        $tempids[] = $goods_kuang["goods_id"];
    }
    if (count($tempids) > 0) {
        $goodses_tui = $GLOBALS['db']->getAll("SELECT distinct goods_id FROM " . $GLOBALS['ecs']->table('goods_diy') . " where diy_goods_id=" . $diy_goods_id_tui . " and goods_id in (" . implode(",", $tempids) . ") and type = 131");
        if ($goodses_tui) {
            $tempids = array();
            foreach ($goodses_tui as $goods_tui) {
                $tempids[] = $goods_tui["goods_id"];
            }
            $goodsids = $GLOBALS['db']->getAll("SELECT distinct goods_id FROM " . $GLOBALS['ecs']->table('goods_diy') . " where diy_goods_id=" . $diy_goods_id_pian . " and goods_id in (" . implode(",", $tempids) . ") and type = 45");
            if ($goodsids) {
                $goods = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods') . " where goods_id = " . $goodsids[0]["goods_id"]);
                if ($goods) {
					
					if(empty($is_mobile))
		              {
                         echo json_encode($goods[0]);
		              }
					  else
					  {
						   $diy= new Diy;
			               $diyobj->value=$goods[0];
						   
						   $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$goods[0]);
		                
						   
						   echo $json->encode($results);
					  }
					
                    
                } else {
                    echo "";
                }
            }
        } else {
            echo "";
        }
    } else {
        echo "";
    }
	
}



class Diy
{
    public $value;
}



?>
