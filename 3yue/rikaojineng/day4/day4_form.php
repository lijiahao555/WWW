<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>day4技能</title>
</head>
<body>
<center>
	<form action="day4_date.php" enctype="multipart/form-data" method="post">
		<table>
			<tr>
				<td>新闻标题</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>新闻分类</td>
				<td>
					<select name="type" id="">
						<option value="国内新闻">国内新闻</option>
						<option value="国外新闻">国外新闻</option>
						<option value="你好新闻">你好新闻</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>新闻图片</td>
				<td><input type="hidden" name="max_file_sise" value="1"><input type="file" name="file"><input type="text"></td>
			</tr>
			<tr>
				<td>新闻概要</td>
				<td><textarea name="jian" id="" cols="30" rows="5"></textarea></td>
			</tr>
			<tr>
				<td>新闻内容</td>
				<td><textarea name="count" id="" cols="30" rows="10"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
				<td></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>