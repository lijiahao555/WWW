<?php

// 路径
$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type='.$_POST['type'].'&appid='.$_POST['id'].'&secret='.$_POST['key'].'';


echo file_get_contents($url);

// 初始化curl
// $curl = curl_init();

// // 设置参数 路径
// curl_setopt($curl,CURLOPT_URL,$url);

// // 设置网页不输出
// curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

// //设置post提交
// curl_setopt($curl,CURLOPT_POST,1);

// // 设置post提交参数
// curl_setopt($curl,CURLOPT_POSTFIELDS,$data);

// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// $data = curl_exec($curl);

// echo json_encode($data);