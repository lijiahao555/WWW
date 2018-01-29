<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>标题</td>
				<td>图片</td>
				<td>标签</td>
				<td>操作</td>
			</tr>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($v["id"]); ?></td>
					<td><?php echo ($v["name"]); ?></td>
					<td><img src="/4yue/rikao/7.19/<?php echo ($v["file"]); ?>" width="50"></td>
					<td><?php echo ($v["biao"]); ?></td>
					<td><a href="<?php echo U('/Home/Blog/up');?>?id=<?php echo ($v["id"]); ?>">修改</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</center>
</body>
</html>