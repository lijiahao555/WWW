<?php 
header('content-type:text/html;charset=utf8');
$id=$_GET['id'];

require('class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sql=$db->delete('day7',"id=$id");

if ($sql) {
	echo 1;
}else{
	echo 2;
}
 ?>

