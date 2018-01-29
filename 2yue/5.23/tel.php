<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$id=rtrim($_GET['id'],',');

$sql="delete from demo2 where id in ($id)";
if (mysql_query($sql)) {
	echo 1;
}else{
	echo 2;
}


 ?>