<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('student');
$id=$_GET['id'];
$staste=$_GET['staste'];

$sql="update student set staste=$staste where id=$id";

if (mysql_query($sql)) {
	echo "修改成功<a href='hehe.php'>返回界面</a>";
}else{
	echo "修改失败<a href='hehe.php'>返回界面</a>";
}
 ?>