<?php

header('Content-type:text/html;charset=utf-8');
require("shearphoto.config.php");
$ShearPhoto["JSdate"]=isset($_POST["JSdate"])?json_decode(trim(stripslashes($_POST["JSdate"])),true):die('{"erro":"致命错误"}');
//类开始
 class ShearPhoto {
    public $erro = false;
    protected function rotate($src, $R) {
        $arr = array(
            -90, 
            -180, 
            -270
        );
        if (in_array($R, $arr)) {
			 $rotatesrc = imagerotate($src, $R, 0);
            imagedestroy($src);
        } else {
            return $src;
        }
      return $rotatesrc;
    }
	
    protected function delTempImg($temp,$deltime) {
		if($deltime==0)  return;
	$dir = opendir($temp);
	$time=time();
	   while (($file = readdir($dir)) !== false)
       {
	      if($file!="." and $file!=".." and $file!="shearphoto.lock"){
		     $fileUrl= $temp.DIRECTORY_SEPARATOR.$file;
	         $pastTime=$time-filemtime($fileUrl);
	          if($pastTime<0 || $pastTime>$deltime)@unlink($fileUrl);
	      }
       }
           closedir($dir);
	}
    public function run($JSconfig, $PHPconfig) {
	 $tempurl=$PHPconfig["temp"].DIRECTORY_SEPARATOR."shearphoto.lock";
	!file_exists($tempurl)	&& file_put_contents($tempurl,"ShearPhoto Please don't delete");
	 $this->delTempImg($PHPconfig["temp"],$PHPconfig["tempSaveTime"]);
	 if (!isset($JSconfig["url"]) || 
    !isset($JSconfig["R"]) || !isset($JSconfig["X"]) || !isset($JSconfig["Y"]) || !isset($JSconfig["IW"]) || !isset($JSconfig["IH"]) || !isset($JSconfig["P"]) || !isset($JSconfig["FW"]) || !isset($JSconfig["FH"]) ) {
     $this->erro = "服务端接收到的数据缺少参数";
            return false;
        } 
		
		
		
        if (!file_exists($JSconfig["url"])) { 
            $this->erro = "此图片路径有误";
            return false;
        }
	
		 
        foreach ($JSconfig as $k => $v) { 
            if ($k !== "url") {
				if (!is_numeric($v)) {
                    $this->erro = "传递的参数有误";
                    return false;
                }
            }
        } //验证是否为字除了url
        if ($PHPconfig["proportional"] !== $JSconfig["P"]) {
            $this->erro = "JS设置的比例和PHP设置不一致";
            return false;
        }
        list($w, $h, $type) = getimagesize($JSconfig["url"]); //验证是否真图片！
        $strtype = image_type_to_extension($type);
        $type_array = array(
            ".jpeg",
            ".gif",
            ".png",
            ".jpg"
        );
        if (!in_array(strtolower($strtype) , $type_array)) {
            $this->erro = "无法读取图片";
            return false;
        }  
		if($JSconfig["R"]==-90 || $JSconfig["R"]==-270){ list($w,$h)= array($h,$w);}
		return $this->createshear($PHPconfig, $w, $h, $type, $strtype, $JSconfig);
    }
    protected function createshear($PHPconfig, $w, $h, $type, $strtype, $JSconfig) {
        switch ($type) {
            case 1:  
                $src = @imagecreatefromgif($JSconfig["url"]);
                break;

            case 2:  
                $src = @imagecreatefromjpeg($JSconfig["url"]);
				
                break;

            case 3:  
                $src = @imagecreatefrompng($JSconfig["url"]);
                break;

            default:
                return false;
                break;
				 
				
        }
        $src = $this->rotate($src, $JSconfig["R"]);
		
			 
        $dest = imagecreatetruecolor($JSconfig["IW"], $JSconfig["IH"]); 
        imagecopy($dest, $src, 0, 0, $JSconfig["X"],  $JSconfig["Y"], $w, $h);
	     imagedestroy($src);
        return $this->compression($dest, $PHPconfig, $JSconfig["IW"], $JSconfig["IH"], $type, $strtype, $JSconfig);
    }
    protected function CreateArray($PHPconfig, $JSconfig, $strtype) {
        $arr = array();
        if ($PHPconfig["proportional"] > 0) {
            $proportion = $PHPconfig["proportional"];
        } else {
            $proportion = $JSconfig["IW"] / $JSconfig["IH"];
        }
		  
		  if (isset($PHPconfig["water"]) &&  $PHPconfig["water"]  && file_exists($PHPconfig["water"])) {
              $water_or = true;
        }else{
			 $water_or=false;
		}
		if(!file_exists($PHPconfig["saveURL"])) 
		if(!mkdir($PHPconfig["saveURL"],0777,true)){
			$this->erro = "目录权限有问题";
            return false;
			}
        foreach ($PHPconfig["width"] as $k => $v) {
            ($v[0] == 0) and ($v[0] = $JSconfig["FW"]);
            $height = $v[0] / $proportion;
            $strtype == ".jpeg" and $strtype = ".jpg";
            $file_url = $PHPconfig["saveURL"] .DIRECTORY_SEPARATOR. $PHPconfig["filename"] . $k . $strtype;
            $water = ($v[1] === true && $water_or === true) ? true : false;
            $arr[$k] = array(
                $v[0],
                $height,
                $file_url,
                $water
            );
        }
        return $arr;
    }
    protected function compression($DigShear,$PHPconfig, $w, $h, $type, $strtype, $JSconfig) {
        require 'zip_img.php'; 
		$arrimg=$this->CreateArray($PHPconfig, $JSconfig, $strtype);
		if(!$arrimg) return false;
        $zip_photo = new zip_img(array(
            "dest" => $DigShear,
            "water" => $PHPconfig["water"],
            "water_scope" => $PHPconfig["water_scope"],
            "w" => $w,
            "h" => $h,
            "type" => $type,
            "strtype" => $strtype,
            "zip_array" => $arrimg
        ));
        return $zip_photo->run();
    }
}
//类结束

$Shear =new ShearPhoto;//类实例开始
$result = $Shear->run($ShearPhoto["JSdate"],$ShearPhoto["config"]);//传入参数运行
if($result===false){       //切图失败时
 echo '{"erro":"'.$Shear->erro.'"}';            //把错误发给JS /请匆随意更改"erro"的编写方式，否则JS出错
}
else //切图成功时
 {
	 $dirname=pathinfo($ShearPhoto["JSdate"]["url"]);
	 $ShearPhotodirname=$dirname["dirname"].DIRECTORY_SEPARATOR."shearphoto.lock";//认证删除的密钥
	 file_exists($ShearPhotodirname) && @unlink($ShearPhoto["JSdate"]["url"]);//密钥存在，当然就删掉原图
	 
	 
	 $result = json_encode($result); 
	 echo str_replace(array("\\\\","\/",ShearURL,"\\"),array("\\","/","","/"),$result);//去掉无用的字符修正URL地址，再把数据传弟给JS
      /*
     到此程序已运行完毕，并成功！你可以在这里愉快地写下你的逻辑代码
	 $result[X]["ImgUrl"] //图片路径  X是数字
	 $result[X]["ImgName"] //图片文件名字  X是数字
	 $result[X]["ImgWidth"]//图片宽度    X是数字
	 $result[X]["ImgHeight"] //图片高度    X是数字
	 用var_dump($result)展开，你便一目了然！  
      */
    	
  }

?>