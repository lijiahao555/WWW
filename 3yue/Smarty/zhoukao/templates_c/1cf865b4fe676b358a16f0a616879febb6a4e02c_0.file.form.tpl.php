<?php
/* Smarty version 3.1.30, created on 2017-06-19 09:04:05
  from "E:\web\Apache\htdocs\Smarty\zhoukao\template\form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59472305c607b7_68011194',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1cf865b4fe676b358a16f0a616879febb6a4e02c' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\zhoukao\\template\\form.tpl',
      1 => 1497834241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59472305c607b7_68011194 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>周考2</title>
</head>
<body>
<center>
	<form action="date.php" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>品牌名称</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>品牌网址</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>商品LOGO</td>
				<td><input type="file" name="logo"></td>
			</tr>
			<tr>
				<td>商品描述</td>
				<td><textarea name="count" cols="30" rows="5"></textarea></td>
			</tr>
			<tr>
				<td>排序</td>
				<td><input type="text" name="oder"></td>
			</tr>
			<tr>
				<td>是否显示</td>
				<td>
					<input type="radio" name="show" value="是">是
					<input type="radio" name="show" value="否">否
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" value="确定"><input type="reset" value="重置"></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html><?php }
}
