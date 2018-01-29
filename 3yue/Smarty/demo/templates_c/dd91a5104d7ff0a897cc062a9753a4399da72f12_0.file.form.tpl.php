<?php
/* Smarty version 3.1.30, created on 2017-06-15 19:33:22
  from "E:\web\Apache\htdocs\Smarty\template\form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594270820d5807_97408475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd91a5104d7ff0a897cc062a9753a4399da72f12' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\template\\form.tpl',
      1 => 1497525121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594270820d5807_97408475 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>模板</title>
</head>
<body>
<center>
	<form action="date.php" method="post">
		<table border="1">
			<tr>
				<td>商品</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>数量</td>
				<td><input type="text" name="num"></td>
			</tr>
			<tr>
				<td>价格</td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td>介绍</td>
				<td><textarea name="count" id="" cols="30" rows="10"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
				<td></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html><?php }
}
