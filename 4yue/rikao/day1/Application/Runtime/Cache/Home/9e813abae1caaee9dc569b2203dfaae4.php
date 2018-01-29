<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<center>
 		<form action="U('addDo')" method="post">
 			<table border="5">
 				<tr>
 					<td>博文标题</td>
 					<td><input type="text" name="name"></td>
 				</tr>
 				<tr>
 					<td>内容</td>
 					<td>
 						<textarea name="content" cols="20" rows="5"></textarea>
 					</td>
 				</tr>
 				<tr>
 					<td>分类</td>
 					<td>
 						<select name="type">
 							<?php if(is_array($list)): foreach($list as $key=>$v): ?><option value="<?php echo ($v["type_id"]); ?>"><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
 						</select>
 					</td>
 				</tr>
 				<tr>
 					<td><input type="submit" value="添加"></td>
 					<td></td>
 				</tr>
 			</table>
 		</form>
 	</center>
 </body>
 </html>