<?php
header('content-type:text/html;charset=utf-8');
$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root','root');

if (empty($_GET['parent_id'])) {
	$res = $pdo->query('select * from ecs_region where parent_id = 0');
	$data = $res->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($data);
}else{
	$res = $pdo->query('select * from ecs_region where parent_id = '.$_GET['parent_id']);
	$data = $res->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($data);
}