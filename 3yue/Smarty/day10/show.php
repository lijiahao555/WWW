<?php 
header('content-type:text/html;charset=utf8');
require('../smarty/Smarty.class.php');
$sm=new Smarty();
$sm->template_dir="./template";

require('./class.php');
$db=new Db('127.0.0.1','root','0509','day3rikao');
$sousuo=!empty($_GET['sousuo'])?$_GET['sousuo']:'';


$page = !empty($_GET['page'])?$_GET['page']:1;
$i = !empty($_GET['i'])?$_GET['i']:1;


$start=($page-1)*$i;

$sql=$db->select('*','day7'," name like '%$sousuo%' limit $start,$i");

$zong_sql=$db->select1('day7',"name like '%$sousuo%'");
$zong_arr=mysql_fetch_assoc($zong_sql);
$zong=ceil($zong_arr['num']/$i);


$sm->assign('sql',$sql);
$sm->assign('page',$page);
$sm->assign('sousuo',$sousuo);
$sm->assign('zong',$zong );
$sm->assign('i',$i );


$sm->display('show.tpl');
 ?>
