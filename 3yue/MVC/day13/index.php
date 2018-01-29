<?php 
define('MVC_Add_Index', './');
define('MVC_Add_Controller', './application/admin/Controller/');
define('MVC_Add_Model', './application/admin/Model/');
define('MVC_Add_View', './application/admin/View/');

$p=$_GET['p'];
$c=$_GET['c'];
$a=$_GET['a'];

$path="./application/".$p."/Controller/".$c."Controller.php";

require($path);

$obj=new $c;

$obj->$a();




 ?>