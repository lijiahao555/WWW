<?php
$redis = new Redis();

$redis->connect('127.0.0.1','6379');


$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root','root');

$sn = $redis->rpop('sn');

if ($sn) {
	$pdo->exec('insert into log(log_name,addtime) value("'.$sn.'","'.date('Y-m-d H:i:s').'")');
}else{
	$pdo->exec('insert into log(log_name,addtime) value("秒杀失败","'.date('Y-m-d H:i:s').'")');
}