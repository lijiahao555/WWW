<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo site_url('Exam/upOne')?>" method="post">
			<table border="1">
				<tr>
					<td>节目名</td>
					<td><input type="text" name="infor_title" value="<?php echo $res['infor_title'] ?>"></td>
				</tr>
				<tr>
					<td>播出时间</td>
					<td><input type="text" name="infor_time" value="<?php echo $res['infor_time'] ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" value="修改"></td>
					<td></td>
				</tr>
				<input type="hidden" name="infor_id" value="<?php echo $id ?>">
			</table>
		</form>
	</center>
</body>
</html>