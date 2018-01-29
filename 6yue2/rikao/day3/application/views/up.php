<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo site_url('Demo/upOne') ?>" method="post">
			<table>
				<tr>
					<td>name</td>
					<td><input type="text" name="demo_name" value="<?php echo $data['demo_name'] ?>"></td>
				</tr>
				<tr>
					<td>pwd</td>
					<td><input type="text" name="demo_pwd" value="<?php echo $data['demo_pwd'] ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="修改"></td>
				</tr>
				<input type="hidden" name="demo_id" value="<?php echo $id ?>">
			</table>
		</form>
	</center>
</body>
</html>