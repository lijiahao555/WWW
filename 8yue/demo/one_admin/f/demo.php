<?php
header('content-type:text/html;charset=utf8');
$url[] = 'www.a.com';
$url[] = 'www.b.com';
$url[] = 'www.c.com';
$url[] = 'www.d.com';
$user_name = $_GET['user_name'];
$user_pwd = $_GET['user_pwd'];
$url2 = $_GET['url'];

$html = "";
foreach ($url as $k => $v) {
	if ($_GET['url'] != $v) {
		$html .= '<script src="http://'.$v.'/index.php?user_name='.$user_name.'&user_pwd='.$user_pwd.'"></script>';
	}
}

echo $html;