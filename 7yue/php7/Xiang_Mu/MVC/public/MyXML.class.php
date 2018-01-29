<?php
header("content-type:text/html;charset=utf-8");

class  XML{
	public $dom;  //dom对象

	public $data; //xml数据

	//实例化xml对象
	public function __construct(){
		//创建dom解析对象
		$this->dom = new DOMDocument('1.0','utf_8');
	}

	//获取xml数据，以及根节点
	public function  get_xml($url){
		
		//载入xml文件
		$this->dom->load($url);

		//获取根节点
		$root = $this->dom->documentElement;
		
		//判断根节点下是否为空
		if(!$root->childNodes->length) return;

		//获取子级内容
		$this->data = $this->get_child($root);

		return $this->data;

	}

	//子节点
	public function get_child($child){

		$data=array();

		//获取子节点
		$child = $child->childNodes;

		foreach ($child as $val) {
			//判断当前元素下是文本节点
			if($val->nodeName == "#text"){
				$data[] = $val->nodeValue;
			}

			$v_child = $val->childNodes->item(0);

			//判断当前元素是元素节点
			if($v_child->nodeName == "#text"){
				$data[$val->nodeName] = $val->nodeValue;
			}else{
				$data[$val->nodeName] = $this->get_child($val);
			}
		}
		return $data;
	}

	//写入xml文件
	public function set_xml($data){

		$this->dom = new DOMDocument('1.0','utf_8');

		//创建根节点
		$root = $this->dom->createElement('root');

		//写入子级数据
		$this->set_child($data,$root);

		//写入根节点下
		$this->dom->appendChild($root);

		header("content-type:text/xml;charset=utf-8");
		echo $this->dom->saveXML($this->dom);
	}
	//子节点
	public function set_child($data,$parent){

		//创建子节点
		foreach ($data as $key => $value) {
			//创建普通节点
			$key = $this->dom->createElement($key);

			if(!is_array($value)){
				$value=$this->dom->createTextNode($value);
				$key->appendChild($value);
			}else{
				$this->set_child($value,$key);
			}

			$parent->appendChild($key);
		}
	}

	public function __destruct(){
		$this->dom = null;
	}



}

//实例化对象
$new = new XML();
// //xml读取
// var_dump($res);

// //xml写入
