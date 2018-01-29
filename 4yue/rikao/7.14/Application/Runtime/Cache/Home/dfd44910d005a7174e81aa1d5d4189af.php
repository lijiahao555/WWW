<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<h1>欢迎修改页面</h1>
	<form action="<?php echo U('Big/upDo');?>" method="post">
		<table>
			<tr>
				<td>标题</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>内容</td>
				<td><textarea name="content" id="" cols="20" rows="5"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
		<input type="hidden" name="id" value="<?php echo ($id); ?>">
	</form>
</center>
</body>
</html>