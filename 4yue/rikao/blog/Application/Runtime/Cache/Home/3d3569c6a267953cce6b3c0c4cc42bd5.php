<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="<?php echo U('Blog/addDo');?>" method="post">
		<table border="8">
			<tr>
				<td>博文标题</td>
				<td><input type="text" name="title"></td>
			</tr>
			<tr>
				<td>博文内容</td>
				<td><textarea name="content" id="" cols="30" rows="10"></textarea></td>
			</tr>
			<tr>
				<td>博文标签</td>
				<td>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input type="checkbox" name="label[]" value="<?php echo ($v["label_id"]); ?>"><?php echo ($v["label_name"]); endforeach; endif; else: echo "" ;endif; ?>
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