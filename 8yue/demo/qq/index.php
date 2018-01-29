<?php
//编写获取 access_token 的路径
$access_token_url = 'https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=101353491&client_secret=df4e46ba7da52f787c6e3336d30526e4&code='.$_GET['code'].'&redirect_uri=http://www.iwebshop.com/index.php';

//执行
$data = file_get_contents($access_token_url);

//分割返回的access_token
$res = explode('&', $data);
$access_token = explode('=', $res[0]);

//编写获取 open_id 的url
$open_id_url = "https://graph.qq.com/oauth2.0/me?access_token=".$access_token[1]."";

//执行  返回值带 js callback
$response = file_get_contents($open_id_url);

//截取 获取php json格式
$lpos = strpos($response, "(");
$rpos = strrpos($response, ")");
$response  = substr($response, $lpos + 1, $rpos - $lpos -1);

//处理json数据返
$msg = json_decode($response,true);

//编写跳转到项目路径
// $url = "http://www.myiwebshop.com/index.php?controller=site&action=oauth_login_act&open_id=".$msg['openid']."";

$url = "http://www.live.com/index.php/login/qq2?open_id=".$msg['openid']."&access_token=".$access_token[1]."&appid=".$msg['client_id']."";

//跳转
header("location:$url");






















// <!DOCTYPE HTML>
// <html lang="en">
// <head>
// 	<meta charset="UTF-8">
// 	<title></title>
// </head>
// <body>
// <h2>欢迎使用QQ Connet SDK For PHP 2.1</h2>
// 请先<a href="install/">设置配置项</a><br />
// 或者打开doc目录下，阅读我们的文档
// </body>
