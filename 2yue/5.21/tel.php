<?php 
header('content-type:text/html;charset=utf8');
$id=rtrim($_GET['id'],',');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="delete from demo2 where id in ($id)";
$res=mysql_query($sql);
if ($res) {
	echo 1;
}else{
	echo 2;
}


 ?>