<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo U('Class/upOne');?>" method="post">
			<table border="1">
				<tr>
					<td><b>课程</b></td>
					<td>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if( $v["flag"] == 1 ): ?><input type="checkbox" name="admin_id[]" value="<?php echo ($v["class_id"]); ?>" checked><?php echo ($v["class_name"]); ?>
							<?php else: ?>
								<input type="checkbox" name="admin_id[]" value="<?php echo ($v["class_id"]); ?>"><?php echo ($v["class_name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="修改"></td>
				</tr>
			</table>
			<input type="hidden" name="id" value="<?php echo ($id); ?>">
		</form>
	</center>
</body>
</html>