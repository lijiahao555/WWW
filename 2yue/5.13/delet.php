<?php 
header('content-type:text/html;charset=utf8');
$id=$_GET['id'];
$id1=trim($id);
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="delete from zuce where id in($id)";
if (mysql_query($sql)) {
	header('location:show.php');
}else
{
	echo "删除失败";
}


 ?>