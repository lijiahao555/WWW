<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo U('Book/addDo');?>" method="post" enctype="multipart/form-data">
			<table border="5">
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
					<td>封面</td>
					<td><input type="file" name="file"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="提交"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>