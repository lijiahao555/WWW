<?php 
header('content-type:text/html;charset=utf8');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('day4rikao');
mysql_query('set names utf8');
$name=$_POST['name'];
$pwd=$_POST['pwd'];
$rpwd=$_POST['rpwd'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$box=$_POST['box'];
$b=implode($box,',');

$sql="insert into day3 values(null,'$name','$pwd','$rpwd','$email','$b','$tel')";

if (mysql_query($sql)) {
	echo "添加成功";
}else{
	echo "添加失败";
}

 ?>