<?php
define('IN_ECS', true);

require('./init.php');
require_once(ROOT_PATH . 'includes/cls_json.php');
$json = new JSON;



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
          $sql = "INSERT INTO `ecs_users`(user_name,mobile_phone,password,reg_time) VALUES ('".$_POST['mobile_phone']."','".$_POST['mobile_phone']."','".md5($_POST['password'])."','$posttime')";
         if($db->query($sql)){
            $results = array('result'=>'10000', 'data'=>'注册成功');
            exit($json->encode($results));
        }
          }
       }
    }elseif ($_POST['a']=='login') {
     if(empty($_POST['mobile_phone'])||empty($_POST['password'])){
         $results = array('result'=>'20002', 'data'=>'信息不完整,注册失败');
         exit($json->encode($results));
       }
       if ($_POST['mobile_phone']) {
         $one=$db->GetRow("SELECT * from  `ecs_users` where mobile_phone=".$_POST['mobile_phone']." and password='".md5($_POST['password'])."'");
         if ($one) {
          $results= array('result'=>"10000",'data'=>'登录成功',"msg"=>$one);
          exit($json->encode($results));
         }else{
          $results= array('result'=>"40004",'data'=>'用户名或密码错误');
          exit($json->encode($results));
         }
       }
    }



?>