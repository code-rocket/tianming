<?php
header("Content-type: text/html; charset=utf-8");
include_once("imageresize.class.php");
include_once("upfileload1.php");

	if($_POST["submit"]){
		$inputname = $_FILES["upfile"];
		$uploadfile_name = $_GET["uploadfile"];
		$forms_name = $_GET["form_name"];
		$upfile = new upfile($inputname);
		$name = $upfile->uploadfile(); //文件名称
		
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