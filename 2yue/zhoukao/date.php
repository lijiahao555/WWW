<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
$username=$_POST['username'];
$shenfen=$_POST['shenfen'];
$email=$_POST['email'];
$box=$_POST['box'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="insert into zhoukao values(null,'$name','$pwd','$rpwd','$username','$shenfen','$email','$box')";
if (mysql_query($sql)) {
	echo "添加成功<a href='show.php'>进入展示页面</a>";
}else{
echo "添加失败<a href='zhoukao.html'>返回添加页面</a>";
}



 ?>