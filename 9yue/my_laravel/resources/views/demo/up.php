<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<style>
	td{text-align: center;}
</style>
</head>
<body>
	<form action="up" method="get">
		<table>
			<tr>
				<td>内容</td>
				<td><textarea name="content" cols="30" rows="5"><?=$data->content?></textarea></td>
				<input type="hidden" name="id" value="<?=$data->id?>">
			</tr>
			<tr>
				<td><input type="submit" value="修改"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>