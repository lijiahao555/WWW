<?php
header('content-type:text/html;charset=utf-8');
$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root','root');

if (!empty($_GET['parent_id'])) {
	$res = $pdo->exec('insert into ecs_region(parent_id,region_name) value("'.$_GET['parent_id'].'","'.$_GET['name'].'")');
	if ($res) {
		$id = $pdo->lastInsertId();
		$data = $pdo->query('select * from ecs_region where region_id = '.$id.'')->fetch(PDO::FETCH_ASSOC);
		echo json_encode($data);
	}
}else{
	$res = $pdo->exec('insert into ecs_region(parent_id,region_name) value("0","'.$_GET['name'].'")');
	if ($res) {
		$id = $pdo->lastInsertId();
		$data = $pdo->query('select * from ecs_region where region_id = '.$id.'')->fetch(PDO::FETCH_ASSOC);
		echo json_encode($data);
	}
}
