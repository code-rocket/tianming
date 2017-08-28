<?php
header("Content-type: text/html; charset=utf-8");
include_once("imageresize.class.php");
include_once("upfileload.php");


/*           水印              */
function toshowspic($frompic){

$im=imagecreatefromjpeg($frompic);

//取得各自的长宽，计算位置

$im_WH=getimagesize($frompic);
$im_W=$im_WH[0];
$im_H=$im_WH[1];

if($im_W<=330){
$topic="../../images/logos1.png";
$img2=imagecreatefrompng($topic);
}else{
$topic="../../images/logos.png";
$img2=imagecreatefrompng($topic);
}

$img2_WH=getimagesize($topic);
$img2_W=$img2_WH[0];
$img2_H=$img2_WH[1];


//定义存放的位置
$NewX=$im_W/2-$img2_W/2;
$NewY=$im_H/2-$img2_H/2;
//填充
imagecopy($im,$img2,$NewX,$NewY,0,0,$img2_W,$img2_H);
header("Content-type:image/jpeg");
imagejpeg($im,$frompic);
}

/*         水印              */

	if($_POST["submit"]){
		$inputname = $_FILES["upfile"];
		$uploadfile_name = $_GET["uploadfile"];
		$forms_name = $_GET["form_name"];
		$upfile = new upfile($inputname);
		$name = $upfile->uploadfile();

		toshowspic($name);

        echo '<input name="'.$uploadfile_name.'" type="hidden" value="'.$name.'" id="'.$uploadfile_name.'"/>';    
        echo '<script>parent.document.'.$forms_name.'.'.$uploadfile_name.'.value=document.getElementById("'.$uploadfile_name.'").value;</script>';    
	}
	else{
?>
<STYLE TYPE="text/css">
<!--
body{
margin:0px;
padding:0px;
}
form{
margin:0px;
padding:0px;
}
.bt {border:1px solid #ccc; font-size: 9pt;height: 20px; width:60px; background-color: #EEEEEE; cursor: hand;}
-->
</STYLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<form enctype="multipart/form-data" action="" method="POST">
	<input type="file" name="upfile"/>
    <input type="submit" value="上 传" name="submit" class="bt"/>
</form>
</body>
<?php
}
?>