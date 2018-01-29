<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
<center>
	<form action="<?php echo U('/Home/Big/data');?>" method="post">
		<table border="5">
			<tr>
				<td>主题</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>阅读人</td>
				<td><select name="box">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["type_id"]); ?>"><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select>
				</td>
			</tr>
			<tr>
				<td>内容</td>
				<td>
					<textarea name="content" id="" cols="20" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="添加"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>