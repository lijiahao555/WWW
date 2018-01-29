<?php 
header('content-type:text/html;charset=utf8');
$news_title=$_POST['news_title'];
$type_id=$_POST['type_id'];
$news_author=$_POST['news_author'];
$news_file=$_FILES;
$news_content=$_POST['news_content'];
$news_addtime=date('Y-m-d H-i-s');
mysql_connect('127.0.0.1','root','0509');
mysql_select_db('exam');
mysql_query('set names utf8');


if ($news_file['news_file']['error']==0) {
	$name=time().rand(0,20000);
	$houzhui=substr($news_file['news_file']['name'], strrpos($news_file['news_file']['name'], '.'));
	$team='./img/'.$name.$houzhui;
}
if (!file_exists('./img/')) {
	mkdir('./img/');
}
move_uploaded_file($news_file['news_file']['tmp_name'], $team);



$sql="insert into news values(null,'$news_title','$type_id','$news_author','$news_content','$team','$news_addtime')";

if (mysql_query($sql)) {
	header('location:show.html');
}else{
	header('location:show.php');
}

 ?>