<?php 
header('content-type:text/html;charset=utf8');
$id=$_GET['id'];
$name=$_GET['name'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');

$sql="update goods set goods_state=$name where goods_id=$id";

if (mysql_query($sql)) {
	echo "修改成功<a href='show.php'>返回显示页面</a>";
}else{
	echo "修改失败<a href='show.php'>返回显示页面</a>";
}





 ?>