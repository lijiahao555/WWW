<?php 
header('content-type:text/html;charset=utf8');
$name=!empty($_GET['name'])?$_GET['name']:'';

$pwd=!empty($_GET['pwd'])?$_GET['pwd']:'';


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');

$sql="select * from demo3 where name='$name'";

$res=mysql_query($sql);
$arr=mysql_fetch_assoc($res);
if ($arr==false) {
	echo 1;die;
}
if ($arr['pwd']!=$pwd) {
	echo 2;die;
}
setcookie('name', $name);
setcookie('name',$name);
echo 3;  

 ?>
