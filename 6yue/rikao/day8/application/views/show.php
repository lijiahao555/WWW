<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<tr>
			<td>名称</td>
			</tr>
			<?php foreach ($res as $key => $v): ?>
				<tr>
					<td><span style="margin-left:<?= $v['key'] ?>em">*--<?php echo $v['name'] ?></span></td>
				</tr>
			<?php endforeach ?>
		</table>
	</center>
</body>
</html>