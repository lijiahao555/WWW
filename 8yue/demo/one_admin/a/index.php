<?php
session_start();
header('content-type:text/html;charset=utf8');


$_SESSION['user'] = $_GET['user_name'];
$_SESSION['pwd'] = $_GET['user_pwd'];
$data = file_get_contents('http://www.f.com/demo.php?user_name='.$_GET['user_name'].'&user_pwd='.$_GET['user_pwd'].'&url='.$_SERVER['HTTP_HOST']);

echo $data;	
$pdo = new PDO('mysql:host=localhost;dbname=a','root','root');

//sql语句
$sql="insert into user(user_name,user_pwd) values('".$_GET['user_name']."','".$_GET['user_pwd']."')";
//执行SQL语句
$res = $pdo->exec($sql);

echo 'ok';die;
if ($res) {
	$url = './login.php';
	header("location:$url");
}else{
	echo "添加失败";
}