<!DOCTYPE HTML>

<html>

<head>

<meta charset="utf-8">

<title>Javascript+PHP实现在线拍照功能</title>

</head>

<body>

<div id="cam">

<!--调用摄像组件并显示图像-->

<input type=button value="点击这里拍照" class="btn" onclick="take_snapshot()">



</div>

<div id="results">

<!--显示上传结果-->

</div>

</body>

</html>



<script type="text/javascript" src="webcam.js"></script>



<script language="JavaScript">

webcam.set_api_url( 'action.php' );

webcam.set_quality( 90 ); // 图像质量(1 - 100)

webcam.set_shutter_sound( true ); // 拍照时播放声音

document.write( webcam.get_html(320, 240, 160,120) );

</script>



<script language="JavaScript">

webcam.set_hook( 'onComplete', 'my_completion_handler' );

function take_snapshot() {

document.getElementById('results').innerHTML = '<h4>Uploading...</h4>';

webcam.snap();

}

function my_completion_handler(msg) {

if (msg.match(/(http\:\/\/\S+)/)) {

var image_url = RegExp.$1;

document.getElementById('results').innerHTML =

'<h4>Upload Successful!</h4>' +

'<img src="' + image_url + '">';

webcam.reset();

}

else alert("PHP Error: " + msg);

}

</script>

<?php

$filename = date('YmdHis') . '.jpg';

$result = file_put_contents( 'pics/'.$filename, file_get_contents('php://input') );

if (!$result) {

print "ERROR: Failed to write data to $filename, check permissions\n";

exit();

}

$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/pics/' . $filename;

print "$url\n";
?>