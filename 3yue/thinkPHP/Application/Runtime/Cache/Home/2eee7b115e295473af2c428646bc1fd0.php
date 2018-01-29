<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<center>
	<table border="5">
			<tr>
			<td>ID</td>
			<td>分类</td>
			<td>时间</td>
			<td>操作</td>
			</tr>
		<?php if(is_array($sql)): foreach($sql as $key=>$v): ?><tr>
				<td><?php echo ($v['id']); ?></td>
				<td><?php echo ($v['type']); ?></td>
				<td><?php echo ($v['time']); ?></td>
				<td><a href="/3yue/thinkPHP/index.php/Home/Exam/del?id=<?php echo ($v['id']); ?>">删除</a></td>
			</tr><?php endforeach; endif; ?>
			<tr><td><?php echo ($page); ?></td></tr>
		
	</table>

</center>
</body>
</html>