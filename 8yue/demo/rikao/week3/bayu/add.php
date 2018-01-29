<?php
header('content-type:text/html;charset=utf-8');

$_POST['date'] = explode(' - ', $_POST['date']);

$pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root', 'root');

$sql = 'INSERT INTO goods(name,num,price,status,start,stop) VALUES("'.$_POST['name'].'","'.$_POST['seckill_num'].'","'.$_POST['price'].'","'.$_POST['status'].'","'.$_POST['date'][0].'","'.$_POST['date'][1].'")';

$res = $pdo->exec($sql);
$id = $pdo->lastInsertId();

if ($res) {
	
	$redis = new Redis();

	$redis->connect('127.0.0.1','6379');

	for ($i=0; $i < $_POST['seckill_num'] ; $i++) {
		$redis->Lpush('ms'.$id,date('YmdHis').rand(0,999999));
	}

	echo "<script>alert('添加成功');location.href='./index.html'</script>";
}else{
	echo '失败';
}