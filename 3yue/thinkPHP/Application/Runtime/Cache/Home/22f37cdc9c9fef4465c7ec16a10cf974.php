<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="/3yue/thinkPHP/index.php/Home/Index/save" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>姓名</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>违纪类型</td>
				<td>
					<select name="type">
						<option value="抽烟">抽烟</option>
						<option value="喝酒">喝酒</option>
						<option value="睡觉">睡觉</option>
						<option value="吃东西">吃东西</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>扣分</td>
				<td><input type="text" name="count"></td>
			</tr>
			<tr>
				<td>图片</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
				<td></td>
			</tr>
			<input type="hidden" name="hidd" value="<?php echo ($id); ?>">
		</table>
	</form>
</center>
</body>
</html>