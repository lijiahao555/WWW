<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>周考技能</title>
</head>
<body>
<center>
	<form action="/3yue/thinkPHP/index.php/Home/Zhoukao/addDo" method="post" enctype="multipart/form-data">
		<table border="8">
			<tr>
				<td>商品名称</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>商品网址</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>品牌LOGO</td>
				<td><input type="file" name="logo"></td>
			</tr>
			<tr>
				<td>商品描述</td>
				<td>
					<textarea name="count" cols="20" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td>排序</td>
				<td><input type="text" name="oder"></td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input type="radio" name="show" value="1">是
					<input type="radio" name="show" value="0">否
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>