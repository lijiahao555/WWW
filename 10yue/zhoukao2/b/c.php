<?php

$post = $_POST;

$pdo = new PDO('mysql:host=127.0.0.1;dbname=my_weiphp', 'root', 'root');

$res = $pdo->query("select * from weixin where appid = '".$post['appid']."' and appsecret = '".$post['appsecret']."'")->fetch();

if (is_array($res)) {
	$result = $pdo->exec('update weixin set url = "'.$post['url'].'" where id = "'.$res['id'].'"');
	if ($result) {
		echo "<script>alert('设置成功，去开发端');location.href='http://www.a.com/a.php'</script>";
	}
}else{
	echo "<script>alert('APPID或appscript错误');location.href='http://www.b.com/c.html'</script>";
}
