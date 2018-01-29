<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<table border="1" cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td>所属分类</td>
			<td>通过数量</td>
		</tr>
		<?php foreach ($type as $key => $value): ?>
			<tr>
				<td><?= $value['type_name'] ?></td>
				<td><?= $value['type_id'] ?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<center>
		<a href="<?= site_url('Index/index_c/index') ?>">首页</a>
	</center>
</body>
</html>