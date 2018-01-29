<?php 
header('content-type:text/html;charset=utf8');
require('class.php');
$username=$_POST['name'];

$z_name="/^[\x{4e00}-\x{9fa5}]{1,5}$/u";
if (preg_match($z_name, $username)==0) {
	echo "用户名错误";die;
}

$time=date('Y-m-d');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sql="insert into day2 values(null,'$username','$time')";


if ($db->add($sql)) {
	echo "成功";
}else{
	echo "失败";
}

 ?>