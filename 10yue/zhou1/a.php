<?php

$post = $_POST;

$post['APPID'] = '999666';

$a = 'abcdefg123';

$post['PPSECRET'] = md5($a);

$data = json_encode($post);

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'http://localhost/10yue/zhou/b.php');

curl_setopt($curl,CURLOPT_HEADER,0);

curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

curl_setopt($curl,CURLOPT_POST,1);

curl_setopt($curl,CURLOPT_POSTFIELDS,$data);

$str = curl_exec($curl);

echo $str;
