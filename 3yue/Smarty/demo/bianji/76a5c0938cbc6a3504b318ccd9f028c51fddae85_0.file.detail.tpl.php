<?php
/* Smarty version 3.1.30, created on 2017-06-15 15:11:32
  from "E:\web\Apache\htdocs\Smarty\template\detail.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59423324d83cb8_78687612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76a5c0938cbc6a3504b318ccd9f028c51fddae85' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\template\\detail.tpl',
      1 => 1497510690,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59423324d83cb8_78687612 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>详情页</title>
</head>
<body>
	<h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
	<p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</p>
	
	<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "detail.conf", null, 0);
?>

	
	<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'auther');?>


	<?php $_smarty_tpl->_assignInScope('aa', "holle");
?>

	<?php echo $_smarty_tpl->tpl_vars['aa']->value;?>

</body>
</html>
<?php }
}
