<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$id=$_GET['id'];
$idd=$_GET['idd'];
$idx=$_GET['idx'];

$sql="update demo2 set hh=$id where hh='$idx'";
if (mysql_query($sql)) {
	echo 1;
}else{
	echo 2;
}


 ?>