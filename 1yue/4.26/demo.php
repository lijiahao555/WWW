<?php 
header('content-type:text/html;charset=utf8'); 

$name=$_POST['name'];
$price=$_POST['price'];
$off=$_POST['off'];
$teacher=$_POST['teacher'];


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="insert into books values(null,'$name','$price','$off','$teacher')";

if (mysql_query($sql)) {
	echo "<a href='add_class.php'>添加成功</a>";
}else{
	echo "<a href=practice.php>添加失败</a>";
}


 ?>