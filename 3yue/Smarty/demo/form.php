<?php 
//连接smarty接口
require('./smarty/Smarty.class.php');
//实例化smarty对象
$sm=new Smarty();
//获取前段模板路径
$sm->template_dir="./template";
//加载前段模板路径
$sm->display('form.tpl');

 ?>