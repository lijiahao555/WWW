<?php
/* Smarty version 3.1.30, created on 2017-06-16 09:13:55
  from "E:\web\Apache\htdocs\Smarty\template\day9.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594330d340f0f3_64867594',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f1f926bfab25fa7ce28f6cd7cde2721f3589cde' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\template\\day9.tpl',
      1 => 1497572830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594330d340f0f3_64867594 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>模板</title>
</head>
<body>
<center>
	<form action="day9_d.php" method="post">
		<table>
			<tr>
				<td>商品</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>价格</td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td>数量</td>
				<td><input type="text" name="number"></td>
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
