<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<form action="<?php echo site_url('Admin/adminDo') ?>" method="post">
				<tr>
					<td>用户名</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="password" name="pwd"></td>
				</tr>
				<tr>
					<td><input type="submit" value="登录"></td>
				</tr>
			</form>
		</table>
	</center>
</body>
</html>