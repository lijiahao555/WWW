<?php 
require('./smarty/Smarty.class.php');

$sm=new Smarty();

$sm->template_dir="./template";

$sm->display('form.tpl');




 ?>