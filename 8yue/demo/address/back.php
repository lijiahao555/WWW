<?php
header('content-type:text/html;charset=utf-8');
$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root','root');
$res = $pdo->query('select * from ecs_region where region_id = '.$_GET['parent_id'])->fetch();
$res = $pdo->query('select * from ecs_region where parent_id = '.$res['parent_id']);
$data = $res->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
