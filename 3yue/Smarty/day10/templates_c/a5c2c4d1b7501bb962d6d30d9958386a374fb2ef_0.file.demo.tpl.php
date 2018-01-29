<?php
/* Smarty version 3.1.30, created on 2017-06-17 08:46:06
  from "E:\web\Apache\htdocs\Smarty\day10\template\demo.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59447bcee62312_06465558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5c2c4d1b7501bb962d6d30d9958386a374fb2ef' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\day10\\template\\demo.tpl',
      1 => 1497660365,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59447bcee62312_06465558 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>day10技能</title>
</head>
<body>
<center>
<input type="text" id="sou" placeholder="根据姓名找对象"><button onclick="t_body">搜索</button>
	<table border="1">
		<tbody id="t_body">
			
		</tbody>
	</table>
</center>
</body>
<?php echo '<script'; ?>
>
	function t_body(page,sou){
		var sou=document.getElementById('sou').value;
		var xhr=new XMLHttpRequest();
		xhr.open('get', 'show.php?page='+page+'&sou='+sou);
		xhr.send(null);
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('t_body')innerHTML=xhr.responseText;
			};
		}
	}
	t_body(page);

	function dian(page){
		var xhr=new XMLHttpRequest();
		xhr.open('get', 'show.php?page='+page);
		xhr.send(null);
		xhr.onreadystatechange=function (){
			if (xhr.readyState==4&&xhr.status==200) {
				document.getElementById('t_body')innerHTML=xhr.responseText;
			};
	}
<?php echo '</script'; ?>
>
</html><?php }
}
