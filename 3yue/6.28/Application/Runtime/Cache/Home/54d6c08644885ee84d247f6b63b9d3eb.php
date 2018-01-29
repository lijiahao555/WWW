<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
<h3>发表日志</h3>
	<form action="/3yue/6.28/index.php/Home/Log/addDo" method="post" enctype="multipart/form-data">
		<table border="6">
			<tr>
				<td>日志标题</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>日志类型</td>
				<td>
					<select name="type">
						<?php if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v['type_id']); ?>"><?php echo ($v['type_name']); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>日志内容</td>
				<td>
					<textarea name="content" cols="20" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td>上传照片</td>
				<td><input type="file" name="file[]"></td>
			</tr>
			<tr>
				<td>上传照片</td>
				<td><input type="file" name="file[]"></td>
			</tr>
			<tr>
				<td>上传照片</td>
				<td><input type="file" name="file[]"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="发表"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>