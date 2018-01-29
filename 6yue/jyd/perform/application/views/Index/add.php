<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add</title>
</head>
<body>
	<form action="<?= site_url('Index/index_c/add_do') ?>" method='post'>
		<table border="1" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td>作品名称</td>
				<td>
					<input type="text" name="works_name">
				</td>
			</tr>
			<tr>
				<td>表演时间</td>
				<td>
					<input type="text" name="works_time">
				</td>
			</tr>
			<tr>
				<td>表演人员</td>
				<td>
					<input type="text" name="works_member">
				</td>
			</tr>
			<tr>
				<td>排序</td>
				<td>
					<input type="text" name="works_sort">
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="Release">
				</td>
			</tr>
		</table>
	</form>
	<center>
		<a href="<?= site_url('Index/index_c/index') ?>">首页</a>
	</center>
</body>
</html>