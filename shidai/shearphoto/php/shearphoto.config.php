<?php
define('IOURL',dirname(dirname(__FILE__)));   //锁定相对目录   
define('ShearURL',IOURL.DIRECTORY_SEPARATOR); //DIRECTORY_SEPARATOR 是斜杠符，为兼容WINDOW和LINUX
$ShearPhoto["config"]=array(
"proportional"=>81/100,//比例截图，JS端也要相应设置哦，不然系统会给你抱出错误,不设比例填0，如填比例 ：3/4  代表宽和高的比例是3/4
"width"=>array(
             //array(0,true),//此时的0   代表以用户取当时截取框的所截的大小为宽
            // array(370,true),//@参数1要生成的宽 （高度不用设，系统会按比例做事），    @参数2：是否为该图加水印，water参数要有水印地址才有效true或false
            // array(270,true),//@参数1要生成的宽 （高度不用设，系统会按比例做事），   @参数2：是否为该图加水印，water参数要有水印地址才有效true或false
			 array(352,true)),//你可以继续增加多张照片
"water"=>"../images/waterimg2.png",//只接受PNG水印，当然你对PHP熟练，你可以对主程序进行修改		   
"water_scope"=>100,       //图片少于多少不添加水印！没填水印地址，这里不起任何作用
"temp"=>ShearURL."file".DIRECTORY_SEPARATOR."temp",  //等待截图的大图文件。就是上传图片的临时目录，截图后，图片会被删除
"tempSaveTime"=>600,//临时图片（也就是temp内的图片）保存时间，需要永久保存请设为0。单位秒
"saveURL"=>ShearURL."file".DIRECTORY_SEPARATOR."shearphoto_file",//后面不要加斜杠，系统会自动给补上！不要使用中文
"filename"=>uniqid("tianming_")."_".mt_rand(100,999)."_"//文件名字定义！要生成多个文件时 系统会自动在后面补0 1 2  3.....;
);

?>