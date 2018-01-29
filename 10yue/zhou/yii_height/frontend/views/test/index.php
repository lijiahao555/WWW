<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>获取access_token</title>
</head>
<body>
	<h1>获取access_token</h1>
		<table>
			<tr>
				<td>appid</td>
				<td><input type="text" id="appid"></td>
			</tr>
			<tr>
				<td>appsecret</td>
				<td><input type="text" id="appsecret"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" id="sub" value="获取"></td>
			</tr>
		</table>
		<font color="red" id='red'></font>
</body>
</html>
<?= Html::jsFile('@web/js/jquery.js') ?>
<script>
	$('#sub').click(function() {
		appid = $('#appid').val();
		appsecret = $('#appsecret').val();
		$.ajax({
			url: "<?=Url::to(['test/testdo'])?>",
			type: 'post',
			dataType: 'json',
			data: {appid: appid, appsecret:appsecret},
			success:function(msg){
				if (msg['errorcode'] == 0) {
					$('#red').html("错误代码:"+msg['errorcode']+'<br/> access_token：'+msg['access_token']+'<br/> 有效时间:'+msg['expires_in']+'秒');
				} else {
					$('#red').html("错误代码:"+msg['errorcode']+'<br/> 错误提示'+msg['text']);
				}
			}
		})
	});
</script>