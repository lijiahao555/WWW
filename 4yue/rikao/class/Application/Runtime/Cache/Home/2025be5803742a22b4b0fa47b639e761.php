<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="<?php echo U('Class/addOne');?>" method="post">
		<table border="5">
			<th>学生编号</th>
			<th>学生姓名</th>
			<th>选择课程</th>
			<tr>
				<td><input type="hidden" name="admin_id" value="<?php echo ($data["admin_id"]); ?>"><?php echo ($data["admin_id"]); ?></td>
				<td><?php echo ($data["admin_name"]); ?></td>
				<td>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input type="checkbox" name="class_id[]" value="<?php echo ($v["class_id"]); ?>"><?php echo ($v["class_name"]); endforeach; endif; else: echo "" ;endif; ?>
				</td>
			</tr>
				
				<td colspan="3"><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>