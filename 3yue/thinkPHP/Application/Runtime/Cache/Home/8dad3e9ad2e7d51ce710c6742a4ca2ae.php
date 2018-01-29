<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>周考技能展示</title>
</head>
<body>
<center>
	<table border="2">
		<tr>
			<td>ID</td>
			<td>商品名称</td>
			<td>品牌网址</td>
			<td>商品LOGO</td>
			<td>商品描述</td>
			<td>排序</td>
			<td>操作</td>
		</tr>
		<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
				<td><?php echo ($v['id']); ?></td>
				<td><?php echo ($v['name']); ?></td>
				<td><?php echo ($v['email']); ?></td>
				<td><img src="/3yue/thinkPHP/<?php echo ($v['logo']); ?>" width="80"></td>
				<td><?php echo ($v['count']); ?></td>
				<td><?php echo ($v['oder']); ?></td>
				<td><a href="/3yue/thinkPHP/index.php/Home/Zhoukao/del/id/<?php echo ($v['id']); ?>">删除</a></td>
			</tr><?php endforeach; endif; ?>
	</table>
</center>
</body>
</html>