<?php
/**
 * 模拟登陆
 * @Author: Marte
 * @Date:   2017-09-28 13:58:17
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-09-28 21:08:25
 */
    // var_dump($_SERVER);exit;                     // 获取浏览器相关参数

    $ch = curl_init();                              // 1.初始化，创建一个新cURL资源

    curl_setopt($ch, CURLOPT_URL, "http://www.php7.com/Email/la.php");//2.设置URL和相应的选项

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false); // 对认证证书来源的检查

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false); // 从证书中检查SSL加密算法是否存在

    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);     // 获取的信息以文件流的形式返回，而不是直接输出

    curl_setopt($ch, CURLOPT_HEADER,0);             // 是否返回header区域的内容

    curl_setopt($ch, CURLOPT_POST,1);               // 设置启用post方式发送请求

    curl_setopt($ch, CURLOPT_POSTFIELDS,array('username'=>'rg1511phpA48','password'=>'123456','uop'=>'192.168.207.59'));                       // 设置post请求参数

    curl_setopt($ch, CURLOPT_COOKIEJAR,'D:\phpStudy\WWW\php7\aaa.txt');// 存放Cookie信息的文件名称

    curl_setopt($ch, CURLOPT_COOKIEFILE,'D:\phpStudy\WWW\php7\aaa.txt');// 读取cookie文件信息的数据

    curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0');               // 模拟用户使用的浏览器

    $file = curl_exec($ch);                          // 3.抓取URL并把它传递给浏览器

    curl_close($ch);                                 // 4.关闭cURL资源，并且释放系统资源

    var_dump($file);



//--------------------------------------------------------------


    // $ch = curl_init();//1.初始化，创建一个新cURL资源
    // curl_setopt($ch, CURLOPT_URL, "http://172.27.0.200/exam/index.php?m=Index&a=home");//2.设置URL和相应的选项
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    // curl_setopt($ch, CURLOPT_HEADER,0);
    // curl_setopt($ch, CURLOPT_COOKIEJAR,'D:\phpStudy\WWW\php7\aaa.txt');// 存放Cookie信息的文件名称
    // curl_setopt($ch, CURLOPT_COOKIEFILE,'D:\phpStudy\WWW\php7\aaa.txt');// 读取cookie文件信息的数据
    // curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:55.0) Gecko/20100101 Firefox/55.0');
    // $file = curl_exec($ch);//3.抓取URL并把它传递给浏览器
    // curl_close($ch);//4.关闭cURL资源，并且释放系统资源
    // var_dump($file);