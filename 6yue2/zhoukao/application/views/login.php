<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo site_url('Login/loginDo') ?>" method="post">
			<table border="1">
				<tr>
					<td>username</td>
					<td><input type="text" name="user_name"></td>
				</tr>
				<tr>
					<td>password</td>
					<td><input type="text" name="user_pwd"></td>
				</tr>
				<tr>
					<td><input type="submit" value="登录"></td>
					<td><input type="reset" value="重置"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>