<?php
header('content-type:text/html;charset=utf-8');
$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root','root');
$res = $pdo->query('select * from ecs_region where parent_id = '.$_GET['parent_id'])->fetch();
if (empty($res)) {
	echo $pdo->exec('delete from ecs_region where region_id = '.$_GET['parent_id']);
}else{
	$res = $pdo->exec('delete from ecs_region where region_id = '.$_GET['parent_id']);
	$result = $pdo->exec('delete from ecs_region where parent_id = '.$_GET['parent_id']);
	if ($res && $result) {
		echo 1;
	}
}
