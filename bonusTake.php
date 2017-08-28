<?php

/**
 * 领取首页优惠券页面 
 */

define('IN_ECS', true);
require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2) {
    $smarty->caching = true;
}


/* 优惠券id */
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ( !$id )  show_message( '优惠券不存在', '', '', 'error');

/* 判断是否登录 */
//if ($_SESSION['user_id'] <= 0)   show_message('请您先登录，再领取优惠券', '', '', 'error');

/* 取得优惠券信息 */
$bonus = getBonusInfo($id);
if (empty($bonus))  show_message( '优惠券不存在', '', '', 'error');

// 1476892800  1970-01-01 00:00:00  当时间没有填写时间时 就是这个值
$time = time();
if( $bonus['send_start_date'] != '1476892800' && $time < $bonus['send_start_date'] )  show_message( '该优惠券 活动时间未开始.（开始时间:'.date('Y-m-d H:i:s', $bonus['send_start_date']).'）', '', '', 'error');

if ( $bonus['send_end_date'] != '1476892800' && $time > $bonus['send_end_date'] ) show_message( '该优惠券 活动时间已结束，（结束时间:'.date('Y-m-d H:i:s', $bonus['send_close_date']).'）', '', '', 'error');

/* 查询：判断是否领取过优惠券了 */
$userBonus = getUserBonus( $id, (int)$_SESSION['user_id'], ' used_time = 0 ' );
if( !empty($userBonus) ) show_message( '您已经领取过该优惠券了，不能重复领取。', '', '', 'error');


/* 缓存id：语言，活动id， */
$cache_id = sprintf('%X', crc32( $_CFG['lang'] . '- bonus' . $id  ));

/* 如果没有缓存，生成缓存 */
//if (!$smarty->is_cached('bonusTake.dwt', $cache_id)) {
if ( !isset($_GET['act']) ) {

	/* 取得团购商品信息 */

	/* 取得商品的规格 */

	//模板赋值
	$position = assign_ur_here(0, '领取优惠券');
	$smarty->assign('page_title', $position['title']);    // 页面标题
	$smarty->assign('ur_here',    $position['ur_here']);  // 当前位置

	$smarty->assign('categories', get_categories_tree()); // 分类树
	$smarty->assign('helps',      get_shop_help());       // 网店帮助
	$smarty->assign('top_goods',  get_top10());           // 销售排行
	$smarty->assign('promotion_info', get_promotion_info());
	
	

	$smarty->assign('id',  $id);
	$smarty->assign('bonus',  $bonus);
	$smarty->assign('gb_list_hot',  array());

	//assign_dynamic('bonusTake');
	$smarty->display('bonusTake.dwt');
}


/*------------------------------------------------------ */
//-- 领取优惠券
/*------------------------------------------------------ */

if ( isset($_GET['act']) && $_GET['act'] == 'take') {


    /* 查询：取得团购活动信息 */
    /* 查询：检查团购活动是否是进行中 */
    /* 查询：判断数量是否足够 */

    /* 领取 */
	if( takeBonus($id, $uid) ){
		echo '领取成功！ 在购物时可以使用优惠券抵消订单金额。';
	}else{
		echo '领取未成功，请联系网站';
	}


    exit;
}








/**
 * 取得单个优惠券信息
 * @param   int     $id    id
 * @return  array
 */
function getBonusInfo($id){
	$id = intval($id);
	$sql = "SELECT * FROM " . $GLOBALS['ecs']->table('bonus_type') . "  WHERE type_id = '$id' ";
	$bonus = $GLOBALS['db']->getRow($sql);


	return $bonus;
}


/**
 * 取得用户优惠券信息
 * @param $id
 * @param $uid
 * @param string $whereCond
 * @return mixed
 */
function getUserBonus($id, $uid, $whereCond=''){
	$id  = intval($id);
	$uid = intval($uid);

	$whereCond = $whereCond ? " AND {$whereCond} " : '';
	$sql = "SELECT * FROM " . $GLOBALS['ecs']->table('user_bonus') . "  WHERE bonus_type_id = '$id' AND user_id = '$uid' {$whereCond} ";
	$bonus = $GLOBALS['db']->getAll($sql);

	return $bonus;
}



/**
 * 取得信息
 * @param   int     $id    id
 * @return  array
 */
function takeBonus($id, $uid){
	$id  = intval($id);
	$uid = intval($uid);
	$data = array(
		'user_id'			=> $uid,
		'bonus_type_id'		=> $id,
		'is_index_ticket'	=> 1,
	);
	$GLOBALS['db']->autoExecute( $GLOBALS['ecs']->table('user_bonus'), $data, 'INSERT');
	return true;
}




