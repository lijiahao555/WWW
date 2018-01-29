<?php
/**
 * @Author: Marte
 * @Date:   2017-10-09 08:55:07
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-10-09 13:40:06
 */

// $ch = curl_init();//1.初始化，创建一个新cURL资源
// curl_setopt($ch, CURLOPT_URL, "http://top.baidu.com/buzz?b=2&fr=topboards");//2.设置URL和相应的选项
// curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//获取的信息以文件流的形式返回，而不是直接输出
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);// 对认证证书来源的检查
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);// 从证书中检查SSL加密算法是否存在
// curl_setopt($ch, CURLOPT_HEADER, 0);//3.抓取URL并把它传递给浏览器
// $file = curl_exec($ch);//4.关闭cURL资源，并且释放系统资源curl_close($ch);

$file = file_get_contents('./shuju1.html');
$zengze = '#<td class="keyword">\s*'
          .'<a class=".*" target=".*" href=".*" href_top=".*">(.*)</a>\s*'
          .'#';
preg_match_all($zengze,$file,$arr);
// unset($arr[0]);
var_dump($arr);exit;

$dsn = "mysql:host=127.0.0.1;dbname=text;"; //就是构造我们的DSN（数据源）
$db = new PDO($dsn,'root','root');          // 初始化一个PDO对象
for ($i=0; $i < 10; $i++) {
    $sql = "INSERT INTO yue_user(u_name) VALUES('".$arr[1][$i]."');";
    $list = $db->exec($sql);
}






/*
<h3 class="vrTitle">
<a href="http://finance.huagu.com/work86=17826056.html" id="uigs_0" target="_blank">��������Դ��<em><!--red_beg-->PHP<!--red_end--></em></a>
</h3>
 */
/*
<h3 class="vrTitle">
<a href="http://money.huagu.com/maxwelllkpl/4" id="uigs_3" target="_blank">��������˹����ֹ�������ʹ��Linux��Crontab��ʱִ��<em><!--red_beg-->PHP<!--red_end--></em>�ű��ķ���</a>
</h3>
 */

// $ch = curl_init();//1.初始化，创建一个新cURL资源
// curl_setopt($ch, CURLOPT_URL, "http://news.sogou.com/news?&clusterId=&p=42230305&time=0&query=php&mode=2&media=&sort=1");//2.设置URL和相应的选项
// curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);//获取的信息以文件流的形式返回，而不是直接输出
// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);// 对认证证书来源的检查
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);// 从证书中检查SSL加密算法是否存在
// curl_setopt($ch, CURLOPT_HEADER, 0);//3.抓取URL并把它传递给浏览器
// $file = curl_exec($ch);//4.关闭cURL资源，并且释放系统资源curl_close($ch);
// var_dump($file);
header("content-type:text/html;charset=jbk");
$file = file_get_contents('./shuju.html');
$zengze = '#<h3 class="vrTitle">\s*'
          .'<a href=".*" id=".*" target=".*">(.*)<em>.*</em>.*</a>\s*'
          .'#';
preg_match_all($zengze,$file,$arr);
var_dump($arr);

// $dsn = "mysql:host=127.0.0.1;dbname=text;"; //就是构造我们的DSN（数据源）
// $db = new PDO($dsn,'root','root');          // 初始化一个PDO对象
// for ($i=0; $i < 10; $i++) {
//     $sql = "INSERT INTO yue_user(u_name) VALUES('".$arr[1][$i]."');";
//     $list = $db->exec($sql);
// }

// var_dump($sql);
