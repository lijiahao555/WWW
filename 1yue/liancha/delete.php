<?php 
header('content-type:text/html;charset=utf8');
$delete=$_GET['delete'];

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="delete from article where a_id=$delete";

if (mysql_query($sql)) {
	echo "<a href='show.php'>删除成功</a>";
}else{
	echo "<a href='show.php'>删除失败</a>";
}

 ?>