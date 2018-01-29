<?php 
header('content-type:text/html;charset=utf8');
$id=$_GET['id'];
$shelf=$_GET['shelf'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="update shangping set shelf='$shelf' where id='$id'";

if (mysql_query($sql)) {
	echo "修改成功<a href='show.php'>返回页面</a>";
}else{
	echo "修改失败<a href='show.php'>返回页面</a>";
}


 ?>