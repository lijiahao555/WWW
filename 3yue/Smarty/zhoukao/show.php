<?php 
header('content-type:text/html;charset=utf8');

require('./smarty/Smarty.class.php');

$sm=new Smarty();

$sm->template_dir="./template";

require('./class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sql=$db->select('*','zhoukao2','id');

$sm->assign('sql',$sql);

$sm->display('show.tpl');

 ?>