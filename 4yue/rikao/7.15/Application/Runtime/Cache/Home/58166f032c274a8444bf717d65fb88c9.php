<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="<?php echo U('/Home/Wen/upOne');?>" method="post">
		<table border="5">
			<tr>
				<td>标题</td>
				<td><input type="text" name="name" value="<?php echo ($wen["name"]); ?>"></td>
			</tr>
			<tr>
				<td>内容</td>
				<td>
					<textarea name="content" id="" cols="20" rows="5"><?php echo ($wen["content"]); ?></textarea>
				</td>
			</tr>
			<tr>
				<td>作者</td>
				<td><input type="text" name="auther" value="<?php echo ($wen["auther"]); ?>"></td>
			</tr>
			<tr>
				<td>分类</td>
				<td>
					<select name="t_id" >
						<?php if(is_array($wentype)): $i = 0; $__LIST__ = $wentype;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if( $wen["t_id"] == $v["type_id"] ): ?><option value="<?php echo ($v["type_id"]); ?>" selected><?php echo ($v["type_name"]); ?></option>
							<?php else: ?>
								<option value="<?php echo ($v["type_id"]); ?>"><?php echo ($v["type_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="修改"></td>
			</tr>
			<input type="hidden" name="id" value="<?php echo ($wen["id"]); ?>">
		</table>

	</form>
</center>
</body>
</html>