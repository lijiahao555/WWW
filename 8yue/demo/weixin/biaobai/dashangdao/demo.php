<?php

$jifen = $_POST['jifen'];

$pdo = new PDO('mysql:host=127.0.0.1;dbname=weixin', 'root', 'root');

$data = $pdo->exec("update jifen set jifen = jifen+'$jifen' where ");