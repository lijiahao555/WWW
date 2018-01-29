<?php
header('content-type:text/html;charset=utf8');

$url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx65c96fa613ac4f0e&secret=5a62ea768f0ab48cd9e7a289515ae953&code='.$_GET['code'].'&grant_type=authorization_code';

$access_token = file_get_contents($url);

$access_token = json_decode($access_token,true);


$user_url = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token['access_token'].'&openid='.$access_token['openid'].'&lang=zh_CN';

$user_info = file_get_contents($user_url);

$user_info = json_decode($user_info,true);


echo "姓名：".$user_info['nickname'];echo "<br />";
echo "城市：".$user_info['city'];echo "<br />";
echo "头像：".'<img src="'.$user_info['headimgurl'].'" width="50">';echo "<br />";
