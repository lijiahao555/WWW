<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>模拟</title>
</head>
<body>
<center>
	<form action="date.php" enctype="multipart/form-data" method="post">
		<table border="1">
			<thead>
				<h1>新闻添加</h1>
			</thead>
			<tbody>
				<tr>
					<td>新闻标题</td>
					<td><input type="text" name="news_title"></td>
				</tr>
				<tr>
					<td>新闻图片</td>
					<td><input type="file" name="news_file"></td>
				</tr>
				<tr>
					<td>新闻分类</td>
					<td>
						<select name="type_id">
							<?php 
							mysql_connect('127.0.0.1','root','0509');
							mysql_select_db('exam');
							mysql_query('set names utf8');
							$sql="select * from news_type";
							$res=mysql_query($sql);
							while ($arr=mysql_fetch_array($res)) {
								echo "<option value='{$arr['type_idd']}'>".$arr['type_name']."</option>";
							}
							 ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>发布人</td>
					<td><input type="text" name="news_author"></td>
				</tr>
				<tr>
					<td>新闻内容</td>
					<td><textarea name="news_content" cols="30" rows="5"></textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="提交"></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</form>
</center>
</body>
</html>