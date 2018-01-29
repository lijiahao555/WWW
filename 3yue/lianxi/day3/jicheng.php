<?php
header("content-type:text/html;charset=utf-8");

class Car{
	function __construct(){
		echo "Car被实例化<br />";
	}
	public $gulu = 4;//公有属性成员
	protected $houchejing = 2;//受保护属性成员
	private $door = '4个门';//私有属性成员
	public $name;
	public function showDoor(){
		echo "我是Car的方法<br />";
		//打印了一个私有属性成员
		echo $this->door;
	}

	public function pao(){
		echo "Car正在跑";
	}

}

class Audi extends Car{
	//
	function __construct(){
		parent::__construct();
		echo "audi被实例化了<br />";
	}
	function show(){
		echo $this->gulu."类内<br />";
		//子类类内可以访问父类通过protected修饰出来的成员
		echo $this->houchejing.'类内<br />';
		//子类类内不可以访问父类通过private修饰出来的成员
		// echo $this->door;

		// $this->showDoor();

		// Car::showDoor();

		parent::showDoor();

	}

	public function pao(){
		echo "audi正在跑";
	}
}

$audi = new Audi();
$audi->pao();
// echo $audi->door;
// echo $audi->houchejing;
//类外访问父类的属性
// echo $audi->gulu;
// $audi->show();

