<?php
header("content-type:text/html;charset=utf-8");

class Rich{

	public $name = "王思聪";//公共的
	public $sex = "男";//公共的

	//将汽车数据隐藏  类外不能直接访问 
	protected $car = "奔驰";//受保护的
	private $money = "10000";//私有的

	//将受保护的数据通过show的方法对外显示
	public function show(){
		echo 'hello<br />';
		echo $this->name."<br />";
		echo $this->car."<br />";
		echo $this->money;
	}
}

$wsc = new Rich();
$wsc->name = "xiaowang";
echo $wsc->name;
// echo $wsc->name;
// echo $wsc->car;
// echo $wsc->money;
// $wsc->show();