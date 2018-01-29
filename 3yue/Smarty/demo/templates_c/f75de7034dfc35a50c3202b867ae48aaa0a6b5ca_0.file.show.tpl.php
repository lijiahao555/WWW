<?php
/* Smarty version 3.1.30, created on 2017-06-15 19:59:43
  from "E:\web\Apache\htdocs\Smarty\template\show.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_594276af411d34_23452299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f75de7034dfc35a50c3202b867ae48aaa0a6b5ca' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\template\\show.tpl',
      1 => 1497527857,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594276af411d34_23452299 (Smarty_Internal_Template $_smarty_tpl) {
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
		<th>ID</th>
		<th>名字</th>
		<th>数量</th>
		<th>价格</th>
		<th>简介</th>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sql']->value, 'a');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['a']->value) {
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['a']->value['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['a']->value['name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['a']->value['number'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['a']->value['price'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['a']->value['count'];?>
</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
</center>
</body>
</html><?php }
}
