<?php 
header('content-type:text/html;charset=utf-8');

define('MVC_Admin_Index', './');
define('MVC_Admin_Controller','./application/admin/Controller/');
define('MVC_Admin_Model','./application/admin/Model/');
define('MVC_Admin_View','./application/admin/View/');


//根据传参数分配控制器和方法

// ?p=admin&c=login&a=index

// $p = $_GET['p'];
// $c = $_GET['c'];
// $a = $_GET['a'];
$p = 'admin';
$c = 'Login';
$a = 'index';
//p参数   有2个方面 admin代表后台 home 代表前台 准备进入前台还是后台
//c参数    控制器  名
//a参数    控制器里的方法名

//响应控制器的路径
$path = './application/'.$p.'/Controller/'.$c.'Controller.php';


// echo $path;
require($path);
$cobj = new $c;
$cobj->$a();


// echo "我是入口文件";



 ?>