<?php
/* Smarty version 3.1.30, created on 2017-06-18 19:16:31
  from "E:\web\Apache\htdocs\Smarty\day10\template\show.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5946610fe7aa22_11196623',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81b91857323fbc1d42399e11f5f6afab146d51a6' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\day10\\template\\show.php',
      1 => 1497784590,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5946610fe7aa22_11196623 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
<center>
<input type="text" id="sousuo" value="<?php echo $_smarty_tpl->tpl_vars['sousuo']->value;?>
"><button onclick="t_body(1)">搜索</button>
	<table border="1">
		<tr>
			<td>ID</td>
			<td>姓名</td>
			<td>性别</td>
			<td>种类</td>
			<td>图片</td>
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
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['sex'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['v']->value['type'];?>
</td>
				<td><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['file'];?>
" width="50"></td>				
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
	当前<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
页
	<button onclick="t_body(1)">首页</button>
	<button onclick="t_body(<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
)">上一页</button>
	<button onclick="t_body(<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
,<?php echo $_smarty_tpl->tpl_vars['zong']->value;?>
)">下一页</button>
	<button onclick="t_body(<?php echo $_smarty_tpl->tpl_vars['zong']->value;?>
)">尾页</button>
	总<?php echo $_smarty_tpl->tpl_vars['zong']->value;?>
页
	<select name="" id="i">
		<?php echo '<?php 
			';?>for ($i=0; $i < 10; $i++) { 
				var_dump($i);die;//"<option value='$i'>".$i."</option>";
			}
		 <?php echo '?>';?>
	</select>
</center>
</body>
<?php echo '<script'; ?>
>
	function t_body(page,zong){
		if (page==0) {
			return false;
		};
		if (page>zong) {
			return false;
		};
		sousuo=document.getElementById('sousuo').value;
		location.href="show.php?page="+page+'&sousuo='+sousuo;
	}
<?php echo '</script'; ?>
>
</html><?php }
}
