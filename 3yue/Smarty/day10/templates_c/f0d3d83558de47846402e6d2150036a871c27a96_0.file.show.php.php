<?php
/* Smarty version 3.1.30, created on 2017-06-18 19:18:42
  from "E:\web\Apache\htdocs\Smarty\day10\show.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59466192d95e16_81912557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0d3d83558de47846402e6d2150036a871c27a96' => 
    array (
      0 => 'E:\\web\\Apache\\htdocs\\Smarty\\day10\\show.php',
      1 => 1497784716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59466192d95e16_81912557 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php 
';?>header('content-type:text/html;charset=utf8');
require('../smarty/Smarty.class.php');
$sm=new Smarty();
$sm->template_dir="./template";

require('./class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sousuo=!empty($_GET['sousuo'])?$_GET['sousuo']:'';
$sousuo=!empty($_GET['sousuo'])?$_GET['sousuo']:'';

$page = !empty($_GET['page'])?$_GET['page']:1;


$start=($page-1)*3;

$sql=$db->select('*','day7'," name like '%$sousuo%' limit $start,3");

$zong_sql=$db->select1('day7',"name like '%$sousuo%'");
$zong_arr=mysql_fetch_assoc($zong_sql);
$zong=ceil($zong_arr['num']/3);


$sm->assign('sql',$sql);
$sm->assign('page',$page);
$sm->assign('sousuo',$sousuo);
$sm->assign('zong',$zong );


$sm->display('show.php');
 <?php echo '?>';
}
}
