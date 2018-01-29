<?php 
header('content-type:text/html;charset=utf8');

$a_titile=$_POST['a_titile'];
$T_id=$_POST['T_id'];
$a_important=$_POST['a_important'];
$a_is_show=$_POST['a_is_show'];
$a_author=$_POST['a_author'];
$a_author_email=$_POST['a_author_email'];
$a_content=$_POST['a_content'];
$a_desc=$_POST['a_desc'];


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="insert into article values(null,'$a_titile','$T_id','$a_important','$a_is_show','$a_author','$a_author_email','$a_content','$a_desc')";

if (mysql_query($sql)) {
	echo "添加成功<a href='form.php'>返回添加页表</a>";
}else{
	echo "添加失败<a href='form.php'>返回添加列表</a>";
}



 ?>