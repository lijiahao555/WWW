<?php 
header('content-type:text/html;charset=utf8');

$a_is_show=$_GET['a_is_show'];
$did=$_GET['did'];

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');

$res="update article set a_is_show=$a_is_show where a_id=$did";

if (mysql_query($res)) {
	echo "<a href='show.php'>修改成功</a>";
}else{
	echo "<a href='show.php'>修改失败</a>";
}


 ?>