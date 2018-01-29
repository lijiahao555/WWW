<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>周考2</title>
</head>
<body>
<center>
	<form action="date.php" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>品牌名称</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>品牌网址</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>商品LOGO</td>
				<td><input type="file" name="logo"></td>
			</tr>
			<tr>
				<td>商品描述</td>
				<td><textarea name="count" cols="30" rows="5"></textarea></td>
			</tr>
			<tr>
				<td>排序</td>
				<td><input type="text" name="oder"></td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input type="radio" name="show" value="是">是
					<input type="radio" name="show" value="否">否
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="确定"><input type="reset" value="重置"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>