<?php
/* Smarty version 3.1.30, created on 2017-06-18 12:54:01
  from "E:\web\Apache\htdocs\Smarty\day10\template\form.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59460769d2a014_11605750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecfccaa75f3760adac274117b21c18f743a3647f' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\day10\\template\\form.tpl',
      1 => 1497761640,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59460769d2a014_11605750 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<center>
	<form action="date.php" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>用户名</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>性别</td>
				<td>
				<input type="radio" name="sex" value="男">男
				<input type="radio" name="sex" value="女">女
				</td>
			</tr>
			<tr>
				<td>种类</td>
				<td>
					<select name="type" id="">
						<option value="软工">软工</option>
						<option value="云计算">云计算</option>
						<option value="房山">房山</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>图片</td>
				<td><input type="file" name="file"></td>
			</tr>
			<tr>
				<td><input type="submit"></td>
				<td></td>
			</tr>
		</table>
	</form>
</center>
</body>
</html><?php }
}
