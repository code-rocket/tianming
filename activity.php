<?php

/**
 * ECSHOP 活动列表
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: activity.php 17217 2011-01-19 06:29:08Z liubo $
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require_once(ROOT_PATH . 'includes/lib_order.php');
include_once(ROOT_PATH . 'includes/lib_transaction.php');

/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/shopping_flow.php');
require_once(ROOT_PATH . 'languages/' . $_CFG['lang'] . '/user.php');

/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

//echo "<pre>";
//print_r(t_diy());


assign_template();
assign_dynamic('activity');
$position = assign_ur_here(0, $_LANG['shopping_activity']);
$smarty->assign('page_title', $position['title']);    // 页面标题
$smarty->assign('ur_here', $position['ur_here']);  // 当前位置


// 数据准备

/* 取得用户等级 */
$user_rank_list = array();
$user_rank_list[0] = $_LANG['not_user'];
$sql = "SELECT rank_id, rank_name FROM " . $ecs->table('user_rank');
$res = $db->query($sql);
while ($row = $db->fetchRow($res)) {
    $user_rank_list[$row['rank_id']] = $row['rank_name'];
}


// 开始工作

$sql = "SELECT * FROM " . $ecs->table('favourable_activity') . " ORDER BY `sort_order` ASC,`end_time` DESC";
$res = $db->query($sql);

$list = array();
while ($row = $db->fetchRow($res)) {
    $row['start_time'] = local_date('Y-m-d H:i', $row['start_time']);
    $row['end_time'] = local_date('Y-m-d H:i', $row['end_time']);

    //享受优惠会员等级
    $user_rank = explode(',', $row['user_rank']);
    $row['user_rank'] = array();
    foreach ($user_rank as $val) {
        if (isset($user_rank_list[$val])) {
            $row['user_rank'][] = $user_rank_list[$val];
        }
    }

    //优惠范围类型、内容
    if ($row['act_range'] != FAR_ALL && !empty($row['act_range_ext'])) {
        if ($row['act_range'] == FAR_CATEGORY) {
            $row['act_range'] = $_LANG['far_category'];
            $row['program'] = 'category.php?id=';
            $sql = "SELECT cat_id AS id, cat_name AS name FROM " . $ecs->table('category') .
                " WHERE cat_id " . db_create_in($row['act_range_ext']);
        } elseif ($row['act_range'] == FAR_BRAND) {
            $row['act_range'] = $_LANG['far_brand'];
            $row['program'] = 'brand.php?id=';
            $sql = "SELECT brand_id AS id, brand_name AS name FROM " . $ecs->table('brand') .
                " WHERE brand_id " . db_create_in($row['act_range_ext']);
        } else {
            $row['act_range'] = $_LANG['far_goods'];
            $row['program'] = 'goods.php?id=';
            $sql = "SELECT goods_id AS id, goods_name AS name FROM " . $ecs->table('goods') .
                " WHERE goods_id " . db_create_in($row['act_range_ext']);
        }
        $act_range_ext = $db->getAll($sql);
        $row['act_range_ext'] = $act_range_ext;
    } else {
        $row['act_range'] = $_LANG['far_all'];
    }

    //优惠方式

    switch ($row['act_type']) {
        case 0:
            $row['act_type'] = $_LANG['fat_goods'];
            $row['gift'] = unserialize($row['gift']);
            if (is_array($row['gift'])) {
                foreach ($row['gift'] as $k => $v) {
                    $row['gift'][$k]['thumb'] = get_image_path($v['id'], $db->getOne("SELECT goods_thumb FROM " . $ecs->table('goods') . " WHERE goods_id = '" . $v['id'] . "'"), true);
                }
            }
            break;
        case 1:
            $row['act_type'] = $_LANG['fat_price'];
            $row['act_type_ext'] .= $_LANG['unit_yuan'];
            $row['gift'] = array();
            break;
        case 2:
            $row['act_type'] = $_LANG['fat_discount'];
            $row['act_type_ext'] .= "%";
            $row['gift'] = array();
            break;
    }

    $list[] = $row;
}

//print_r($list);
$smarty->assign('list', $list);

$smarty->assign('helps', get_shop_help());       // 网店帮助
$smarty->assign('lang', $_LANG);

$smarty->assign('feed_url', ($_CFG['rewrite'] == 1) ? "feed-typeactivity.xml" : 'feed.php?type=activity'); // RSS URL

$smarty->assign('zuhe_t', get_zuhe());

$smarty->assign('zuhe_allprice', get_zuhe_allprice());//价格

$diy_kuangs = $GLOBALS['db']->getAll("SELECT distinct gd.diy_goods_id,gd.price,g.goods_name,g.goods_thumb FROM " . $GLOBALS['ecs']->table('goods_diy') . " as gd, " . $GLOBALS['ecs']->table('goods') . " as g where type=134 and gd.diy_goods_id=g.goods_id");
foreach ($diy_kuangs as $key => $diy_kuang) {
    $diy_kuangs[$key]["colors"] = $GLOBALS['db']->getAll("SELECT col_id,color,color_name,img FROM " . $GLOBALS['ecs']->table('goods_color') . " where goods_id=" . $diy_kuang["diy_goods_id"]);
    $diy_kuangs[$key]["colors_json"]=json_encode($diy_kuangs[$key]["colors"]);
}

$smarty->assign('diys_kuang', $diy_kuangs);//镜框

$smarty->assign('jk', jk());//镜框加载

$smarty->display('activity.dwt');


function get_zuhe()
{
    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('goods_activity') .
        " WHERE act_type=4";
    $row = $GLOBALS['db']->getAll($sql);


    $info = array();
    foreach ($row as $key => $val) {
        $ids = $val['act_id'];
        $mb[$ids] = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('package_goods') .
            " where package_id='" . $val['act_id'] . "'");

        foreach ($mb[$ids] as $key1 => $val1) {
            $info[$key][$key1] = $GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') .
                " where goods_id='" . $val1['goods_id'] . "'");
        }

    }
    return $info;

}


function get_zuhe_allprice()
{
    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('goods_activity') .
        " WHERE act_type=4";
    $res = $GLOBALS['db']->getAll($sql);


    foreach ($res as $tempkey => $value) {
        $subtotal = 0;
        $row = unserialize($value['ext_info']);
        unset($value['ext_info']);
        if ($row) {
            foreach ($row as $key => $val) {
                $res[$tempkey][$key] = $val;
            }
        }

        $sql = "SELECT pg.package_id, pg.goods_id, pg.goods_number, pg.admin_id, p.goods_attr, g.goods_sn, g.goods_name, g.market_price, g.goods_thumb, IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS rank_price
                FROM " . $GLOBALS['ecs']->table('package_goods') . " AS pg
                    LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g
                        ON g.goods_id = pg.goods_id
                    LEFT JOIN " . $GLOBALS['ecs']->table('products') . " AS p
                        ON p.product_id = pg.product_id
                    LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp
                        ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]'
                WHERE pg.package_id = " . $value['act_id'] . "
                ORDER BY pg.package_id, pg.goods_id";

        $goods_res = $GLOBALS['db']->getAll($sql);

        foreach ($goods_res as $key => $val) {
            $goods_id_array[] = $val['goods_id'];
            $goods_res[$key]['goods_thumb'] = get_image_path($val['goods_id'], $val['goods_thumb'], true);
            $goods_res[$key]['market_price'] = price_format($val['market_price']);
            $goods_res[$key]['rank_price'] = price_format($val['rank_price']);
            $subtotal += $val['rank_price'] * $val['goods_number'];
        }

        /* 取商品属性 */
        $sql = "SELECT ga.goods_attr_id, ga.attr_value
                FROM " . $GLOBALS['ecs']->table('goods_attr') . " AS ga, " . $GLOBALS['ecs']->table('attribute') . " AS a
                WHERE a.attr_id = ga.attr_id
                AND a.attr_type = 1
                AND " . db_create_in($goods_id_array, 'goods_id');
        $result_goods_attr = $GLOBALS['db']->getAll($sql);

        $_goods_attr = array();
        foreach ($result_goods_attr as $value) {
            $_goods_attr[$value['goods_attr_id']] = $value['attr_value'];
        }

        /* 处理货品 */
        $format = '[%s]';
        foreach ($goods_res as $key => $val) {
            if ($val['goods_attr'] != '') {
                $goods_attr_array = explode('|', $val['goods_attr']);

                $goods_attr = array();
                foreach ($goods_attr_array as $_attr) {
                    $goods_attr[] = $_goods_attr[$_attr];
                }

                $goods_res[$key]['goods_attr_str'] = sprintf($format, implode('，', $goods_attr));
            }
        }

        $res[$tempkey]['goods_list'] = $goods_res;
        $res[$tempkey]['subtotal'] = price_format($subtotal);
        $res[$tempkey]['saving'] = price_format(($subtotal - $res[$tempkey]['package_price']));
        $res[$tempkey]['package_price'] = price_format($res[$tempkey]['package_price']);
    }


    return $res;

}

//镜腿
function t_diys_kuang1()
{
    $row = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') . " where parent_id=131");
    $info = array();
    foreach ($row as $key => $val) {
        if ($key == 0) {

            $c_id .= $val['cat_id'];
        }
        if ($key > 0) {
            $c_id .= "," . $val['cat_id'];
        }

    }
    $info = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods') . " where cat_id in(" . $c_id . ")");
    return $info;
}


//镜片
function t_diys_kuang2()
{
    $row = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') . " where parent_id=45");
    $info = array();
    foreach ($row as $key => $val) {
        if ($key == 0) {

            $c_id .= $val['cat_id'];
        }
        if ($key > 0) {
            $c_id .= "," . $val['cat_id'];
        }

    }
    $info = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods') . " where cat_id in(" . $c_id . ")");
    return $info;
}


function t_diy()
{
    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('group_goods') .
        "";
    $row = $GLOBALS['db']->getAll($sql);
    $info = array();
    $info1 = array();
    foreach ($row as $key => $val) {
        $mb = $GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') . "  where goods_id=" . $val['parent_id'] . "");

        $info[$key]['goods_name'] = $mb['goods_name'];
        $info[$key]['parent_id'] = $mb['goods_id'];
        $info[$key]['goods_id'] = $val['goods_id'];
        $info[$key]['goods_price'] = $val['goods_price'];
    }


    return $info;

}

//镜框显示


function jk()
{
    $row = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') . " where parent_id=134");
    $info = array();
    foreach ($row as $key => $val) {
        if ($key == 0) {

            $c_id .= $val['cat_id'];
        }
        if ($key > 0) {
            $c_id .= "," . $val['cat_id'];
        }

    }

    $m_info = array();

    $info = $GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') . " where cat_id in(" . $c_id . ")");

    $infos = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') . " where goods_id =(" . $info['goods_id'] . ")");
    $m_info[] = array('goods_id' => $info['goods_id'], 'goods_thumb' => $info['goods_thumb'], 'goods_name' => $info['goods_name'], 'shop_price' => $info['shop_price'], 'color' => $infos);

    return $m_info;
}


//镜腿显示


function jk1()
{
    $row = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') . " where parent_id=131");
    $info = array();
    foreach ($row as $key => $val) {
        if ($key == 0) {

            $c_id .= $val['cat_id'];
        }
        if ($key > 0) {
            $c_id .= "," . $val['cat_id'];
        }

    }

    $m_info = array();

    $info = $GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') . " where cat_id in(" . $c_id . ")");

    $infos = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') . " where goods_id =(" . $info['goods_id'] . ")");
    $m_info[] = array('goods_id' => $info['goods_id'], 'goods_thumb' => $info['goods_thumb'], 'goods_name' => $info['goods_name'], 'shop_price' => $info['shop_price'], 'color' => $infos);

    return $m_info;
}


//镜片显示


function jk2()
{
    $row = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('category') . " where parent_id=45");
    $info = array();
    foreach ($row as $key => $val) {
        if ($key == 0) {

            $c_id .= $val['cat_id'];
        }
        if ($key > 0) {
            $c_id .= "," . $val['cat_id'];
        }

    }

    $m_info = array();

    $info = $GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') . " where cat_id in(" . $c_id . ")");

    $infos = $GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_color') . " where goods_id =(" . $info['goods_id'] . ")");
    $m_info[] = array('goods_id' => $info['goods_id'], 'goods_thumb' => $info['goods_thumb'], 'goods_name' => $info['goods_name'], 'shop_price' => $info['shop_price'], 'color' => $infos);

    return $info;
}
