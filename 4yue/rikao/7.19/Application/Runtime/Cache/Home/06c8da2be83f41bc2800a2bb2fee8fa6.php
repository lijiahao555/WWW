<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<center>
		<form action="<?php echo U('Blog/upOne');?>" method="post" enctype="multipart/form-data">
			<table border="1">
				<tr>
					<td>标题</td>
					<td><input type="text" name="name" value="<?php echo ($list["name"]); ?>"></td>
				</tr>
				<tr>
					<td>图片</td>
					<td><input type="file" name="file" value="<?php echo ($list["file"]); ?>"></td>
				</tr>
				<tr>
					<td>分类</td>
					<td>
							<?php if( $list["biao"] == $list["biao"] ): ?><input type="checkbox" name="box[]" value="C" checked>C
								<input type="checkbox" name="box[]" value="PHP" checked>PHP
								<input type="checkbox" name="box[]" value="JV" checked>JV
								<input type="checkbox" name="box[]" value="JS" checked>JS
							<?php else: ?>
								<input type="checkbox" name="box[]" value="C" >C
								<input type="checkbox" name="box[]" value="PHP" >PHP
								<input type="checkbox" name="box[]" value="JV" >JV
								<input type="checkbox" name="box[]" value="JS" >JS<?php endif; ?>
						
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="提交"></td>
				</tr>
				<input type="hidden" name="id" value="<?php echo ($id); ?>">
			</table>
		</form>
	</center>
</body>
</html>