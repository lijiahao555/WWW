<?php 
header('content-type:text/html;charset=utf8');
$name=$_GET['name'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('demo');
mysql_query('set names utf8');

$sql="select * from demo2 where name='$name'";

$res=mysql_query($sql);
$date=mysql_fetch_assoc($res);
if ($date==false) {
	//代表表里不存在
	echo 1;
}else{
	echo 2;
}

 ?>