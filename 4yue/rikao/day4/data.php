<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('day4rikao');
mysql_query('set names utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$aa="select * from admin where name='$name'";


$res=mysql_query($aa);

if ($res) {
	// if ($sql['pwd']==$pwd) {
		echo "成功";
		header('refresh:2;url=show.php');
		setcookie('name',$name);
	// }else{
	// 	echo "密码错误";
	// 	header('refresh:2;url=form.html');
	// }
}else{
	echo "账号错误";
	header('refresh:2;url=form.html');
}



 ?>