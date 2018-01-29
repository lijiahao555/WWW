<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="<?php echo U('/Home/Wen/sou');?>" method="post">
	<input type="text" name="sou"><input type="submit" value="搜索">
		<table border="1">
		<th>ID</th>
			<th>标题</th>
			<th>内容</th>
			<th>作者</th>
			<th>分类</th>
			<th>时间</th>
			<th>操作</th>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($v["id"]); ?></td>
					<td><?php echo ($v["name"]); ?></td>
					<td><?php echo ($v["content"]); ?></td>
					<td><?php echo ($v["auther"]); ?></td>
					<td><?php echo ($v["type_name"]); ?></td>
					<td><?php echo ($v["time"]); ?></td>
					<td><a href="<?php echo U('/Home/Wen/del');?>?id=<?php echo ($v["id"]); ?>">删除</a>|<a href="<?php echo U('/Home/Wen/up');?>?id=<?php echo ($v["id"]); ?>">修改</a></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
	</form>
</center>
</body>
</html>