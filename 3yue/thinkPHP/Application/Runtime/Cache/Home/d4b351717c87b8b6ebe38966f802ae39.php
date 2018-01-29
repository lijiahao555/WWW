<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="/3yue/thinkPHP/index.php/Home/Books/addDo" method="post" enctype="multipart/form-data">
		<table border="8">
			<tr>
				<td>图书名称</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>图书价格</td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td>图书作者</td>
				<td><input type="text" name="auther"></td>
			</tr>
			<tr>
				<td>图书封面</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td><input type="submit" value="确定"></td>
				<td></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>