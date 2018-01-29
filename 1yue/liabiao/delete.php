<?php 
header('content-type:text/html;charset=utf8');
$goods_id=$_GET['goods_id'];

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');

$sql="delete from goods where goods_id=$goods_id";

if (mysql_query($sql)) {
	echo "删除成功<a href='show.php'>返回显示页面</a>";
}else{
	echo "删除失败<a href='show.php'>返回显示页面</a>";
}


 ?>