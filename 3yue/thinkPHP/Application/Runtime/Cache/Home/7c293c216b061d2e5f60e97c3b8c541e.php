<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="/3yue/thinkPHP/index.php/Home/Xiaoyan/addDo" method="post">
		<table border="1">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="text" name="pwd"></td>
			</tr>
			<tr>
				<td>验证码</td>
				<td><input type="text" name="xiaoyan"><img src="/3yue/thinkPHP/index.php/Home/Xiaoyan/evrify" onclick="xiaoyan(this)" height="50" width="50"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="确定"></td>
			</tr>
		</table>
	</form>
</center>
<script>
function xiaoyan(th){

	var th.src="/3yue/thinkPHP/index.php/Home/Xiaoyan/evrify"+Math.random();
	
}
</script>
</body>
</html>