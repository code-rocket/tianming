<?php
define('IN_ECS', true);

require('api/init.php');


$imgs=$_GET['imgs'];

$goods_id=$_GET['goods_id'];

$imgs="http://121.41.56.121:8080/images/meitu_img/upload/".$imgs;

$row=$GLOBALS['db']->getRow("SELECT * FROM " . $GLOBALS['ecs']->table('goods') ." where goods_id=".$goods_id);


$row1=$GLOBALS['db']->getAll("SELECT * FROM " . $GLOBALS['ecs']->table('goods_attr') ." where goods_id=".$goods_id);

foreach($row1 as $key=>$val)
{
	//echo $val['attr_id'];
   if($val['attr_id']==13)
   {
	   $jp_width= $val['attr_value'];
	   
   }
   
   else if($val['attr_id']==14)
   {
	   $yjkj_width= $val['attr_value'];
	   
   }
   
   else if($val['attr_id']==15)
   {
	   $bt_width= $row1[$key]['attr_value'];
	 
   }
   
   else if($val['attr_id']==16)
   {
	   $jp_height= $val['attr_value'];
	
   }
 
}

//echo "<pre>";
//print_r($row1);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>天明眼镜--试戴</title>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.rotate.min.js"></script>
</head>
<body>

<div style="margin:0 auto; width:500px; margin-top:50px;">
<div id="facediv" style="position: relative; ">
    <img id="faceimg"
         src="<?php echo $imgs?>">
    <img id="yanjing" src="/images/upload/<?php echo $row['goods_pic']?>" style="position:absolute;display:none;">
</div>
    <input onClick="aaa(60,180,27,38)" type="button" value="60">
    <input type="button" onClick="aaa(54,160,27,35)" value="54">
</div>
<script type="text/javascript" src="js/facepp-sdk.min.js"></script>
<script type="text/javascript">
    /**
     * 自动定位眼睛的位置和缩放大小
     * @param yanjing_tupian_id_param //要缩放的眼睛图片的选择器id
     * @param yanjing_tu_pian_kuan_param //眼睛图片的图片宽度（单位像素）
     * @param glass_width_param //眼睛镜片的宽度（单位毫米）
     * @param jing_kuan_param //眼睛框架的总宽度（单位毫米）
     * @param bi_tuo_kuan_param //眼睛鼻托处的宽度（单位毫米）
     * @param jingpian_height_param //眼睛镜片的高度（单位毫米）
     * @param result_param //人脸识别得到的数据结果集
     */
	 var api = new FacePP('0ef14fa726ce34d820c5a44e57fef470', '4Y9YXOMSDvqu1Ompn9NSpNwWQFHs1hYD');
	 
	function aaa(v,w,x,y)
	{
		
		 api.request('detection/detect', {
            url: '<?php echo $imgs?>',
            mode: 'oneface',
            attribute: 'gender,age,race,smiling,glass,pose'
        }, function (err, result) {
            if (err) {
                // TODO handle error
                return;
            }
			//alert(v);
            dingwei("yanjing", $("#yanjing").width(), v, w, x,y, result);
			
			
        });
		
	}
	
	 
	 
    function dingwei(yanjing_tupian_id_param, yanjing_tu_pian_kuan_param, glass_width_param, jing_kuan_param, bi_tuo_kuan_param, jingpian_height_param, result_param) {
        var bilichi = yanjing_tu_pian_kuan_param / jing_kuan_param; //眼睛的真实宽度（毫米）在图片上显示的（像素）比例，转换为像素
        jing_kuan = jing_kuan_param * bilichi;//得到像素宽的值
        glass_width = glass_width_param * bilichi;//得到像素宽的值
        bi_tuo_kuan = bi_tuo_kuan_param * bilichi;//得到像素宽的值
        jingpian_height = jingpian_height_param * bilichi;//得到像素宽的值
        var center_point_temp = glass_width / 2 + bi_tuo_kuan / 2;
        var glass_left_center = jing_kuan / 2 - center_point_temp;
        var ren_yan_kuan = Math.sqrt(Math.pow((result_param.face[0].position.eye_right.x - result_param.face[0].position.eye_left.x) / 100 * result_param.img_width, 2) + Math.pow((result_param.face[0].position.eye_right.y - result_param.face[0].position.eye_left.y) / 100 * result_param.img_height, 2));
        var suo_fang_bi = ren_yan_kuan / (2 * center_point_temp);
        jing_kuan = jing_kuan * suo_fang_bi;//得缩放后的像素宽的值
        glass_left_center = glass_left_center * suo_fang_bi;//得缩放后的像素宽的值
        jingpian_height = jingpian_height * suo_fang_bi;//得缩放后的像素宽的值
        var rotate_oragin = glass_left_center / jing_kuan * 100;
        rotate_oragin = rotate_oragin + "%";
        var yanjing_pos_left = result_param.face[0].position.eye_left.x / 100 * result_param.img_width - glass_left_center;
        var yanjing_pos_top = result_param.face[0].position.eye_left.y / 100 * result_param.img_height - jingpian_height / 2;
        $("#" + yanjing_tupian_id_param).css({
            "left": yanjing_pos_left + "px",
            "top": yanjing_pos_top + "px",
            "width": jing_kuan + "px"
        });
        $("#" + yanjing_tupian_id_param).rotate({
            angle: result_param.face[0].attribute.pose.roll_angle.value,
            center: [rotate_oragin, "50%"]
        });
		$("#" + yanjing_tupian_id_param).show();
    }

    (function () {
        
        api.request('detection/detect', {
            url: '<?php echo $imgs?>',
            mode: 'oneface',
            attribute: 'gender,age,race,smiling,glass,pose'
        }, function (err, result) {
            if (err) {
                // TODO handle error
                return;
            }
			//alert($("#faceimg").width());
            dingwei("yanjing", $("#yanjing").width(), <?php echo $jp_width?>, <?php echo $yjkj_width?>, <?php echo $bt_width?>,<?php echo $jp_height?>, result);
			
			
        });
    })();
</script>
</body>
</html>
