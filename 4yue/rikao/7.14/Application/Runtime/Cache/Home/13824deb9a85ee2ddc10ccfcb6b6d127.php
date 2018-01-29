<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
<form action="<?php echo U('/Home/Big/sou');?>" method="post">
<input type="text" name="sou"><input type="submit" value="搜索">
	<table border="1">
		<th></th>
		<th>主题</th>
		<th>发布时间</th>
		<th>操作</th>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
				<td><input type="checkbox"></td>
				<td><a href="#"><?php echo ($v["name"]); ?></a></td>
				<td><?php echo ($v["time"]); ?></td>
				<td><a href="<?php echo U('/Home/Big/del');?>?id=<?php echo ($v["id"]); ?>">删除数据</a></td>
				<td><a href="<?php echo U('/Home/Big/up');?>?id=<?php echo ($v["id"]); ?>">修改数据</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<a href="<?php echo U('/Home/Big/show');?>">返回展示页面</a>
</form>
</center>
</body>
<script>
	
</script>
</html>