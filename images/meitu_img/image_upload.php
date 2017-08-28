<?php
	 $hz=explode('/',$_FILES["upload_file"]["type"]);

	 $size=$_FILES["upload_file"]["size"]/1024;
  
	 $t_value =time().rand(1,999).$_FILES["upload_file"]["name"];
     
	 $par = "/[\x80-\xff]/";
     $tt_value=preg_replace($par,"",$t_value);
	 
	  if(!move_uploaded_file($_FILES["upload_file"]["tmp_name"],"upload/".$tt_value))
	  {
		
	  }
	  else
	  {
		  
		  echo $tt_value;
	  }
?>