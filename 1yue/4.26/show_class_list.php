<?php 
header('content-type:text/html;charset=utf8'); 
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
$a=$_GET['a'];
$sql="delete from books where id=$a";
if (mysql_query($sql)) {
	echo "<a href='add_class.php'>删除成功</a>";
}else{
	echo "<a href='add_class.php'>删除失败</a>";
}


 ?>