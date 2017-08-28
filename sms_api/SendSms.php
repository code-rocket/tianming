
<?php
require 'Util.php';
//发送验证码短信接口

$username = 'tianming';
date_default_timezone_set('Asia/Shanghai');
$tkey = date('YmdHis', time());
$password = 'I8ceJFnx';
$password = strtolower(md5(strtolower(md5($password)) . $tkey));
$mobile = $_POST['tel'];
$content = trim($_POST['content']);

$productid = 676767; //887362 订单、通知、祝福信息专用 //676767 验证码专用
$xh = '';
$data = array(
	"username" => $username,
	"password" => $password,
	"tkey" => $tkey,
	"mobile" => $mobile,
	"content" => $content,
	"productid" => $productid,
	"xh" => $xh
);
$url = "http://www.ztsms.cn/sendNSms.do";
$result = Util::request($url, 'Get',$data);
echo $result;




?>