<?php

$pdo = new PDO('mysql:host=127.0.0.1;dbname=my_weiphp', 'root', 'root');

$token = $pdo->query("select * from weixin where token = '".$_GET['token']."'")->fetch();
if ($token) {
	echo '成功';
} else {
	echo '失败';
}