<?php 
header('content-type:text/html;charset=utf8');
$name=$_POST['name'];
$sex=$_POST['sex'];
$type=$_POST['type'];
$file=$_FILES;
$count=$_POST['count'];
$box=implode($_POST['box'],',') ;

mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');

if ($file['picture']['error']==0) {
	$file_name=time().rand(0,20000);
	$houzhui=substr($file['picture']['name'],strrpos($file['picture']['name'],'.'));
	$team='./img/'.$file_name.$houzhui;
}
if (!file_exists('./img/')) {
	mkdir('./img/',0777);
}
move_uploaded_file($file['picture']['tmp_name'], $team);


$sql="insert into rikao values(null,'$name','$sex','$type','$team','$count','$box')";

if (mysql_query($sql)) {
	header('location:show.html');
}else{
	header('location:demo.html');
}



 ?>