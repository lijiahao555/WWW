<?php 
header('content-type:text/html;charset=utf8');
$name=$_GET['name'];
$number=$_GET['number'];
$price=$_GET['price'];
$type=$_GET['type'];
$count=$_GET['count'];
$shang=$_GET['shang'];

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="insert into demo4 values(null,'$name','$number','$price','$type','$count','$shang')";
if (mysql_query($sql)) {
	echo 1;
}else{
	echo 2;
}

 ?>