<?php
class upfile{

		function __construct($InputName){
			$this->File = $InputName;
		}
		function uploadfile()
		{
			$this->UpType = $this->File["type"];
			$this->UpName = $this->File["name"];
			$this->UpTmp_Name = $this->File["tmp_name"];
			$this->UpSize = $this->File["size"];
			if($this->UpSize > 100000000)
			{
				echo "<script>";
				echo "alert('上传文件超过规定大小范围!');";
				echo "location.href='javascript:history.go(-1)';";
				echo "</script>";
			}
			if(!file_exists("upload"))
			{
				mkdir("upload");
			}
			if($this->File["error"]==0)
			{
				$this->FileNameType = pathinfo($this->UpName);
				$this->FileNameType = $this->FileNameType["extension"];
				$this->FileName = "../upload" . "/" ."s_". date("Ymdhis") . "." .$this->FileNameType;
				if(move_uploaded_file($this->UpTmp_Name,$this->FileName))
				{
					echo "<div style=\"font-size:12px; position:absolute;top:0;\"><img src=\"../images/icon_gou.gif \">上传成功!</div>";

				}else
				{
					echo "<script>";
					
					echo "alert('上传失败');";
					echo "location.href='javascript:history.go(-1)';";
					echo "</script>";
				}
			}else
			{
				    echo "<script>";
					echo "alert('上传失败');";
					echo "location.href='javascript:history.go(-1)';";
					echo "</script>";
			}
			return $this->FileName;
		}
	}

?>