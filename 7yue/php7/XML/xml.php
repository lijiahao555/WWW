<?php
/**
 * @Author: XML 操作
 * @Date:   2017-10-12 12:04:00
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-10-12 20:55:39
 */
$text = DOMfangfa();

$dom= new DOMDocument('1.0','utf-8');//创建dom解析对象

$root = $dom->createElement('root');//创建普通节点

foreach ($text as $ke => $val) {
    $item = $dom->createElement('item_'.$ke);//创建普通节点
    foreach ($val as $k => $v) {
        $zi  = $dom->createTextNode($v);//创建文本节点
        $jie = $dom->createElement($k);//创建普通节点
        $jie->appendChild($zi);//把文本节点添加到普通节点中
        $item->appendChild($jie);

            $oo[] = $k.'---'.$v.'---'.$k;
    }


    $root->appendChild($item);
}
var_dump($oo);exit;
$dom->appendChild($root);//把appstore加入到文档下

header("content-type:text/xml;charset=utf-8");//输出

echo $dom->saveXML($dom);//输出






exit;
$dom= new DOMDocument('1.0','utf-8');//创建dom解析对象

$tl=$dom->createTextNode('天龙八部');//创建文本节点

$name = $dom->createElement('name');//创建普通节点

$name->appendChild($tl);//把天龙节点添加到name节点中

$dom->appendChild($name);//把appstore加入到文档下

header("content-type:text/xml;charset=utf-8");//输出

echo $dom->saveXML($dom);//输出

// $dom->save('ss.xml');//生成

















exit;

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

var_dump(DOMfangfa());

exit;

header("content-type:text/html;charset=utf-8");
$dom = new DOMDocument('1.0', 'utf-8');
$dom->load('./xml.xml');
$shu = $dom->getElementsByTagName('result')->item(0);
foreach ($shu->childNodes as $k => $v) {
    foreach ($v->childNodes as $key => $value) {
        $ary[$value->nodeName] = $value->nodeValue;
    }
    $arr[] = $ary;
}
var_dump($arr);

exit;

var_dump(xmlToArray(file_get_contents('xml.xml')));
function xmlToArray($xml){
    libxml_disable_entity_loader(true);//禁止引用外部xml实体
    // 函数把 XML 字符串载入对象中。
    $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
    // json_encode 对变量进行 JSON 编码 |  json_decode 对 JSON 格式的字符串进行解码
    return json_decode(json_encode($xmlstring),true);
}