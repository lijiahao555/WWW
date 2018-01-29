<?php
header('content-type:text/html;charset=utf8');
//实例化redis
$redis = new Redis();

//连接redis
$redis->connect('127.0.0.1','6379');

//实例化PDO
$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root','root');

$data = $pdo->query('select * from iwebshop_miaosha where id=5')->fetch();

if ($sn = $data['num'] > 0) {
	for ($i=0; $i < $data['num'] ; $i++) { 
		$redis->lpush('sn','sn_'.time().rand(1000,999999));
	}
}