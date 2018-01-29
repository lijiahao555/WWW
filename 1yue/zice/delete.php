<?php 

header('content-type:text/html;charset=utf8');

$id=$_GET['a'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="delete from news where news_id=$id";

if (mysql_query($sql)) {
	echo "删除成功<a href='show.php'>返回界面</a>";
}else{
	echo "删除失败<a href='show.php'>返回界面</a>";
}

 ?>