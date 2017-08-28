<?php

class zip_img {
    protected $arg;
    protected $waterimg = false;
    protected $GDfun = false;
	protected $result =array();
    final function __construct($arg) {
        $this->arg = $arg;
        if (isset($arg["water"]) and $arg["water"] and file_exists($arg["water"])) {
            list($W, $H, $type) = getimagesize($arg["water"]);
            if ($type == 3) {
                $this->waterimg = array(
                    imagecreatefrompng($arg["water"]) ,
                    $W,
                    $H
                );
            }
        }
        switch ($arg["type"]) {
            case 1: 
                $this->GDfun = "imagegif";
                break;

            case 2: 
                $this->GDfun = "imagejpeg";
                break;

            case 3: 
                $this->GDfun = "imagepng";
                break;

            default:
                break;
        }
    }
    protected function zip_img($dest, $width, $height, $save_url, $water) {
        $createsrc = imagecreatetruecolor($width, $height);
        imagecopyresampled($createsrc, $dest, 0, 0, 0, 0, $width, $height, $this->arg["w"], $this->arg["h"]);
        $water === true and $createsrc = $this->add_water($createsrc, $width, $height);
        $this->saveimg($createsrc,$save_url,$width, $height);
    }
    protected function add_water($src, $width, $height) {
        if ($this->waterimg and is_numeric($this->arg["water_scope"]) and $width > $this->arg["water_scope"] and $height > $this->arg["water_scope"]) {
            imagecopy($src, $this->waterimg[0], $width - $this->waterimg[1] - 10, $height - $this->waterimg[2] - 10, 0, 0, $this->waterimg[1], $this->waterimg[2]);
        }
        return $src;
    }
    protected function saveimg($createsrc, $save_url,$width, $height) {
        @call_user_func($this->GDfun, $createsrc, $save_url);
        imagedestroy($createsrc);
		array_push($this->result,array("ImgUrl"=>$save_url, "ImgName"=>basename($save_url),"ImgWidth"=>$width,"ImgHeight"=>$height));
    }
    final function __destruct() {
        @imagedestroy($this->arg["dest"]);
        $this->waterimg[0] and @imagedestroy($this->waterimg[0]);
	 }
    public function run() {
        $dest = $this->arg["dest"];
        $zip_array = $this->arg["zip_array"];
        foreach ($zip_array as $k => $v) {
            list($width, $height, $save_url, $water) = $v;
            $this->zip_img($dest, $width, $height, $save_url, $water);
        }
            return $this->result;
    }
}
?>