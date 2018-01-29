<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="date.php" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>性别</td>
				<td>
				<input type="radio" name="sex" value="男">男
				<input type="radio" name="sex" value="女">女
				</td>
			</tr>
			<tr>
				<td>种类</td>
				<td>
					<select name="type" id="">
						<option value="软工">软工</option>
						<option value="云计算">云计算</option>
						<option value="房山">房山</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>图片</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td><input type="submit"></td>
				<td></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>