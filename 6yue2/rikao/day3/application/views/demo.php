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
		<th>USERNAME</th>
		<th>PASSWORD</th>
		<th>操作</th>
		<?php foreach ($data as $key => $v): ?>
			<tr>
				<td><?php echo $v['demo_id'] ?></td>
				<td><?php echo $v['demo_name'] ?></td>
				<td><?php echo $v['demo_pwd'] ?></td>
				<td><a href="http://localhost/6yue2/rikao/day3/index.php/Demo/del?id=<?php echo $v['demo_id'] ?>">删除</a></td>
				<td><a href="http://localhost/6yue2/rikao/day3/index.php/Demo/up?id=<?php echo $v['demo_id'] ?>">修改</a></td>
			</tr>
		<?php endforeach ?>
		</table>
		<a href="<?php echo site_url('Demo/add') ?>">添加</a>
	</center>
</body>
</html>