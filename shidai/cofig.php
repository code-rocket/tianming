<?
  $mysql_server_name='localhost:3306'; //改成自己的mysql数据库服务器
$mysql_username='root'; //改成自己的mysql数据库用户名   
$mysql_password='a02d122dd2'; //改成自己的mysql数据库密码   
$mysql_database='tianming'; //改成自己的mysql数据库名 


$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting") ; //连接数据库   
mysql_query("set names 'utf8'"); //数据库输出编码.   
mysql_select_db($mysql_database); //打开数据库   
?>