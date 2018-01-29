<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
<center>
	<h1>Login</h1>
</center>
	<form action="<?= site_url('Login/login_c/user_login') ?>" method='post'>
		<table border="1" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td>account:</td>
				<td>
					<input type="text" name="user_name">
				</td>
			</tr>
			<tr>
				<td>password:</td>
				<td>
					<input type="text" name="user_pwd">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Login">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>