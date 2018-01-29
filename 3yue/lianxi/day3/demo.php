<?php
// class Rich{
// 	public $name = 'wang';
// 	protected $age = 16;
// 	private $car = "BSLS";
// }

// $wsz = new Rich();
// echo $wsz->name;
// echo $wsz->age;

//继承
class Car{
	public $gulu = 4;
	private $houchejing = 2;
	protected $men = 5;

	public function pao(){
		echo "zhengzaifei";
	}
}

class Audi extends Car{
	public $pinbai = "奥迪";
	public function show(){
		//父类的成员可以用$this访问
		echo $this->gulu;
		echo $this->men;
		// echo $this->houchejing;
		parent::pao();
	}

}

$audi = new Audi();
echo $audi->gulu;
// $audi->show();

//多态
class Role{
	public $name = "wuming";
	public $skin;
	public $monry;

	public function xiaozhao(){

	}

	public function dazhao(){

	}

	public function pao(){
		echo '正在泡';
	}
}

// 李白  跟妲己  

