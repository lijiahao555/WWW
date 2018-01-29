<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$brand=$_POST['brand'];
$price=$_POST['price'];
$set=$_POST['set'];
$intro=$_POST['intro'];


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="insert into goods values(null,'$name','$brand','$price','$set','$intro')";
if (mysql_query($sql)) {
	echo "<a href='lianshabi.php'>添加成功</a>";
}else{
	echo "添加失败";
}

 ?>