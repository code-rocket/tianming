<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;
session_start();
    
	
	
    $password=$_POST['password'];
	$token=$_POST['token'];
    $u_id=$db->GetOne("SELECT * from  " . $ecs->table('users') . " where question='".$token."'");
	$a=$_POST['a'];
    if (empty($_POST['a']))
    {
	
       $results = array('result'=>'40004', 'data'=>'业务处理失败');
       exit($json->encode($results));
    }
    
	
	
    if ($_POST['a']=='register') {
       if(empty($_POST['mobile_phone'])||empty($_POST['password'])/*||empty($_POST['code'])*/){
         $results = array('result'=>'20002', 'data'=>'信息不完整,注册失败');
         exit($json->encode($results));
       }
       if ($_POST['mobile_phone']) {
          $one=$db->GetOne("SELECT * from  `ecs_users` where mobile_phone=".$_POST['mobile_phone']);
          if ($one) {
         $results = array('result'=>'20003', 'data'=>'该手机已经注册过');
         exit($json->encode($results));
          }else{
            $posttime=time();
          $sql = "INSERT INTO `ecs_users`(user_name,mobile_phone,password,reg_time) VALUES ('".$_POST['mobile_phone']."','".$_POST['mobile_phone']."','".md5($password)."','".$posttime."')";
         if($db->query($sql)){
            $results = array('result'=>'10000', 'data'=>'注册成功');
            exit($json->encode($results));
        }
          }
       }
    }elseif ($_POST['a']=='login') {

	
		
		
		
     if(empty($_POST['mobile_phone'])||empty($_POST['password'])){
         $results = array('result'=>'20002', 'data'=>'信息不完整,登录失败');
         exit($json->encode($results));
       }
       if ($_POST['mobile_phone'])
	    {
		   
		   $nows=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_name=".$_POST['mobile_phone']);
		  
			 if(!empty($u_id)&&$u_id==$nows['user_id'])
		  {
			  $infos=array();
			  $one=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id=".$u_id);
			  
				  $urer_img='/images/upload/'.$newinfo['answer']; 
				  $infos[]=array('user_id'=>$nows['user_id'],'nickname'=>$nows['alias'],'token'=>$nows['question'],'user_img'=>$urer_img,'email'=>$nows['email'],'user_name'=>$nows['user_name'],'sex'=>$nows['sex'],'birthday'=>$nows['birthday'],'user_money'=>$nows['user_money'],'mobile_phone'=>$nows['mobile_phone']);

			  $results= array('result'=>"10000",'data'=>'已经登录过','msg'=>$infos);
			  exit($json->encode($results));
			  
		  } 
				    
		   
		 $info=$db->GetRow("SELECT * from  `ecs_users` where mobile_phone=".$_POST['mobile_phone'].""); 
		 $ec_salt=$info['ec_salt'];
		 $mobile_phone=$_POST['mobile_phone'];
		 $password=$_POST['password'];
		  
        // $u=0;
		 if(empty($ec_salt))
            {
				//$u=1;
                $user_exist = $db->getOne("SELECT user_id FROM " . $ecs->table("users") . " WHERE user_name='".$mobile_phone."' AND password = '" . MD5($password) ."'");
                if(!empty($user_exist))
                {
                   // $u=3;
                    $ec_salt=rand(1,9999);
                    $upda=$db->query('UPDATE ' . $ecs->table("users") . "SET `password`='".MD5(MD5($password). $ec_salt)."',`ec_salt`='". $ec_salt."' WHERE user_id = '" . $info['user_id'] . "'");
                }
				else
				{
					//$u=4;
				}
            }
		 else
            {
				//$u=2;
                $user_exist =$db->getOne("SELECT user_id FROM " . $ecs->table("users") . " WHERE user_name='".$mobile_phone."' AND password = '" . MD5(MD5($password). $ec_salt)."'");
            }
		 
		 
		 
		 
         
		//账号密码验证成功生成Token
         if ($user_exist) {
		  
		  $token=genToken();		  
		  
		  $upda=$db->query('UPDATE ' . $ecs->table("users") . "SET `question`='".$token."' where user_id='".$user_exist."'");
		  
		  $newinfo=$db->getRow("SELECT * FROM " . $ecs->table("users") . " WHERE question='".$token."'");
		  $newinfo1=array();
		   
		   
		  $urer_img='/images/upload/'.$newinfo['answer']; 
		  $newinfo1[]=array('user_id'=>$newinfo['user_id'],'nickname'=>$newinfo['alias'],'token'=>$newinfo['question'],'user_img'=>$urer_img,'email'=>$newinfo['email'],'user_name'=>$newinfo['user_name'],'sex'=>$newinfo['sex'],'birthday'=>$newinfo['birthday'],'user_money'=>$newinfo['user_money'],'mobile_phone'=>$newinfo['mobile_phone']);
		  

		  
          $results= array('result'=>"10000",'data'=>'登录成功',"msg"=>$newinfo1);
		  session_start();
		  $_SESSION["user_id_app"]=$token;
          exit($json->encode($results));
         }else{
          $results= array('result'=>"40004",'data'=>'用户名或密码错误');
          exit($json->encode($results));
         }
       }
   
	   
       
    
	}
	
	
	//收货地址（添加）
	if($a=="address")
	{
		
		$token=$_POST['token'];
		
		$user_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");
		
		$action=$_POST['action'];
		if(empty($token))
		{
			$results= array('result'=>"40004",'data'=>'没有登录');
            exit($json->encode($results));
		}
		else
		{

			if($action=="insert")
			{
					$consignee=($_POST['consignee']);
					$address=($_POST['address']);//地址
					$tel=($_POST['tel']);  //电话
					$is_default=($_POST['is_default']);//默认地址 0不是默认，1是默认
					$country=($_POST['country']);//国家
			        $province=($_POST['province']);//省
			        $city=($_POST['city']);//城市
			        $district=($_POST['district']);//地区

					if(empty($consignee))
					{
						$results = array('result'=>'40001', 'data'=>'添加失败,数据不完整!');
						exit($json->encode($results));
					}
					
					else
					{
						    
							
						    if($is_default=="1")
							{

								$is_no=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where user_id='".$user_id."' and sign_building=1");

								if(!empty($is_no))
								{
									
									$upda=$db->query('UPDATE ' . $ecs->table("user_address") . "SET `sign_building`=0  WHERE address_id = '" . $is_no['address_id'] . "'");
								}
								$mb=$db->query("INSERT INTO `ecs_user_address`(user_id,consignee,country,province,city,district,address,tel,sign_building) VALUES ('".$user_id."','".$consignee."','".$country."','".$province."','".$city."','".$district."','".$address."','".$tel."','".$is_default."')");
								if($mb)
								{
								  $results = array('result'=>'10000', 'data'=>'添加成功');
								  exit($json->encode($results));
								}
								else
								{
									$results = array('result'=>'40002', 'data'=>'添加失败');
									exit($json->encode($results));
								}
								
							}
							else
							{
								$is_no1=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where user_id='".$user_id."'");
								
								if(empty($is_no1))
								{
								$sql = "INSERT INTO `ecs_user_address`(user_id,consignee,country,province,city,district,address,tel,sign_building) VALUES ('".$user_id."','".$consignee."','".$country."','".$province."','".$city."','".$district."','".$address."','".$tel."','".$is_default."')";
								}
							}
							
					 }
			}
			elseif($action=="search")
			{
				    $user_address_info=$db->GetAll("SELECT * from  " . $ecs->table('user_address') . " where user_id=".$user_id." order by sign_building desc");
					
					$or_no=$db->GetOne("SELECT * from  " . $ecs->table('user_address') . " where user_id=".$user_id." and sign_building=1");
			        $addres_info=array();
			
					foreach($user_address_info as $key=>$val)
					{
						
					   	if(empty($or_no))
						{
							$upda=$db->query('UPDATE ' . $ecs->table("user_address") . "SET `sign_building`=1  WHERE address_id = '" . $user_address_info[0]['address_id'] . "'");
						}
					   $country_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$user_address_info[$key]['country']);
					   $province_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$user_address_info[$key]['province']);
					   $city_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$user_address_info[$key]['city']);
					   $district_name=$db->GetRow("SELECT * from  " . $ecs->table('region') . " where region_id=".$user_address_info[$key]['district']);
					   
					   $infos[]=array('address_id'=>$user_address_info[$key]['address_id'],'consignee'=>$user_address_info[$key]['consignee'],'country'=>$user_address_info[$key]['country'],'country_name'=>$country_name['region_name'],'province'=>$user_address_info[$key]['province'],'province_name'=>$province_name['region_name'],'city'=>$user_address_info[$key]['city'],'city_name'=>$city_name['region_name'],'district'=>$user_address_info[$key]['district'],'district_name'=>$district_name['region_name'],'address'=>$user_address_info[$key]['address'],'tel'=>$user_address_info[$key]['tel'],'is_default'=>$user_address_info[$key]['sign_building']);
					}
					if(!empty($infos))
					{
					    $results = array('result'=>'10000', 'data'=>'收货地址读取成功','msg'=>$infos);
					}
					else
					{
						$results = array('result'=>'40002', 'data'=>'没有收货地址');
					}
					exit($json->encode($results));
	
			}
			
			elseif($action=="update")
			{
				    $address_id=trim($_POST['address_id']);
					 
					$consignee=trim($_POST['consignee']);
					$address=trim($_POST['address']);//地址
					$tel=trim($_POST['tel']);  //电话
					$is_default=trim($_POST['is_default']);//默认地址 0不是默认，1是默认
					$country=trim($_POST['country']);//国家
			        $province=trim($_POST['province']);//省
			        $city=trim($_POST['city']);//城市
			        $district=trim($_POST['district']);//地区
                    
					
					//print_r($_POST);die;
					
					if(empty($address_id))
					{
						$results = array('result'=>'40004', 'data'=>'收货地址ID为空');
						exit($json->encode($results));
					}
					else
					{
						
						if($is_default=="1")
						{
							$is_no=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where user_id='".$user_id."' and sign_building=1");	
						}
						if(!empty($is_no))
						{
							$upda=$db->query('UPDATE ' . $ecs->table("user_address") . "SET `sign_building`=0  WHERE  address_id = '" . $is_no['address_id'] . "'");
						}
						
						
						$user_address_info=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where address_id=".$address_id);
						
						if(empty($user_address_info))
						{
							$results = array('result'=>'40003', 'data'=>'收货地址ID没找到');
						    exit($json->encode($results));
					    }
						else
						{
							  $sql=('UPDATE ' . $ecs->table("user_address") . "SET `consignee`='".$consignee."',`address`='". $address."',`tel`='".$tel."',`sign_building`='".$is_default."',`country`='". $country."',`province`='". $province."',`city`='". $city."',`district`='". $district."' WHERE address_id = '" .$address_id."'"); 
							  
							  
							
							  if($db->query($sql))
							  {
								  $results = array('result'=>'10000', 'data'=>'修改成功');
							  } 
							  else
							  {
								  $results = array('result'=>'40000', 'data'=>'修改失败');
							  } 
							  exit($json->encode($results)); 
						}
					}
	
			}
			
			
			elseif($action=="delete")
			{
				    $address_id=$_POST['address_id'];
					if(empty($address_id))
					{
						$results = array('result'=>'40004', 'data'=>'收货地址ID为空');
						exit($json->encode($results));
					}
					else
					{
						$user_address_info=$db->GetRow("SELECT * from  " . $ecs->table('user_address') . " where address_id=".$address_id);
					    $sql=("delete from " . $ecs->table('user_address') . "  WHERE address_id = ".$address_id.""); 
						if($db->query($sql))
						{
							$results = array('result'=>'10000', 'data'=>'删除成功');
						} 
						else
						{
							$results = array('result'=>'40000', 'data'=>'删除失败');
						} 
						exit($json->encode($results)); 
					}

			}
			
			
			else
			{
				   $results = array('result'=>'40003', 'data'=>'没有输入动作');
				   exit($json->encode($results));
			}
			
		}
	}
	
	
	//用户收藏
	if($a=="message")
	{
		$token=$_POST["token"];
		
		$user_id=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where question='".$token."'");
		if(empty($token))
		{
			$results = array('result'=>'40004', 'data'=>'查询失败，没有登录');
			exit($json->encode($results));
		}
		else
		{
			$msg_type=$_POST['msg_type'];
			
			$title=$_POST['title'];
			
			$content=$_POST['content'];
			
			$time=time();
			$insert=$db->query("INSERT INTO `ecs_feedback`(user_id,user_name,user_email,msg_title,msg_type,msg_status,msg_content,msg_time,order_id,msg_area) VALUES ('".$user_id['user_id']."','".$user_id['user_name']."','".$user_id['email']."','".$title."','".$msg_type."',0,'".$content."','".$time."',0,0)");
		}
		 if($insert)
		 {
			 $results = array('result'=>'10000', 'data'=>'留言成功');
			  exit($json->encode($results));
		 }
		 else
		 {
			 $results = array('result'=>'40004', 'data'=>'留言失败');
		     exit($json->encode($results));
		 }
		
	}
	
	
	
	//用户收藏
	if($a=="collection")
	{
        
	    $token=$_POST["token"];
		
		$user_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");
		if(empty($token))
		{
			$results = array('result'=>'40004', 'data'=>'查询失败，没有登录');
			exit($json->encode($results));
		}
		else
		{
			$one=$db->GetAll("SELECT * from  " . $ecs->table('collect_goods') . " where user_id=".$user_id);
			
			
			//判断是否有收藏
			if($one)
			{
				//查询收藏的具体产品参数
				$canshu=array();
				
				foreach($one as $key=>$val)
				{
					//$canshu[]= $one[$key]['goods_id'];
					 $goods_info=$db->GetRow("SELECT * from  " . $ecs->table('goods') . " where goods_id=".$one[$key]['goods_id']);
					 $goods_name=$goods_info['goods_name'];
				     $goods_brief=$goods_info['goods_brief'];
				     $addtime=date('Y-m-d H:i:s',$one[$key]['add_time']);
				     $canshu[]=array('rec_id'=>$one[$key]['rec_id'],'id'=>$goods_info['goods_id'],'img'=>$goods_info['goods_thumb'],'goods_name'=>$goods_info['goods_name'],'market_price'=>$goods_info['market_price'],'shop_price'=>$goods_info['shop_price'],'click_count'=>$goods_info['click_count'],'add_time'=>$goods_info['add_time']);
				}
				
				

				$results = array('result'=>'10000', 'data'=>'查询成功','msg'=>$canshu);
			    exit($json->encode($results));
			}
			else
			{
				$results = array('result'=>'40003', 'data'=>'查询成功，但没有收藏记录');
			    exit($json->encode($results));
			}
		}
		
	}
	if($a=="update_user_info")
	{
		
		$field=$_POST['field'];//执行的操作，(如修改头像)
		$t_value=$_POST['t_value'];//值
		$token=$_POST["token"];
		$user_id=$db->GetOne("SELECT user_id from  " . $ecs->table('users') . " where question='".$token."'");
		if(empty($token))
		{
			$results = array('result'=>'40000', 'data'=>'没有登录');
			exit($json->encode($results));
		}
		
		if(empty($field))
		{
			$results = array('result'=>'40003', 'data'=>'没有要执行的动作');
			exit($json->encode($results));
		}
		else
		{
			//修改头像
			if($field=="user_img")
			{
	 
				   $hz=explode('/',$_FILES["uploadFile"]["type"]);

                   $size=$_FILES["uploadFile"]["size"]/1024;
				
				   $t_value = $_FILES["uploadFile"]["name"];
                 
					if(!move_uploaded_file($_FILES["uploadFile"]["tmp_name"],"../images/upload/".$t_value))
					{
					   $results = array('result'=>'40002', 'data'=>'没有接受到数据流');
					   exit($json->encode($results));
					}
					else
					{
						
						$updas=$db->query("UPDATE  " . $ecs->table('users') . " set `answer`='".$t_value."' WHERE user_id = '" . $user_id . "'");
				   
						 if($updas)
						  {
							 $img_url="/images/upload/".$t_value;
							 $results = array('result'=>'10000', 'data'=>'修改成功','img_url'=>$img_url);
						  }
						  else
						  {
							  $results = array('result'=>'40001', 'data'=>'修改失败');
						  }
						  exit($json->encode($results));
					}
		
			}
			
			//修改昵称
			if($field=="user_nick")
			{
				if(empty($t_value))
				{
					$results = array('result'=>'40002', 'data'=>'值为空');
			        exit($json->encode($results));
				}
				else
				{
				   $updas=$db->query("UPDATE  " . $ecs->table('users') . " set `alias`='".$t_value."' WHERE user_id = '" . $user_id . "'");
				   if($updas)
					{
					   $results = array('result'=>'10000', 'data'=>'修改成功');
					}
					else
					{
						$results = array('result'=>'40001', 'data'=>'修改失败');
					}
					exit($json->encode($results));
				}
			}
			
			//修改生日
			if($field=="user_birthday")
			{
				if(empty($t_value))
				{
					$results = array('result'=>'40002', 'data'=>'值为空');
			        exit($json->encode($results));
				}
				else
				{
				   $updas=$db->query("UPDATE  " . $ecs->table('users') . " set `birthday`='".$t_value."' WHERE user_id = '" . $user_id . "'");
				   if($updas)
					{
					   $results = array('result'=>'10000', 'data'=>'修改成功');
					}
					else
					{
						$results = array('result'=>'40001', 'data'=>'修改失败');
					}
					exit($json->encode($results));
				}
			}
			
			//修改密码(重点)
			if($field=="user_password")
			{
				   $old_password=$_POST['old_password'];
				   $new_password=$_POST['new_password'];
				   $two_new_password=$_POST['two_new_password'];
				   if(empty($old_password)||empty($new_password)||empty($two_new_password))
				   {
					   $results = array('result'=>'40003', 'data'=>'有数据为空');
			           exit($json->encode($results));
				   }
				   else
				   {
					   $user_info=$db->GetRow("SELECT * from  " . $ecs->table('users') . " where user_id='".$user_id."'");
					   
					   $ec_salt=$user_info['ec_salt'];
					   $g_old_password= MD5(MD5($old_password). $ec_salt);
					   
					   if($g_old_password!=$user_info['password'])
					   {
						   $results = array('result'=>'40004', 'data'=>'原密码错误');
			               exit($json->encode($results));
					   }
					   //原密码验证成功
					   else
					   {
						   if($two_new_password!=$new_password)
						   {
							   $results = array('result'=>'40005', 'data'=>'两次密码不同');
			                   exit($json->encode($results));
						   }
						   //新密码验证成功;
						   else
						   {
							  
							   $rg_new_password=MD5(MD5($new_password). $ec_salt);
							   
							   $updas=$db->query("UPDATE " . $ecs->table('users') . " set `password`='".$rg_new_password."' WHERE user_id = '" . $user_id . "'");
							   if($updas)
								{
									
								   $results = array('result'=>'10000', 'data'=>'修改成功');
								}
								else
								{
									$results = array('result'=>'40001', 'data'=>'修改失败');
								}
								exit($json->encode($results));
							   
						   }
					   }
				   }
				   
				
			}
			
			
		}
	}

function GetRandStr($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
        "3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 






//随机生成token;
  function genToken( $len = 16, $md5 = true ) {  
       # Seed random number generator  
          # Only needed for PHP versions prior to 4.2  
          mt_srand( (double)microtime()*1000000 );  
          # Array of characters, adjust as desired  
          $chars = array(  
              'Q', '@', '8', 'y', '%', '^', '5', 'Z', '(', 'G', '_', 'O', '`',  
              'S', '-', 'N', '<', 'D', '{', '}', '[', ']', 'h', ';', 'W', '.',  
              '/', '|', ':', '1', 'E', 'L', '4', '&', '6', '7', '#', '9', 'a',  
              'A', 'b', 'B', '~', 'C', 'd', '>', 'e', '2', 'f', 'P', 'g', ')',  
              '?', 'H', 'i', 'X', 'U', 'J', 'k', 'r', 'l', '3', 't', 'M', 'n',  
              '=', 'o', '+', 'p', 'F', 'q', '!', 'K', 'R', 's', 'c', 'm', 'T',  
              'v', 'j', 'u', 'V', 'w', ',', 'x', 'I', '$', 'Y', 'z', '*'  
          );  
          # Array indice friendly number of chars;  
          $numChars = count($chars) - 1; $token = '';  
          # Create random token at the specified length  
          for ( $i=0; $i<$len; $i++ )  
              $token .= $chars[ mt_rand(0, $numChars) ];  
          # Should token be run through md5?  
          if ( $md5 ) {  
              # Number of 32 char chunks  
              $chunks = ceil( strlen($token) / 16 ); $md5token = '';  
              # Run each chunk through md5  
              for ( $i=1; $i<=$chunks; $i++ )  
                  $md5token .= md5( substr($token, $i * 16 - 16, 16) );  
              # Trim the token  
              $token = substr($md5token, 0, $len);  
          } return $token;  
      }  

?>