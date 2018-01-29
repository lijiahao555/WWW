<?php 
header('content-type:text/html;charset=utf8');
//连接增删改查类
require('../3yue/rikaojineng/class.php');
//实例化类
$db=new Db('127.0.0.1','root','0509','day3rikao');
//写sql
$sql=$db->select('*','day8_2','id');
//连接smarty文件
require('./smarty/Smarty.class.php');
//实例化smarty对象
$sm=new Smarty();
//配置前端模板路径
$sm->template_dir="./template";
//配置编译文件路径
$sm->compile="./bianyi";
//配置文件路径
// $sm->config_dir="./变量名.config";添加方式
//向模板中配置变量
$sm->assign('sql',$sql);
//调用前端模板文件
$sm->display('show.tpl');


 ?>