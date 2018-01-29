<?php 
header('content-type:text/html;charset=utf8');
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
$email=$_POST['email'];
$rname=$_POST['rname'];

$z_username="/^[a-z0-9]{4,16}$/";
if (preg_match($z_username,$username)==0) {
	echo "用户名错误";die;
}

$z_pwd="/^[a-z0-9]{6,16}$/";
if (preg_match($z_pwd,$pwd)==0) {
	echo "密码错误";die;
}

if ($rpwd!=$pwd) {
	echo "俩次密码不一致";die;
}

$z_email="/^\d{4,11}@qq[.]com$/";
if (preg_match($z_email,$email)==0) {
	echo "邮箱错误";die;
}

// $z_rname="/^[\x{4e00}-\x{9fa5}]{2,16}$/u";
// if (preg_match($z_rname,$rname)==0) {
// 	echo "昵称错误";die;
// }


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');
$sql="insert into zhoukao3 values(null,'$username','$pwd','$rpwd','$email','$rname')";
if (mysql_query($sql)) {
	header('location:show.php');
}else{
	header('location:demo.html');
}



 ?>