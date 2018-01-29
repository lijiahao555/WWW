<?php
header('content-type:text/html;charset=utf-8');
$title = "范冰冰结婚了";

$content ="没有通知我啊";

//引入smarty入口文件
require('../Smarty/smarty/Smarty.class.php');
//实例化smarty对象
$smarty = new Smarty();
//配置前端模板路径
$smarty->template_dir = "./template";

//配置编译文件路径	    
$smarty->compile_dir = "./bianji";

//配置smarty配置文件的路径
$smarty->config_dir = "./config";

//向模板中分配变量
$smarty->assign('title', $title);
$smarty->assign('content', $content);

//加载前端的模板文件
$smarty->display('detail.tpl');

