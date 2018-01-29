<?php 
header('content-type:text/html;charset=utf8'); 

$name=$_POST['name'];
$age=$_POST['age'];
$class=$_POST['class'];
$grade=$_POST['grade'];



mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="insert into class values(null,'$name','$age','$class','$grade')";

if (mysql_query($sql)) {
	echo "<a href='show.php'>添加成功</a>";
}else{
	echo "<a href='show.php'>添加失败</a>";
}


 ?>