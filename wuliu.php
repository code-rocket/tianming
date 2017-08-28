<?php

/**
 * ECSHOP 提交用户评论
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: comment.php 17217 2011-01-19 06:29:08Z liubo $
 */

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');
require(ROOT_PATH . 'includes/cls_json.php');

//测试单号5166163152
$num = $_GET["num"];
if ($num) {
    $comStr = curl_get("http://www.kuaidi100.com/autonumber/autoComNum?text=" . $num, true);
    if ($comStr) {
        $comJson = json_decode($comStr, true);
        if (count($comJson) > 0 && $comJson["auto"] && count($comJson["auto"]) > 0) {
            $type = $comJson["auto"][0]["comCode"];
            $temp = mt_rand(10000000, 99999999) . mt_rand(10000000, 99999999);
            $resStr = curl_get("http://www.kuaidi100.com/query?type=" . $type . "&postid=" . $num . "&id=1&valicode=&temp=0." . $temp, true);
            if ($resStr) {
                $resJson = json_decode($resStr, true);
                if ($resJson["message"] == "ok") {
                    $resJson["data"] = array_reverse($resJson["data"]);
                    $smarty->assign('res', $resJson);
                } else if ($resJson["status"] == 201) {
                    $smarty->assign('searchErr', $resJson["message"]);
                }
            }
        }
    }
}
$smarty->display('wuliu.dwt', $cache_id);

/**
 * @param $url
 * @param bool $gzip
 * @return mixed
 */
function curl_get($url, $gzip = false)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    if ($gzip) {
        curl_setopt($curl, CURLOPT_ENCODING, "gzip"); // 关键在这里
    }
    $content = curl_exec($curl);
    curl_close($curl);
    return $content;
}

?>