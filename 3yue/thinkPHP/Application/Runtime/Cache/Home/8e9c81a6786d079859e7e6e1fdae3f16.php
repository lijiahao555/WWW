<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>练习</title>
</head>
<body>
<center>
	<form action="/3yue/thinkPHP/index.php/Home/Lianxi/addDo" method="post" enctype="multipart/form-data">
		<table border="8">
			<tr>
				<td>姓名</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>密码</td>
				<td><input type="text" name="pwd"></td>
			</tr>
			<tr>
				<td>班级</td>
				<td>
					<select name="type">
						<option value="1511phpC">1511phpC</option>
						<option value="1511phpD">1511phpD</option>
						<option value="1511phpE">1511phpE</option>
						<option value="1511phpA">1511phpA</option>
						<option value="1511phpB">1511phpB</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>图片</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td>内容</td>
				<td>
					<textarea name="count" cols="20" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"><input type="reset" value="重置"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>