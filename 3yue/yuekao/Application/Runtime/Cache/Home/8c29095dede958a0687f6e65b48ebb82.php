<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>月考登录页面</title>
</head>
<body>
<center>
	<form action="U('Index/addDo')" method="post">
		<table border="5">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="text" name="pwd"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="登录">&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="忘记密码"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>