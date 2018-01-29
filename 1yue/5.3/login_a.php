<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$sql="select * from login where name='$name'";
$res=mysql_query($sql);
$arr=mysql_fetch_assoc($res);
if ($arr) {
	if ($arr['pwd']==$pwd) {
		echo "登录成功<a href='show.php'>进入数据页面</a>";
	}else{
		echo "密码错误<a href='login.php'>返回重新登录</a>";
	}
}else{
	echo "用户名不正确<a href='login.php'>返回重新登录</a>";
}

 ?>