<?php
class  xml{
    public  $dom;   //dom对象
    public $data;   //xml数据
    public  function __construct(){
        //实例化dom对象
        $this->dom = new DOMDocument('1.0','utf-8');
    }
    public  function get_xml($path){
        //获取xml
        $this->dom->load($path);
        //获取根节点
        $root = $this->dom->documentElement;
        //根节点为空
        if(!$root->childNodes->length) return;
        //递归获取子集内容
        $this->data = $this->get_child($root);
        return $this->data;
    }
    //写入xml文件
    public  function set_xml($data){
        $this->dom = new DOMDocument('1.0','utf-8');
        //创建根节点
        $root = $this->dom->createElement('root');
        //写入子集数据
        $this->set_child($data,$root);
        //将根结点写入到文档节点种，并声称xml
        $this->dom->appendChild($root);
        // header('content-type:text/xml;charset=utf-8');
        return $this->dom->saveXML($this->dom);
    }
    public  function set_child($data,$parent){
        //循环创建节点
        foreach ($data as $key=>$val){

            if(is_int($key)) $key = 'i_'.$key;
            //创建元素节点
            $ele = $this->dom->createElement($key);
            if(!is_array($val)){
                $txt = $this->dom->createTextNode($val);
                $ele->appendChild($txt);
            }else{
                $this->set_child($val,$ele);
            }
            //将子集元素节点写到父级节点下
            $parent->appendChild($ele);
        }
    }
    //获取子节点内容
    public  function get_child($child){
        $data = array();
        //获取子节点
        $child = $child->childNodes;
        foreach ($child as $val){
            //当前元素是文本节点
            if($val->nodeName=='#text'){
                $data[] = $val->nodeValue;
            }
            $v_child = $val->childNodes->item(0);
            //当前元素是元素节点
            if($v_child->nodeName=='#text'){
                $data[$val->nodeName]=$val->nodeValue;
            }else{
                $data[$val->nodeName] = $this->get_child($val);
            }
        }
        return $data;
    }
    public  function __destruct()
    {
        $this->dom = null;
    }
}
//$xml = new xml();
//$url = '';
//$data = $xml ->get_xml($url);
//$xml->set_xml($data);