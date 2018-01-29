
 <?php
header('content-type:text/html;charset=utf8');

//用关键字class定义 后面跟类名 类主体用{}括起来 ,类命名通常每个单词的第一个字母大写
class Person{
	public $name = ""; //定义了属性 类成员
	public $sex = "";
	public $age;
	
	//构造函数属于php里面的魔术方法
	function __construct($name,$sex,$age){
		$this->name = $name;
		$this->sex = $sex;
		$this->age = $age;
		//类被实例化时自动调用
		// echo "我被实例化";
	}

	//定义一个方法
	// public function eat(){
	// 	echo "我正在吃";
	// }

	// public function sleep(){
	// 	echo "睡觉";
	// }

	public function selfDesc(){
		echo "我叫".$this->name."我今年".$this->age.'<br />';
	}

	// 1.对象的引用消失  unset($obj)
	// 2.脚本结束时 也会触发析构方法 __destruct()方法
	function __destruct(){
		echo $this->name."我被销毁了<br />";
	}
}

//类到对象的实例化
//类实例化为对象时用关键字new，new后面跟类名和一对括号
$p = new Person('李四','男',18);
$p->selfDesc();
//对象中的属性可以通过->符号来访问
// echo $p->name;
//对象中的方法可以通过->符号来访问
// $p->eat();
// $p->selfDesc();
unset($p);

$z = new Person('张三','女',20);
$z->selfDesc();
?>