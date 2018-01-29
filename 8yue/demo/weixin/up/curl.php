<?php

$data = '连腾宇个傻逼';
echo json_encode($data);die;
// 初始化curl
$curl = new curl_init();

// 设置参数 路径
curl_setopt($curl,CURLOPT_URL,$url);

// 设置网页不输出
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

//设置post提交
curl_setopt($curl,CURLOPT_POST,1);

// 设置post提交参数
curl_setopt($curl,CURLOPT_RETURNTRANSFER,$data);

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

return curl_exec($curl);
