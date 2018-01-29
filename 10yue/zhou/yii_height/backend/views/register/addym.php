<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?= Html::beginForm(['register/addym'], 'post')?>
	<h3>登录成功,设置接口域名</h3>
		<table>
			<tr>
				<td>appid</td>
				<td><input type="text" name="appid" value="<?=isset($appid) ? $appid : '';?>"></td>
			</tr>
			<tr>
				<td>appsecret</td>
				<td><input type="text" name="appsecret" value="<?=isset($appsecret) ? $appsecret : '';?>"></td>
			</tr>
			<tr>
				<td>接口安全域名</td>
				<td><input type="text" name="url"></td>
			</tr>
			<tr>
				<td></td>
				<td><?= Html::submitButton('Submit', ['class' => 'submit']) ?></td>
			</tr>
		</table>
		<a href="http://www.a.com/index.php?r=test">去测试</a>
	<?= Html::endForm();?>
</body>
</html>