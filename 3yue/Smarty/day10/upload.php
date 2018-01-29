<?php

class Upload{
	public $name;//客户端的原名称
	public $size;//文件的大小 字节
	public $tmp_name;//服务端临时文件名
	public $type;//文件类型
	public $error;//文件上传相关的错误代码

	function __construct($fileInfo){
		//实例化本类时将文件的信息传递过来
		//初始化参数
		$this->name = $fileInfo['name'];
		$this->size = $fileInfo['size'];
		$this->type = $fileInfo['type'];
		$this->error = $fileInfo['error'];
		$this->tmp_name = $fileInfo['tmp_name'];
	}

	public function upload(){
		//1起名字
		$fileName = $this->qimingzi();
		//2截取后缀
		$houzhui = $this->houzhui();
		//3创建文件夹
		$path = "./img/";
		$this->chuangjian($path);

		//拼接服务器指定的位置
		$zhidingweizhi = $path.$fileName.$houzhui; //  ./img/111111111199.jpg
		//将临时文件移动到指定的位置
		$this->moveFile($zhidingweizhi);
		return $zhidingweizhi;
	}

	//其文件名保持唯一性
	protected function qimingzi(){
		return time().rand(0, 10000);
	}

	//截取后缀
	protected function houzhui(){
		return substr($this->name, strrpos($this->name, '.'));
	}

	//创建文件夹（服务端指定地址)
	protected function chuangjian($path){
		if(!file_exists($path)){
			//创建文件
			mkdir($path, 0777);
		}
	}

	//移动到指定的位置
	protected function moveFile($path){
		move_uploaded_file($this->tmp_name, $path);
	}
}