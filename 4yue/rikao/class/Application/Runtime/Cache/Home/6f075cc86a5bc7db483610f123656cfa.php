<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo U('Admin/adminDo');?>" method="post">
			<table border="5">
				<tr>
					<td>姓名</td>
					<td><input type="text" name="admin_name"></td>
				</tr>
				<tr>
					<td>密码</td>
					<td><input type="password" name="admin_pwd"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="checkbox" name="admin_7" value="7">7天免登陆</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="登录"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>