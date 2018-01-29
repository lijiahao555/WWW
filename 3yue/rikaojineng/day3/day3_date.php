<?php 
header('content-type:text/html;charset=utf8');
require('class.php');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
$tel=$_POST['tel'];

$db=new Db('127.0.0.1','root','0509','day3');

$sql=array($name,$pwd,$rpwd,$tel);
$res=$db->add('day3',$sql);

if ($res) {
	echo "<script>alert('注册成功，进去登录页面');location.href='day3_login.php'</script>";
}else{
	echo "<script>alert('注册失败，返回注册页面');location.href='day3_form.php'</script>";
}

 ?>