<?php

$redis = new Redis();

$redis->connect('127.0.0.1', '6379');

// for ($i=0; $i < 500; $i++) {
// 	$redis->lpush('111', rand(11111111111,999999999999999));
// }
// die;
$pdo = new pdo('mysql:host=localhost;dbname=iwebshop', 'root', 'root');
$danwei = $redis->rpop('111');
if (!empty($danwei)) {
	$pdo->exec('insert into log(log_name,addtime) value("'.$danwei.'","'.date('Y-m-d H:i:s').'")');
}else{
	$pdo->exec('insert into log(log_name,addtime) value("秒杀失败","'.date('Y-m-d H:i:s').'")');
}