<?php
header('content-type:text/html;charset=utf-8');

// $pdo = new PDO('mysql:host=localhost;dbname=iwebshop','root', 'root');

// $sql = 'SELECT * FROM goods WHERE id = '.$_GET['id'];

// $res = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

$redis = new Redis();

$redis->connect('127.0.0.1','6379');

if ($redis->rpop('ms'.$_GET['id'])) {
	echo "<script>alert('秒杀成功');location.href='http://localhost/8yue/demo/rikao/week3/bayu/product_page.html?id=".$_GET['id']."'</script>";
}else{
	echo "<script>alert('没有商品');location.href='http://localhost/8yue/demo/rikao/week3/bayu/product_page.html?id=".$_GET['id']."'</script>";
}