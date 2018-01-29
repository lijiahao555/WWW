<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<th>ID</th>
			<th>NAME</th>
			<?php foreach ($data as $key => $v): ?>
				<tr>
					<td><?php echo $v['category_id'] ?></td>
					<td><?php echo str_repeat('&nbsp;',(substr_count($v['new_path'],'-')-1)*4) ?><?php echo $v['category_name'] ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</center>
</body>
</html>