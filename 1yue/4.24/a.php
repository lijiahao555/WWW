<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('student');

$a=$_GET['a'];
$sql="delete from student where id=$a";
if (mysql_query($sql)) {
	echo "删除成功<a href='hehe.php'>返回界面</a>";
}else{
	echo "删除失败<a href='hehe.php'>返回界面</a>";
}


 ?>