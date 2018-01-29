<?php

if (isset($_GET['id']) && $_GET['id'] == '5') {
	$arr = array(
		array('name'=>'张','age'=>18),
		array('name'=>'张','age'=>19),
		array('name'=>'张','age'=>20),
	);

	$arr = json_encode($arr);
	
	$data = isset($_GET['callback']) ? $_GET['callback'].'('.$arr.')' : $arr;

	echo $arr;
}