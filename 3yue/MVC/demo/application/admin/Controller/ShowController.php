<?php 
//定义类 类名和传值一样
class Show{
	//定义方法 方法名和传值一样
	function index(){
		//读取模型里处理数据的文件，由于子继承父类，所以可直接调用子类中的方法
		require(MVC_Admin_Model.'dateModel.php');
		//直接实例化，调用子类中构造函数，构造函数自动调用父类的构造方法连接数据库
		$show=new Date();
		//通过继承 ，直接调用父类中的查询方法，返回的是数组
		$sql=$show->select('*','admin','id');
	
		require(MVC_Admin_View.'showView.php');
	}

}



 ?>