<?php 
header('content-type:text/html;charset=utf8');

$name=$_POST['name'];
$rpwd=$_POST['rpwd'];
$sex=$_POST['sex'];
$class=$_POST['class'];
$staste=$_POST['staste'];
$age=$_POST['age'];

$motto=$_POST['motto'];

$hobby=implode(",", $_POST['hobby']);


mysql_connect('127.0.0.1','root','0509');
mysql_select_db('student');
mysql_query('set names utf8');

$sql="insert into student values(null,'$name','$rpwd','$sex','$class','$staste','$age','$hobby','$motto')";
//mysql_query($sql);


 if (mysql_query($sql)) {
 	echo "<a href='hehe.php'>信息添加成功</a>";
}else{
 	echo "添加失败";
 }


 ?>