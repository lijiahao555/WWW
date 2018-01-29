<?php 
header('content-type:text/html;charset=utf8');

$number=$_POST['number'];
$name=$_POST['name'];
$date=$_POST['date'];
$price=$_POST['price'];
$rprice=$_POST['rprice'];
$shelf=$_POST['shelf'];
$cont=$_POST['cont'];
$intro=$_POST['intro'];
$type=$_POST['type'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="insert into shangping values(null,'$number','$name','$date','$type','$price','$rprice','$shelf','$cont','$intro')";

if (mysql_query($sql)) {
	echo "添加成功<a href='show.php'>进入展示页面查看</a>";
}else{
	echo "添加失败<a href='form.php'>返回添加列表</a>";
}







 ?>