<?php
use yii\helpers\Url;
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
			<td><input type="text" value="<?=$appid;?>"></td>
		</tr>
		<tr>
			<td>您的appsecret</td>
			<td><input type="text" value="<?=$appsecret;?>"></td>
		</tr>
		<tr>
			<td><a href="<?=Url::toRoute(['register/addym', 'appid'=>$appid, 'appsecret'=>$appsecret])?>">去设置安全域名</a></td>
			<td></td>
		</tr>
	</table>
</body>
</html>