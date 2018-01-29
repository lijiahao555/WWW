<?php
header("content-type:text/html;charset=utf-8");

class Role{
	public $name;
	public $money;

	function __construct($name, $money){
		$this->name = $name;
		$this->money = $money;
	}
	public function dazhao(){
		echo "我是".$this->name.'我值'.$this->money.'我正在放大招<br />';
	}
}

$libai = new Role('李白', 13888);
$libai->dazhao();

$daji = new Role('妲己', 8888);
$daji->dazhao();