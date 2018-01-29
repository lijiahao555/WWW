<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$class=$_POST['class'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$city=$_POST['city'];
$school=$_POST['school'];
$course=$_POST['cour'];
$cont=$_POST['cont'];

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="insert into zuce values(null,'$name','$pwd','$class','$sex','$email','$city','$school','$course','$cont')";

if (mysql_query($sql)) {
	echo "添加成功<a href='show.php'>进入页面</a>";
}else{
	echo "添加失败<a href='demo3.html'>返回页面</a>";
}

 ?>