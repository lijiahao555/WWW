<?php 
header('content-type:text/html;charset=utf8');
$id=$_GET['id'];
$a_important=$_GET['a_important'];


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
$sql="update article set a_important=$a_important where a_id=$id";


if (mysql_query($sql)) {
	echo "<a href='show.php'>修改成功</a>";
}else{
	echo "<a href='show.php'>修改失败</a>";
}




 ?>