<?php
/**
 * @Author: Marte
 * @Date:   2017-10-13 11:50:13
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-10-13 21:00:23
 */
header("content-type:text/html;charset=utf-8");
$an = 'xxoo'.time();
$mi = md5($an);

$mimi = $_GET['mimi']; // md5加密

$time = $_GET['time']; // 请求时间

if ($mi==$mimi && ($time+10)>time()) {
    $a =  date("Y-m-d h:i:s",time());
}else{
    $a = '登录失效';
}

if (empty($_GET['jsoncallback'])) {
    var_dump($a);exit;
}else{
    echo $_GET['jsoncallback']."('$a')";
}




exit;
$xx = $_GET['shen'];
$url = "http://api.k780.com:88/?app=idcard.get&idcard=".$xx."&appkey=10003&sign=b59bc3ef6191eb9f747dd4e83c99f2a4&format=xml";
$lala = DOMfangfa($url);
$dizhi = $lala['style_citynm'];

echo $_GET['oo']."('$dizhi')";





function DOMfangfa($url='./xml.xml'){
    header("content-type:text/html;charset=utf-8");
    $dom = new DOMDocument('1.0', 'utf-8');
    $dom->load($url);
    $shu = $dom->getElementsByTagName('result')->item(0);
    foreach ($shu->childNodes as $k => $v) {
        if ($v->childNodes->item(0)->nodeName == '#text') {
            $arr[$v->nodeName] = $v->nodeValue;
        }else{
            foreach ($v->childNodes as $key => $value) {
                $ary[$value->nodeName] = $value->nodeValue;
            }
            $arr[] = $ary;
        }
    }
    return $arr;
}