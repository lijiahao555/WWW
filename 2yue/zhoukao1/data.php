<?php 
header('content-type:text/html;charset=utf8');
$username=$_POST['username'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
$xuan=$_POST['xuan'];


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="insert into demo values(null,'$username','$email','$pwd','$rpwd','$xuan')";

if (mysql_query($sql)) {
	echo "添加成功<a href='show.php'>进入列表</a>";
}else{
	echo "添加失败<a href='form.php'>返回重新添加</a>";
}



 ?>