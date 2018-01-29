<?php
/* Smarty version 3.1.30, created on 2017-06-19 09:23:08
  from "E:\web\Apache\htdocs\Smarty\zhoukao\template\show.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5947277c152935_11529136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd302c02fa57699a3838e9bf4f7b5e566af288f0b' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\zhoukao\\template\\show.tpl',
      1 => 1497835386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5947277c152935_11529136 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<center>
	<table border="1">
		<tr>
		<td>ID</td>
		<td>商品名称</td>
		<td>品牌网址</td>
		<td>LOGO</td>
		<td>描述</td>
		<td>排序</td>
		<td>操作</td>
		</tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sql']->value, 'v');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['v']->value) {
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['email'];?>
</td>
				<td><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['logo'];?>
" width="100"></td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['count'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['oder'];?>
</td>
				<td><a href="delete.php?id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">删除</a></td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
	<a href="form.php">继续添加</a>
</center>
</body>
</html><?php }
}
