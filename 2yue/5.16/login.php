<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="login_test.php" method="post">
		<h2>系统登录页面</h2>
		<table>
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="text" name="pwd"></td>
			</tr>
			<tr>
				<td>1周免登陆</td>
				<td><input type="checkbox" name="box" value="1">免登陆</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="登录"><input type="submit" value="重置"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>