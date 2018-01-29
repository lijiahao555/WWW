<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo U('Blog/addDo');?>" method="post" enctype="multipart/form-data">
			<table border="1">
				<tr>
					<td>标题</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>图片</td>
					<td><input type="file" name="file"></td>
				</tr>
				<tr>
					<td>分类</td>
					<td>
						<input type="checkbox" name="box[]" value="C">C
						<input type="checkbox" name="box[]" value="PHP">PHP
						<input type="checkbox" name="box[]" value="JV">JV
						<input type="checkbox" name="box[]" value="JS">JS
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