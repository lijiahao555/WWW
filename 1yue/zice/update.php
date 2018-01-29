<?php 
header('content-type:text/html;charset=utf8');

$news_status=$_GET['news_status'];
$news_id=$_GET['news_id'];


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="update news set  news_status=$news_status where news_id=$news_id";

if (mysql_query($sql)) {
	echo "修改成功<a href='show.php'>返回界面</a>";
}else{
	echo "修改失败<a href='show.php'>返回界面</a>";
}




 ?>