<?php 
header('content-type:text/html;charset=utf-8');

define('MVC_Admin_Index', './');
define('MVC_Admin_Controller', './application/admin/Controller/');
define('MVC_Admin_Model', './application/admin/Model/');
define('MVC_Admin_View', './application/admin/View/');

$p=$_GET['p'];//选择前台还是后台
$c=$_GET['c'];//选择控制器,同时也是控制器内类名
$a=$_GET['a'];//选择类内加载的方法

$path='./application/'.$p.'/Controller/'.$c.'Controller.php';

require($path);
$obj=new $c;
$obj->$a();



 ?>