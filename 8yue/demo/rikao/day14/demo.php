<?php
$lun = $_GET['lun'];


$redis = new Redis();
$redis->connect('127.0.0.1','6379');


$redis->lpush('匿名用户',$lun.' '.date('Y-m-d H:i:s'));

$data['匿名用户'] = $redis->rpop('匿名用户');

echo json_encode($data);