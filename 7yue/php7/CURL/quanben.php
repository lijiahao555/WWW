<?php
/**
 * @Author: Marte
 * @Date:   2017-10-09 16:56:48
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-10-10 08:14:43
 */
header("content-type:text/html;charset=gbk");
//1.初始化，创建一个新cURL资源
$ch = curl_init();
//2.设置URL和相应的选项
curl_setopt($ch, CURLOPT_URL, "http://www.quanben.co/sort/1_1.html");
curl_setopt($ch, CURLOPT_HEADER,0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//3.抓取URL并把它传递给浏览器
$file = curl_exec($ch);
//4.关闭cURL资源，并且释放系统资源
curl_close($ch);

// $file = file_get_contents('./complete_edition3.html');

// var_dump($file);exit;


$zhengze = '#<div class=".*">\s+'.
            '<div class=".*"><a target=".*" href=".*"><img width=".*" height=".*" alt="(.*)" src="(.*)"></a></div>\s+'.
            '<ul>\s+'.
            '<h2>.*<a target=".*" href=".*">.*</a>.*</h2>\s+'.
            '<li>.*<em class="blue"><a href=".*" target=".*">(.*)</a></em></li>\s+'.
            '<li><p><P>(.*)<BR></P><br></p></li>\s+'.
                '#';
preg_match_all($zhengze,$file,$arr);
foreach ($arr[2] as $k => $v) {

    $img_name[$k] = './img/'.time().mt_rand().'.png';
    file_put_contents($img_name[$k],file_get_contents($v));
    // if ($k==5) {
    //     break;
    // }
}
unset($arr[0]);
// var_dump($ary);

$ary = array();
foreach ($arr[1] as $key => $value) {

    $ary[$key]['b_name']    = $value;
    $ary[$key]['b_img']     = $img_name[$key];
    $ary[$key]['b_author']  = $arr[3][$key];
    $ary[$key]['b_synopsis']= $arr[4][$key];
    // if ($key==5) {
    //     break;
    // }

}
// var_dump($ary);exit;
$dsn = "mysql:host=127.0.0.1;dbname=text;"; //就是构造我们的DSN（数据源）
$db = new PDO($dsn,'root','root');          // 初始化一个PDO对象
foreach ($ary as $k => $v) {

     $sql = "INSERT INTO books(b_name,b_img,b_author,b_synopsis) VALUES('".$v['b_name']."','".$v['b_img']."','".$v['b_author']."','".$v['b_synopsis']."');";// mysql语句
    $db->query('set names gbk;');
    $list = $db->exec($sql);
}





