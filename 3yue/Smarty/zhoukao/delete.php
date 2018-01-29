<?php 
header('content-type:text/html;charset=utf8');
$id=$_GET['id'];
require('./class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sql=$db->delete('zhoukao2',"id=$id");
if ($sql) {
	echo "删除成功，正在跳转...";
	header('refresh:2;url=show.php');
}else{
	echo "删除失败，正在跳转...";
	header('refresh:2;url=show.php');
}

 ?>