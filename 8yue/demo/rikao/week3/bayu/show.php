<?php
header('content-type:text/html;charset=utf-8');

if (empty($_GET['id'])) {
	$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root', 'root');

	$sql = 'SELECT * FROM goods';

	$res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($res);
}else{
	$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root', 'root');

	$sql = 'SELECT * FROM goods WHERE id = '.$_GET['id'];

	$res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

	echo json_encode($res);
}