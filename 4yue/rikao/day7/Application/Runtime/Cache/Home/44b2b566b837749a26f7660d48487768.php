<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo U('/Home/Index/addDo');?>" method="post">
			<table border="8">
				<tr>
					<td>名字</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>内容</td>
					<td><input type="text" name="content"></td>
				</tr>
				<tr>
					<td>身高</td>
					<td><input type="text" name="height"></td>
				</tr>
				<tr>
					<td><input type="submit" value="修改"></td>
					<td></td>
				</tr>
			</table>	<input type="hidden" name="id" value="<?php echo ($id); ?>">
		</form>
	
	</center>

</body>
</html>