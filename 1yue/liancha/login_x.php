<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['username'];
$pwd=$_POST['pwd'];

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('lianxi');
mysql_query('set names utf8');
$sql="select * from admin where admin_name='$name' and admin_pwd='$pwd'";
$res=mysql_query($sql);
$arr=mysql_fetch_assoc($res);

if ($arr) {
	echo "登录成功<a href='show.php'>进入数据库</a>";
}else{
	echo "登录失败<a href='login.php'>返回登录页面</a>";
}



 ?>