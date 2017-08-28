<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;

	
	
     //商品分类
        $info=$db->GetAll("SELECT * from  " . $ecs->table('category') ." where parent_id=0");
	    $sql = "SELECT count(*) as num  from  " . $ecs->table('category') ." where parent_id=0";
        $t_num = $db->getOne($sql);
	 if($info)
	 {
		 $info2=array();
		 $info3=array();
		 $info4=array();
		 $i=0;
		 $m=0;
		 foreach($info as $key=>$val)
		 {
		    
			$info4[]=$info[$key]['cat_name'];
			$info1=$db->GetAll("SELECT * from  " . $ecs->table('category') ." where parent_id>0");
			
            $info2[]=$info[$key]['cat_name'];
			if($info1['parent_id']==$info[$key]['cat_id'])
			{
				echo $info1['cat_name'];die;
			}
			
			
			
			$info3[]=array('大分类'=>$info2,'小分类'=>$info1['cat_name']);
			
			
			//$info3[]=array('大分类'=>$info2,'小分类'=>$info1[$key]['cat_name']);
			
			
		 }
		
		
		
		 $results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$info3);
		 exit($json->encode($results)); 
	 }
   
   
   
  
  
    
?>