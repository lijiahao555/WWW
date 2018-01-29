<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="<?php echo U('/Home/Photo/addOne');?>" method="post" enctype="multipart/form-data">
		<table border="5">
			<tr>
				<td>相册名称</td>
				<td><input type="text" name="photo_name"></td>
			</tr>
			<tr>
				<td>分类</td>
				<td>
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input type="checkbox" name="sort[]" value="<?php echo ($v["sort_id"]); ?>"><?php echo ($v["sort_name"]); endforeach; endif; else: echo "" ;endif; ?>
				</td>
			</tr>
			<tr>
				<td>描述</td>
				<td><input type="text" name="photo_content"></td>
			</tr>
			<tr>
				<td>封面</td>
				<td><input type="file" name="photo_file"></td>
			</tr>
			<tr>
				<td>添加时间</td>
				<td><input type="text" name="photo_time"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="添加"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html>