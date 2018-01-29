<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<center>
	<form action="upload.php" method="post">
		<h1>修改密码页面</h1>
		<h3>欢迎<font color="red"><?php echo $_GET['name']?></font>用户登录</h3>
		<table border="3">
			<tr>
				<td>旧密码</td>
				<td><input type="text" name="pwd"></td>
			</tr>
			<tr>
				<td>新密码</td>
				<td><input type="text" name="rpwd"></td>
			</tr>
			<tr>
				<td>确认密码</td>
				<td><input type="text" name="rrpwd"></td>
			</tr>
			<tr>
			
				<td colspan="2" align="center"><input type="submit" value="修改密码"></td>
			</tr>
		<input type="hidden" name="name" value="<?php echo $_GET['name']?>">
		</table>
	</form>
</center>
</body>
</html>