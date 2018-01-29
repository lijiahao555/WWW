<?php 
header('content-type:text/html;charset=utf8');
class Stort{
	public $name="";
	public $height="";
	public $weight="";
	public $sex="";
	public $age='';
	//构造函数 
	function __construct($name,$height,$weight,$sex,$age){
		$this->name=$name;
		$this->height=$height;
		$this->weight=$weight;
		$this->sex=$sex;
		$this->age=$age;

	}
	//声明方法
	function bootFootBall(){
		if ($this->height>185&&$this->weight<85) {
			echo "小明，符合踢足球的要求";
		}else{
			echo "小明，不符合踢足球的要求";
		}
	}
	//析构函数
	function __destruct(){
		echo "</br><font color='red'>对象被销毁，调用析构函数</font>";
	}

}
$p=new Stort('小明',190,75,'男',25);
$p->bootFootBall();

 ?>