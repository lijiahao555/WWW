<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<thead>
				<th>标题</th>
				<th>内容</th>
				<th>分类</th>
				<th>时间</th>
				<th>删除</th>
				<th>修改</th>
			</thead>
			<tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
						<td><?php echo ($v["title"]); ?></td>
						<td><?php echo ($v["content"]); ?></td>
						<td><?php echo ($v["label_name"]); ?></td>
						<td><?php echo ($v["time"]); ?></td>
						<td><a href="<?php echo U('Blog/del');?>?id=<?php echo ($v["id"]); ?>">删除</a></td>
						<td><a href="<?php echo U('Blog/up');?>?id=<?php echo ($v["id"]); ?>">修改</a></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
		<a href="<?php echo U('Blog/add');?>">返回添加</a>
	</center>
</body>
</html>