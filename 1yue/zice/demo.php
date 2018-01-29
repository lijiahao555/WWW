<?php 
header('content-type:text/html;charset=utf8');

$news_title=$_POST['news_title'];
$news_type=$_POST['news_type'];
$news_author=$_POST['news_author'];
$news_status=$_POST['news_status'];
$news_content=$_POST['news_content'];
$news_addtime=$_POST['news_addtime'];

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="insert into news values(null,'$news_title','$news_type','$news_author','$news_status','$news_content','$news_addtime')";

if (mysql_query($sql)) {
	echo "<a href='show.php'>添加成功</a>";
}else{
	echo "<a href='show.php'>添加失败</a>";
}





 ?>