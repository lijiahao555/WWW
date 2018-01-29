<?php
$post = $_POST;

$post['appsecret'] = md5($post['appsecret']);

$pdo = new PDO('mysql:host=127.0.0.1;dbname=my_weiphp', 'root', 'root');

$res = $pdo->exec("insert into weixin(appid, appsecret) value('".$post['appid']."', '".$post['appsecret']."')");

// if ($res) {
// 	header('location:http://www.c.com/c.html');
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table>
		<tr>
			<td>您的appid</td>
			<td><input type="text" value="<?=$post['appid']?>"></td>
		</tr>
		<tr>
			<td>您的appsecret</td>
			<td><input type="text" value="<?=$post['appsecret']?>"></td>
		</tr>
		<tr>
			<td><a href="/c.html">去设置安全域名</a></td>
			<td></td>
		</tr>
	</table>
</body>
</html>