<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>day16日考技能</title>
</head>
<body>
<center>
	<form action="/3yue/thinkPHP/index.php/Home/Log/addDo" method="post" enctype="multipart/form-data">
		<table border="8">
			<tr>
				<td>标题</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>内容</td>
				<td>
					<textarea name="count" id="" cols="20" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td>图片</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>