<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('day4rikao');
mysql_query('set names utf8');
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
$rrpwd=$_POST['rrpwd'];
if ($rpwd!=$rrpwd) {
	echo "2次密码不一致";
	header('refresh:2;url=up.php');
	die;
}
$name=$_POST['name'];
// echo $name;die;
$sql="select * from admin where name='$name' && pwd='$pwd'";
// echo $sql;die;
$ss=mysql_query($sql);

if ($ss) {
	$res="update admin set pwd='$rpwd' where name='$name'";
	$r=mysql_query($res);
	if($r==0) {
		echo 2;
	}else{
		echo 1;
	}
}else{
	echo "旧密码不正确";
	header('refresh:2;url=up.php');
}


 ?>