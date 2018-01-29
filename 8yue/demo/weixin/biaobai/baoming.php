<?php
header('content-type:text/html;charset=utf8');
session_start();

//获取code
if (!isset($_SESSION['code'])) {
	$_SESSION['code'] = $_GET['code'];
}else{
	$code = $_SESSION['code'];
	unset($_SESSION['code']);
}

// 获取access_token
$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx65c96fa613ac4f0e&secret=5a62ea768f0ab48cd9e7a289515ae953&code='.$code.'&grant_type=authorization_code';

$access_token = file_get_contents($url);

$access_token = json_decode($access_token,true);

// 获取用户信息
$user_info = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token['access_token'].'&openid='.$access_token['openid'].'&lang=zh_CN';

$user_info = file_get_contents($user_info);

$user_info = json_decode($user_info,true);

echo "<pre>";
print_r($user_info);