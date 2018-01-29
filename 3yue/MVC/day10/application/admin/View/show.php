<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<h2>欢迎<font color="red"><?php echo $_COOKIE['name'] ?></font>登录</h2>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>密码</td>
		</tr>
		<?php 
		foreach ($sql as $key => $v) {?>
			<tr>
				<td><?php echo $v['id'] ?></td>
				<td><?php echo $v['name'] ?></td>
				<td><?php echo $v['pwd'] ?></td>
			</tr>
		<?php
		}
		 ?>
	</table>
</center>
</body>
</html>