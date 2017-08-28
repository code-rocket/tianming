<?php

/**
 * ECSHOP 首页文件
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: index.php 17217 2011-01-19 06:29:08Z liubo $
*/




define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
      
include_once(dirname(__FILE__) .  '/includes/cls_captcha.php'); 


if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = false;
}

$ipInfos = GetIpLookup($_SERVER['REMOTE_ADDR']);

error_reporting( 0 );
//echo $ipInfos['city'];

//echo "<pre>";
//print_r(get_ip_citys());

/* 获得指定的分类ID */
if (!empty($_GET['ct_id']))
{
    $ct_id = intval($_GET['ct_id']);
	$_SESSION['region_id']=$ct_id;
}
else
{
	/*if(!empty($_SESSION['region_id']))
	{
    	$ct_id = $_SESSION['region_id'];
	}*/
	/*unset($_SESSION['region_id']);
	unset($_SESSION['region_name']);
	unset($_SESSION['pin_yin']);*/

}
/*
print_r($_SESSION);*/


//区域
if (isset($_REQUEST['ct_id']))
{
	    $region_id = intval($_REQUEST['ct_id']);
		

		if(empty($region))
		{
			$region=$_SESSION['region_id'];
		}
        $sql = 'SELECT * FROM ' . $ecs->table("region") . ' WHERE region_id = '.$region_id;
        $region = $db->getRow($sql, true);
        $smarty->assign('region_id', $region['region_id']);
		$smarty->assign('region_name', $region['region_name']);
		
		$_SESSION['region_id'] = $region['region_id'];
		$_SESSION['region_name'] = $region['region_name'];
		$_SESSION['pin_yin'] = $region['pin_yin'];
		
		

}
/*echo "<pre>";
print_r($_SESSION);die;
*/
/*------------------------------------------------------ */
//-- Shopex系统地址转换
/*------------------------------------------------------ */
if (!empty($_GET['gOo']))
{
    if (!empty($_GET['gcat']))
    {
        /* 商品分类。*/
        $Loaction = 'category.php?id=' . $_GET['gcat'];
    }
    elseif (!empty($_GET['acat']))
    {
        /* 文章分类。*/
        $Loaction = 'article_cat.php?id=' . $_GET['acat'];
    }
    elseif (!empty($_GET['goodsid']))
    {
        /* 商品详情。*/
        $Loaction = 'goods.php?id=' . $_GET['goodsid'];
    }
    elseif (!empty($_GET['articleid']))
    {
        /* 文章详情。*/
        $Loaction = 'article.php?id=' . $_GET['articleid'];
    }

    if (!empty($Loaction))
    {
        ecs_header("Location: $Loaction\n");

        exit;
    }
}

if ($_REQUEST['url'] == null && $_REQUEST['url'] != 'china')
{
	if ($_SESSION['pin_yin'] && $_SESSION['pin_yin'] != 'china')
	{
		$_REQUEST['url'] = $_SESSION['pin_yin'];
	}
}

if ($_REQUEST['url'] == 'mobile')
{
	 ecs_header("Location: mobile/index.php\n");

     exit;
}

//区域
if (isset($_REQUEST['url']))
{ 
     /*if ($_REQUEST['url'] == 'china')
	 {
	 	$_SESSION['region_id'] = 0;
		$_SESSION['region_name'] = '全国站';
		$_SESSION['pin_yin'] = 'china';
		
		$supplier_best_goods = get_cat_best_goods_3(0);
		$smarty->assign('supplier_best_goods',    $supplier_best_goods);
	 
	 }
	 else
	 {
        
        $sql = 'SELECT region_id FROM ' . $ecs->table("region") . ' WHERE pin_yin = \''.$_REQUEST['url'].'\'';
        $region = $db->getRow($sql, true);
		
	    $region_id = $region['region_id'];
        $sql = 'SELECT region_id, region_name,pin_yin FROM ' . $ecs->table("region") . ' WHERE region_id = '.$region_id;
        $region = $db->getRow($sql, true);
        $smarty->assign('region_id', $region['region_id']);
		$smarty->assign('region_name', $region['region_name']);
		
		$_SESSION['region_id'] = $region['region_id'];
		$_SESSION['region_name'] = $region['region_name'];
		$_SESSION['pin_yin'] = $region['pin_yin'];
		
		$sql = 'select * from ' . $GLOBALS['ecs']->table('suppliers') . ' where city = ' . $region_id;		
	    $regions = $GLOBALS['db']->getall($sql);
		$smarty->assign('regions',    $regions);
		$smarty->assign('regions_count',    count($regions));*/
		
		
		$region_id = intval($_REQUEST['ct_id']);
		
		$supplier_best_goods = get_recommend_goods_by_suppliers_id('best', 0, $region_id);
		if (!$supplier_best_goods)
		{
			$supplier_best_goods = get_cat_best_goods_3(0);
		}
		$smarty->assign('supplier_best_goods',    $supplier_best_goods);
		
	/*}*/	
}
else
{
       /* $_SESSION['region_id'] = 0;
		$_SESSION['region_name'] = '全国站';
		$_SESSION['pin_yin'] = 'china';*/
		
		$supplier_best_goods = get_cat_best_goods_3(0);
		$smarty->assign('supplier_best_goods',    $supplier_best_goods);
}

function get_recommend_goods_by_suppliers_id($type = '', $cat_id = 0, $region_id = 0)
{
    $brand_where = ($region_id > 0) ? ' AND g.suppliers_id in (select suppliers_id from ' . $GLOBALS['ecs']->table('suppliers') . ' where city = ' . $region_id.') ' : '';

    $price_where = ($min > 0) ? " AND g.shop_price >= $min " : '';
    $price_where .= ($max > 0) ? " AND g.shop_price <= $max " : '';

    $sql =  'SELECT g.goods_id, g.goods_name, g.goods_name_style,g.goods_sn,  g.market_price, g.shop_price AS org_price, g.promote_price,g.seller_note, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
				'(select AVG(r.comment_rank) from ' . $GLOBALS['ecs']->table('comment') . ' as r where r.id_value = g.goods_id AND r.comment_type = 0 AND r.parent_id = 0 AND r.status = 1) AS comment_rank, ' .
					
					'(select IFNULL(sum(og.goods_number), 0) from ' . $GLOBALS['ecs']->table('order_goods') . ' as og where og.goods_id = g.goods_id) AS sell_number, ' .
                'promote_start_date, promote_end_date, g.goods_brief, g.goods_thumb, goods_img, b.brand_name,b.brand_id,b.brand_logo ' .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('brand') . ' AS b ON b.brand_id = g.brand_id ' .
            "LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
            'WHERE g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ' . $brand_where . $price_where . $ext;
    $num = 0;
    $type2lib = array('best'=>'recommend_best', 'new'=>'recommend_new', 'hot'=>'recommend_hot', 'promote'=>'recommend_promotion');
    if($cat_num==0)
		$num = get_library_number($type2lib[$type]);
	else
		$num = $cat_num;

    switch ($type)
    {
        case 'best':
            $sql .= ' AND is_best = 1';
            break;
        case 'new':
            $sql .= ' AND is_new = 1';
            break;
        case 'hot':
            $sql .= ' AND is_hot = 1';
            break;
        case 'promote':
            $time = gmtime();
            $sql .= " AND is_promote = 1 AND promote_start_date <= '$time' AND promote_end_date >= '$time'";
            break;
    }

    $cats = get_children($cat_id);
    if (!empty($cats))
    {
        $sql .= " AND (" . $cats . " OR " . get_extension_goods($cats) .")";
    }

    $order_type = $GLOBALS['_CFG']['recommend_order'];
    $sql .= ($order_type == 0) ? ' ORDER BY g.sort_order, g.last_update DESC' : ' ORDER BY RAND()';
	
    $res = $GLOBALS['db']->selectLimit($sql, $num);

    $idx = 0;
	$index = 1;
    $goods = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        if ($row['promote_price'] > 0)
        {
            $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
            $goods[$idx]['promote_price'] = $promote_price > 0 ? price_format($promote_price) : '';
			$goods[$idx]['promote_price2'] = $promote_price;
			$goods[$idx]['saving']   = $row['market_price'] - $promote_price;
        }
        else
        {
            $goods[$idx]['promote_price'] = '';
        }
        $index++;
        $goods[$idx]['i']           = $index;
		
		
		
		
        $goods[$idx]['id']           = $row['goods_id'];
        $goods[$idx]['name']         = $row['goods_name'];
		$goods[$idx]['goods_sn']         = $row['goods_sn'];
		$goods[$idx]['comment_rank']     = $row['comment_rank'];
		$goods[$idx]['sell_number']      = $row['sell_number'];
		$goods[$idx]['seller_note']      = $row['seller_note'];
		$goods[$idx]['is_new']           = $row['is_new'];
        $goods[$idx]['brief']        = $row['goods_brief'];
        $goods[$idx]['brand_name']   = $row['brand_name'];
		$goods[$idx]['brand_id']   = $row['brand_id'];
		$goods[$idx]['brand_logo']   = $row['brand_logo'];
        $goods[$idx]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                       sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['market_price'] = price_format($row['market_price']);
        $goods[$idx]['shop_price']   = price_format($row['shop_price']);
        $goods[$idx]['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $goods[$idx]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        $goods[$idx]['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
		
		$goods[$idx]['promote_limit_time'] = $row['promote_end_date'] - $row['promote_start_date'];
		$goods[$idx]['promote_end_date']    = local_date('m/d/Y H:i:s', $row['promote_end_date']);
		$goods[$idx]['promote_end_date2']    = $row['promote_end_date'];
		
		$market_price = $row['market_price'];
		$promote_price = $goods[$idx]['promote_price2'];
		$shop_price = $row['shop_price'];
		$goods[$idx]['saving']    = $market_price - $promote_price;
	    $goods[$idx]['save_rate'] = $market_price ? round(($promote_price/ $market_price), 2)*10 : 0;
	    $goods[$idx]['save_rate2'] = $market_price ? round(($shop_price/ $market_price), 2)*10 : 0;

        $goods[$idx]['short_style_name'] = add_style($goods[$idx]['short_name'], $row['goods_name_style']);
        $idx++;
    }

    return $goods;
}


//判断是否有ajax请求
$act = !empty($_GET['act']) ? $_GET['act'] : '';
if ($act == 'cat_rec')
{
    $rec_array = array(1 => 'best', 2 => 'new', 3 => 'hot');
    $rec_type = !empty($_REQUEST['rec_type']) ? intval($_REQUEST['rec_type']) : '1';
    $cat_id = !empty($_REQUEST['cid']) ? intval($_REQUEST['cid']) : '0';
    include_once('includes/cls_json.php');
    $json = new JSON;
    $result   = array('error' => 0, 'content' => '', 'type' => $rec_type, 'cat_id' => $cat_id);

    $children = get_children($cat_id);
    $smarty->assign($rec_array[$rec_type] . '_goods',      get_category_recommend_goods($rec_array[$rec_type], $children));    // 推荐商品
    $smarty->assign('cat_rec_sign', 1);
    $result['content'] = $smarty->fetch('library/recommend_' . $rec_array[$rec_type] . '.lbi');
    die($json->encode($result));
}

/*------------------------------------------------------ */
//-- 判断是否存在缓存，如果存在则调用缓存，反之读取相应内容
/*------------------------------------------------------ */
/* 缓存编号 */
$cache_id = sprintf('%X', crc32($_SESSION['user_rank'] . '-' . $_CFG['lang']));


/**
 * 首页优惠券列表
 * @access  public
 * @return  array
 */
function get_index_bonus( $limit=0 ){
	/* 获得所有is_index_ticket的红包类型  */
	$limit = $limit > 0 ? " LIMIT {$limit} " : '';
	$sql = "SELECT * FROM " . $GLOBALS['ecs']->table('bonus_type') . " WHERE is_index_ticket = 1 {$limit} ";
	$list = $GLOBALS['db']->getAll($sql);

	// 格式化时间
	if( !empty($list ) ){

		foreach ( $list  as & $item ) {
			$item['send_start_date'] = date('Y-m-d',$item['send_start_date']);
			$item['send_end_date']   = date('Y-m-d',$item['send_end_date']);
		}
	}
	return $list;
}

if (!$smarty->is_cached('index.dwt', $cache_id))
{
    assign_template();

    $position = assign_ur_here();
    $smarty->assign('page_title',      $position['title']);    // 页面标题
    $smarty->assign('ur_here',         $position['ur_here']);  // 当前位置

    /* meta information */
    $smarty->assign('keywords',        htmlspecialchars($_CFG['shop_keywords']));
    $smarty->assign('description',     htmlspecialchars($_CFG['shop_desc']));
    $smarty->assign('flash_theme',     $_CFG['flash_theme']);  // Flash轮播图片模板

    $smarty->assign('feed_url',        ($_CFG['rewrite'] == 1) ? 'feed.xml' : 'feed.php'); // RSS URL

    $smarty->assign('categories',      get_categories_tree()); // 分类树
    $smarty->assign('helps',           get_shop_help());       // 网店帮助
    $smarty->assign('top_goods',       get_top10());           // 销售排行


    $smarty->assign('indexBonus',       get_index_bonus() );   // 首页优惠券列表
    $smarty->assign('SITE_URL',         SITE_URL );   // 站点url

	
	$smarty->assign('tt_session',      $_SESSION['region_id']);           // 判断SESSION弹出窗
	
	
	//echo "<pre>";
	//print_r($_SESSION);
	    

     //print_r(get_category_recommend_goods('hot'));

    $smarty->assign('best_goods',      get_recommend_goods('best'));    // 推荐商品
    $smarty->assign('new_goods',       get_recommend_goods('new'));     // 最新商品
    $smarty->assign('hot_goods',       get_recommend_goods('hot'));     // 热点文章
    $smarty->assign('promotion_goods', get_promote_goods()); // 特价商品
    $smarty->assign('brand_list',      get_brands());
    $smarty->assign('promotion_info',  get_promotion_info()); // 增加一个动态显示所有促销信息的标签栏

    $smarty->assign('invoice_list',    index_get_invoice_query());  // 发货查询
    $smarty->assign('new_articles',    index_get_new_articles());   // 最新文章
    $smarty->assign('group_buy_goods', index_get_group_buy());      // 团购商品
    $smarty->assign('auction_list',    index_get_auction());        // 拍卖活动
	
	$smarty->assign('city_info1',       index_get_city1());           // 所有城市
	$smarty->assign('city_info',       index_get_city());           // 所有城市
	$smarty->assign('suppliers_info',  index_get_suppliers());           // 体验店信息
	$smarty->assign('suppliers_num',  index_get_suppliers_num());           // 体验店信息
	
	
    $smarty->assign('shop_notice',     $_CFG['shop_notice']);       // 商店公告
	
	$smarty->assign('now_city',       index_get_city_ip($ipInfos['city']));       // 城市
	
	$smarty->assign('hot_city',       get_hotcity_top());       // 热门城市
	
	
	$smarty->assign('hot_city_pai',       get_ip_citys());       // 热门城市
	
	
	

     


    /* 首页主广告设置 */
    $smarty->assign('index_ad',     $_CFG['index_ad']);
    if ($_CFG['index_ad'] == 'cus')
    {
        $sql = 'SELECT ad_type, content, url FROM ' . $ecs->table("ad_custom") . ' WHERE ad_status = 1';
        $ad = $db->getRow($sql, true);
        $smarty->assign('ad', $ad);
        print_r($ad);
    }
    /* links */
 $links = index_get_links();
    $smarty->assign('img_links',       $links['img']);
    $smarty->assign('txt_links',       $links['txt']);
    $smarty->assign('data_dir',        DATA_DIR);       // 数据目录

    /* 首页推荐分类 */
    $cat_recommend_res = $db->getAll("SELECT c.cat_id, c.cat_name, cr.recommend_type FROM " . $ecs->table("cat_recommend") . " AS cr INNER JOIN " . $ecs->table("category") . " AS c ON cr.cat_id=c.cat_id");
    if (!empty($cat_recommend_res))
    {
        $cat_rec_array = array();
        foreach($cat_recommend_res as $cat_recommend_data)
        {
            $cat_rec[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
        }
        $smarty->assign('cat_rec', $cat_rec);
    }

    /* 页面中的动态内容 */
    assign_dynamic('index');
}

$smarty->display('index.dwt', $cache_id);

/*------------------------------------------------------ */
//-- PRIVATE FUNCTIONS
/*------------------------------------------------------ */

/**
 * 调用发货单查询
 *
 * @access  private
 * @return  array
 */
function index_get_invoice_query()
{
    $sql = 'SELECT o.order_sn, o.invoice_no, s.shipping_code FROM ' . $GLOBALS['ecs']->table('order_info') . ' AS o' .
            ' LEFT JOIN ' . $GLOBALS['ecs']->table('shipping') . ' AS s ON s.shipping_id = o.shipping_id' .
            " WHERE invoice_no > '' AND shipping_status = " . SS_SHIPPED .
            ' ORDER BY shipping_time DESC LIMIT 10';
    $all = $GLOBALS['db']->getAll($sql);

    foreach ($all AS $key => $row)
    {
        $plugin = ROOT_PATH . 'includes/modules/shipping/' . $row['shipping_code'] . '.php';

        if (file_exists($plugin))
        {
            include_once($plugin);

            $shipping = new $row['shipping_code'];
            $all[$key]['invoice_no'] = $shipping->query((string)$row['invoice_no']);
        }
    }

    clearstatcache();

    return $all;
}

/**
 * 获得最新的文章列表。
 *
 * @access  private
 * @return  array
 */
function index_get_new_articles()
{
    $sql = 'SELECT a.article_id, a.title, ac.cat_name, a.add_time, a.file_url, a.open_type, ac.cat_id, ac.cat_name ' .
            ' FROM ' . $GLOBALS['ecs']->table('article') . ' AS a, ' .
                $GLOBALS['ecs']->table('article_cat') . ' AS ac' .
            ' WHERE a.is_open = 1 AND a.cat_id = ac.cat_id AND ac.cat_type = 1' .
            ' ORDER BY a.article_type DESC, a.add_time DESC LIMIT ' . $GLOBALS['_CFG']['article_number'];
    $res = $GLOBALS['db']->getAll($sql);

    $arr = array();
    foreach ($res AS $idx => $row)
    {
        $arr[$idx]['id']          = $row['article_id'];
        $arr[$idx]['title']       = $row['title'];
        $arr[$idx]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ?
                                        sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
        $arr[$idx]['cat_name']    = $row['cat_name'];
        $arr[$idx]['add_time']    = local_date($GLOBALS['_CFG']['date_format'], $row['add_time']);
        $arr[$idx]['url']         = $row['open_type'] != 1 ?
                                        build_uri('article', array('aid' => $row['article_id']), $row['title']) : trim($row['file_url']);
        $arr[$idx]['cat_url']     = build_uri('article_cat', array('acid' => $row['cat_id']), $row['cat_name']);
    }

    return $arr;
}

/**
 * 获得最新的团购活动
 *
 * @access  private
 * @return  array
 */
function index_get_group_buy()
{
    $time = gmtime();
    $limit = get_library_number('group_buy', 'index');

    $group_buy_list = array();
    if ($limit > 0)
    {
        $sql = 'SELECT gb.act_id AS group_buy_id, gb.goods_id, gb.ext_info, gb.goods_name, g.goods_thumb, g.goods_img ' .
                'FROM ' . $GLOBALS['ecs']->table('goods_activity') . ' AS gb, ' .
                    $GLOBALS['ecs']->table('goods') . ' AS g ' .
                "WHERE gb.act_type = '" . GAT_GROUP_BUY . "' " .
                "AND g.goods_id = gb.goods_id " .
                "AND gb.start_time <= '" . $time . "' " .
                "AND gb.end_time >= '" . $time . "' " .
                "AND g.is_delete = 0 " .
                "ORDER BY gb.act_id DESC " .
                "LIMIT $limit" ;
        $res = $GLOBALS['db']->query($sql);

        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            /* 如果缩略图为空，使用默认图片 */
            $row['goods_img'] = get_image_path($row['goods_id'], $row['goods_img']);
            $row['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);

            /* 根据价格阶梯，计算最低价 */
            $ext_info = unserialize($row['ext_info']);
            $price_ladder = $ext_info['price_ladder'];
            if (!is_array($price_ladder) || empty($price_ladder))
            {
                $row['last_price'] = price_format(0);
            }
            else
            {
                foreach ($price_ladder AS $amount_price)
                {
                    $price_ladder[$amount_price['amount']] = $amount_price['price'];
                }
            }
            ksort($price_ladder);
            $row['last_price'] = price_format(end($price_ladder));
            $row['url'] = build_uri('group_buy', array('gbid' => $row['group_buy_id']));
            $row['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                           sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
            $row['short_style_name']   = add_style($row['short_name'],'');
            $group_buy_list[] = $row;
        }
    }
    

    return $group_buy_list;
}

/**
 * 取得拍卖活动列表
 * @return  array
 */
function index_get_auction()
{
    $now = gmtime();
    $limit = get_library_number('auction', 'index');
    $sql = "SELECT a.act_id, a.goods_id, a.goods_name, a.ext_info, g.goods_thumb ".
            "FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS a," .
                      $GLOBALS['ecs']->table('goods') . " AS g" .
            " WHERE a.goods_id = g.goods_id" .
            " AND a.act_type = '" . GAT_AUCTION . "'" .
            " AND a.is_finished = 0" .
            " AND a.start_time <= '$now'" .
            " AND a.end_time >= '$now'" .
            " AND g.is_delete = 0" .
            " ORDER BY a.start_time DESC" .
            " LIMIT $limit";
    $res = $GLOBALS['db']->query($sql);

    $list = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $ext_info = unserialize($row['ext_info']);
        $arr = array_merge($row, $ext_info);
        $arr['formated_start_price'] = price_format($arr['start_price']);
        $arr['formated_end_price'] = price_format($arr['end_price']);
        $arr['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $arr['url'] = build_uri('auction', array('auid' => $arr['act_id']));
        $arr['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                           sub_str($arr['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $arr['goods_name'];
        $arr['short_style_name']   = add_style($arr['short_name'],'');
        $list[] = $arr;
    }

    return $list;
}

/**
 * 获得所有的友情链接
 *
 * @access  private
 * @return  array
 */
function index_get_links()
{
    $sql = 'SELECT link_logo, link_name, link_url FROM ' . $GLOBALS['ecs']->table('friend_link') . ' ORDER BY show_order';
    $res = $GLOBALS['db']->getAll($sql);

    $links['img'] = $links['txt'] = array();

    foreach ($res AS $row)
    {
        if (!empty($row['link_logo']))
        {
            $links['img'][] = array('name' => $row['link_name'],
                                    'url'  => $row['link_url'],
                                    'logo' => $row['link_logo']);
        }
        else
        {
            $links['txt'][] = array('name' => $row['link_name'],
                                    'url'  => $row['link_url']);
        }
    }

    return $links;
}

/**
 * 获得所在的城市IP定位
 *
 * @access  private
 * @return  array
 */
 
function index_get_city_ip($city_ip)
{
	

    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('region') . ' where is_show=1 and region_name like "'.$city_ip.'%" ORDER BY pin_yin';
    $res = $GLOBALS['db']->getRow($sql);
	$r_id=$res['region_id'];
	
	return $res;
	
}

function one_get()
{
	index_get_city_ip($ipInfos['city']);
}

/**
 * 获得所有的城市
 *
 * @access  private
 * @return  array
 */
 
function index_get_city1()
{
	
	if(!empty($_SESSION['region_id']))
	{
		$c_id=$_SESSION['region_id'];
		$where="and region_id='".$c_id."'";
	}
	else
	{
		return false;
	}
	
	
    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('region') . ' where is_show=1 '.$where.' ORDER BY pin_yin';
    $res = $GLOBALS['db']->getAll($sql);
	
	$infos=array();
    foreach($res as $key=>$val)
	{
		$mes = $GLOBALS['db']->getAll('SELECT * FROM ' . $GLOBALS['ecs']->table('suppliers') . ' where city="'.$val['region_id'].'" ORDER BY suppliers_id');

		$infos[]=array('region_id'=>$val['region_id'],'region_name'=>$val['region_name'],'suppliers_info'=>$mes);
	}
   /* echo "<pre>";
	print_r($infos);die;*/
    return $infos;
}

 
function index_get_city()
{
	
	if(!empty($_SESSION['region_id']))
	{
		$c_id=$_SESSION['region_id'];
		$where="and region_id <>'".$c_id."'";
	}
	
	
	
    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('region') . ' where is_show=1 '.$where.' ORDER BY pin_yin';
    $res = $GLOBALS['db']->getAll($sql);
	
	$infos=array();
    foreach($res as $key=>$val)
	{
		$mes = $GLOBALS['db']->getAll('SELECT * FROM ' . $GLOBALS['ecs']->table('suppliers') . ' where city="'.$val['region_id'].'" ORDER BY suppliers_id');

		$infos[]=array('region_id'=>$val['region_id'],'region_name'=>$val['region_name'],'suppliers_info'=>$mes);
	}
   /* echo "<pre>";
	print_r($infos);die;*/
    return $infos;
}

//获得体验店
function index_get_suppliers()
{
	if(!empty($_SESSION['region_id']))
	{
		$c_id=$_SESSION['region_id'];
		$where="and city='".$c_id."'";
	}
	
	
    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('suppliers') . ' where 1=1 '.$where.' ORDER BY suppliers_id';
    $val = $GLOBALS['db']->getRow($sql);
    
	$infos[]=array('suppliers_id'=>$val['suppliers_id'],'suppliers_name'=>$val['suppliers_name'],'work_time'=>$val['work_time'],'address'=>$val['address'],'line'=>$val['line'],'gallery'=>$val['gallery'],'tel'=>$val['tel']);
	// echo "<pre>";
//	print_r($infos);die;
    return $val;
}


//获得体验店数量
function index_get_suppliers_num()
{
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('suppliers') . ' ORDER BY suppliers_id';
    $val = $GLOBALS['db']->getOne($sql);
	// echo "<pre>";
//	print_r($infos);die;

    return $val;
}
//获得热门城市top
function get_hotcity_top()
{
    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('region') . ' where is_show=1 and is_top=1 ORDER BY region_id';
    $val = $GLOBALS['db']->getAll($sql);
	// echo "<pre>";
//	print_r($infos);die;

    return $val;
}



function get_hotcity_top1()
{
    $sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('region') . ' where is_show=1 ORDER BY region_id';
    $val = $GLOBALS['db']->getAll($sql);
	// echo "<pre>";
//	print_r($infos);die;

    return $val;
}




function getfirstchar($s0){   //获取单个汉字拼音首字母。注意:此处不要纠结。汉字拼音是没有以U和V开头的
    $fchar = ord($s0{0});
    if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($s0{0});
    $s1 = iconv("UTF-8","gb2312", $s0);
    $s2 = iconv("gb2312","UTF-8", $s1);
    if($s2 == $s0){$s = $s1;}else{$s = $s0;}
    $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
    if($asc >= -20319 and $asc <= -20284) return "A";
    if($asc >= -20283 and $asc <= -19776) return "B";
    if($asc >= -19775 and $asc <= -19219) return "C";
    if($asc >= -19218 and $asc <= -18711) return "D";
    if($asc >= -18710 and $asc <= -18527) return "E";
    if($asc >= -18526 and $asc <= -18240) return "F";
    if($asc >= -18239 and $asc <= -17923) return "G";
    if($asc >= -17922 and $asc <= -17418) return "H";
    if($asc >= -17922 and $asc <= -17418) return "I";
    if($asc >= -17417 and $asc <= -16475) return "J";
    if($asc >= -16474 and $asc <= -16213) return "K";
    if($asc >= -16212 and $asc <= -15641) return "L";
    if($asc >= -15640 and $asc <= -15166) return "M";
    if($asc >= -15165 and $asc <= -14923) return "N";
    if($asc >= -14922 and $asc <= -14915) return "O";
    if($asc >= -14914 and $asc <= -14631) return "P";
    if($asc >= -14630 and $asc <= -14150) return "Q";
    if($asc >= -14149 and $asc <= -14091) return "R";
    if($asc >= -14090 and $asc <= -13319) return "S";
    if($asc >= -13318 and $asc <= -12839) return "T";
    if($asc >= -12838 and $asc <= -12557) return "W";
    if($asc >= -12556 and $asc <= -11848) return "X";
    if($asc >= -11847 and $asc <= -11056) return "Y";
    if($asc >= -11055 and $asc <= -10247) return "Z";
    return NULL;
    //return $s0;
}


function get_ip_citys()
{
	
	$sql = 'SELECT * FROM ' . $GLOBALS['ecs']->table('region') . ' where is_show=1 ORDER BY region_id';
    $settles = $GLOBALS['db']->getAll($sql);

	$settlesRes = array();  
           foreach ($settles as $sett) 
		   {  
               $sname = $sett['region_name'];   
               $snameFirstChar = getfirstchar($sname); //取出门店的第一个汉字的首字母  
               $settlesRes[$snameFirstChar][] = $sett;//以这个首字母作为key  
           }   
		   ksort($settlesRes);
		  
        return ($settlesRes); //对数据进行ksort排序，以key的值升序排序  
}



//获取当前城市

function GetIp(){  
    $realip = '';  
    $unknown = 'unknown';  
    if (isset($_SERVER)){  
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)){  
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);  
            foreach($arr as $ip){  
                $ip = trim($ip);  
                if ($ip != 'unknown'){  
                    $realip = $ip;  
                    break;  
                }  
            }  
        }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)){  
            $realip = $_SERVER['HTTP_CLIENT_IP'];  
        }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)){  
            $realip = $_SERVER['REMOTE_ADDR'];  
        }else{  
            $realip = $unknown;  
        }  
    }else{  
        if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)){  
            $realip = getenv("HTTP_X_FORWARDED_FOR");  
        }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)){  
            $realip = getenv("HTTP_CLIENT_IP");  
        }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $unknown)){  
            $realip = getenv("REMOTE_ADDR");  
        }else{  
            $realip = $unknown;  
        }  
    }  
    $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $unknown;  
    return $realip;  
}  
  
function GetIpLookup($ip = ''){  
    if(empty($ip)){  
        $ip = GetIp();  
    }  
    $res = @file_get_contents('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=' . $ip);  
    if(empty($res)){ return false; }  
    $jsonMatches = array();  
    preg_match('#\{.+?\}#', $res, $jsonMatches);  
    if(!isset($jsonMatches[0])){ return false; }  
    $json = json_decode($jsonMatches[0], true);  
    if(isset($json['ret']) && $json['ret'] == 1){  
        $json['ip'] = $ip;  
        unset($json['ret']);  
    }else{  
        return false;  
    }  
    return $json;  
}  

?>