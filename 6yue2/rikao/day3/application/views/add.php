<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo site_url('Demo/addDo') ?>" method="post">
			<table>
				<tr>
					<td>name</td>
					<td><input type="text" name="demo_name"></td>
				</tr>
				<tr>
					<td>pwd</td>
					<td><input type="text" name="demo_pwd"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="添加"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>