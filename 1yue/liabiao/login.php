<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('moni');
mysql_query('set names utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$sql="select * from admin where name='$name'";
$res=mysql_query($sql);
$arr=mysql_fetch_assoc($res);

if ($arr) {
	if ($arr['pwd']==$pwd) {
		echo "<a href='show.php'>登陆成功</a>";
	}else{
		echo "<a href='submit.php'>密码错误</a>";
	}
}else{
	echo "用户名不存在<a href='submit.php'>登陆失败</a>";
}



?>