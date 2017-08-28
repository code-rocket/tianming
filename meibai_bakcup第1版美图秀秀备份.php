<?php
$goods_id=$_GET['goods_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>美图WEB开放平台</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://open.web.meitu.com/sources/xiuxiu.js 

" type="text/javascript"></script>
<script type="text/javascript">
window.onload=function(){
       /*第1个参数是加载编辑器div容器，第2个参数是编辑器类型，第3个参数是div容器宽，第4个参数是div容器高*/
xiuxiu.setLaunchVars ("nav", "facialMenu");
	xiuxiu.embedSWF("altContent",3,"100%","100%");
       //修改为您自己的图片上传接口
	xiuxiu.setUploadURL("http://121.41.56.121:8080/images/meitu_img/image_upload.php");
        xiuxiu.setUploadType(2);
        xiuxiu.setUploadDataFieldName("upload_file");
	xiuxiu.onInit = function ()
	{
		//xiuxiu.loadPhoto("http://open.web.meitu.com/sources/images/1.jpg");
	}	
	xiuxiu.onUploadResponse = function (data)
	{
		//alert(data);
		window.location.href="http://121.41.56.121:8080/demo.php?imgs="+data+"&goods_id=<?php echo $goods_id?>";
	}
}
</script>
<style type="text/css">
	html, body { height:100%; overflow:hidden; }
	body { margin:0; }
</style>
</head>
<body>
<div id="altContent">
	<h1>美图秀秀</h1>
</div>
</body>
</html>