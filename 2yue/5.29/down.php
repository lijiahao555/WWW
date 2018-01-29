<?php 
$id=$_GET['id'];

$name=substr($id, strrpos($id, '/')+1);

header('Content-type:image/jpg');

header("Content-Disposition:attachment;filename=$name");

readfile("$id");

 ?>