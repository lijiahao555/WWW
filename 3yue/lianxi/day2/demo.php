<?php 
header('content-type:text/html;charset=utf8');

class People{
	//定义类常量

	const GUDING='张二';

	public $name='张三';//非静态属性
	public static $sex='男';//静态属性

	//非静态方法
	public function eat(){
		//可以访问静态属性
		echo $this->name."我正在吃<br/>";
		echo self::$sex."<br/>";
		echo self::GUDING;
	}

	//静态方法
	public static function eata(){
		//不能访问非静态属性
		//静态方法可以使用类常量
		echo self::GUDING;
		echo self::$sex;
	}


}
//非静态调用,输出
$p=new People;//对象实例化
// echo $p->name;//调用非静态属性 echo 输出
$p->eat();//调用非静态方法

//静态调用
// echo People::GUDING;//类外调用常量
// echo People::$sex;//类外调用静态属性
// echo People::eata();//类外调用静态方法

 ?>