<?php

$post = $_GET;

$post['appsecret'] = md5($post['appsecret']);

$pdo = new PDO('mysql:host=127.0.0.1;dbname=my_weiphp', 'root', 'root');

$appid = $pdo->query("select * from weixin where appid = '".$post['appid']."'")->fetch();

if (is_array($appid)) {

	$appsecret = $pdo->query("select * from weixin where appid = '".$post['appid']."' and appsecret = '".$post['appsecret']."'")->fetch();

	if (is_array($appsecret)) {

		$url = $pdo->query("select * from weixin where appid = '".$post['appid']."' and appsecret = '".$post['appsecret']."' and url = '".$_SERVER['HTTP_HOST']."'")->fetch();
		if (is_array($url)) {
			$rand = rand(000,555);

			$pdo->exec('update weixin set token = "'.($url['appid'].$rand).'" where id = "'.$url['id'].'"');

			$data = ['00000' => 'success', 'access_token' => $url['appid'].$rand];
			echo json_encode($data);
		} else {
			$data = ['40003' => 'url\cuowu'];
			echo json_encode($data);
		}

	} else {
		$data = ['40002' => 'appsecret\cuowu'];
		echo json_encode($data);
	}
} else {
	$data = ['40001' => 'appid\cuowu'];
	echo json_encode($data);
}
