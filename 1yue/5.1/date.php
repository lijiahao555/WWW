<?php 
header('content-type:text/html;charset=utf8');
$User_name=$_POST['User_name'];
$User_sex=$_POST['User_sex'];
$User_position=$_POST['User_position'];
$User_education=$_POST['User_education'];
$User_desc=$_POST['User_desc'];


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="insert into user values(null,'$User_name','$User_sex','$User_position','$User_education','$User_desc')";

if (mysql_query($sql)) {
	echo "添加成功<a href='show.php'>进入页面</a>";
}else{
	echo "添加失败<a href='form.php'>返回重新添加</a>";
}



 ?>