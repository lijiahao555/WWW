<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo U('Blog/addDo');?>" method="post" enctype="multipart/form-data">
			<table border="1">
				<tr>
					<td>标题</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>图片</td>
					<td><input type="file" name="file"></td>
				</tr>
				<tr>
					<td>分类</td>
					<td>
						<select name="type">
							<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["biao_id"]); ?>"><?php echo ($v["biao_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="提交"></td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>