<?php

class Upload{
	protected $name;//客户端的原名称
	protected $size;//文件的大小 字节
	protected $tmp_name;//服务端临时文件名
	protected $type;//文件类型
	protected $error;//文件上传相关的错误代码

	//错误信息属性   为空代表没有错误发生
	protected $errorInfo = '';

	//可以上传文件格式
	protected $yesHouzhui = array('.jpg', '.png', '.gif');

	function __construct($fileInfo){
		//实例化本类时将文件的信息传递过来
		//初始化参数 将传过来的文件信息赋值到本类的属性上
		$this->name = $fileInfo['name'];
		$this->size = $fileInfo['size'];
		$this->type = $fileInfo['type'];
		$this->error = $fileInfo['error'];
		$this->tmp_name = $fileInfo['tmp_name'];
	}

	public function upload(){
		if($this->error == 0){
			//1起名字
			$fileName = $this->qimingzi();
			//2截取后缀
			$houzhui = $this->houzhui();

			//3判断文件格式
			if(!$this->checkHuizhui($houzhui)){

				return false;
			}
			//4创建文件夹
			$path = "./img/";
			$this->chuangjian($path);

			//拼接服务器指定的位置
			$zhidingweizhi = $path.$fileName.$houzhui; //  ./img/111111111199.jpg
			//5将临时文件移动到指定的位置
			$this->moveFile($zhidingweizhi);
			return $zhidingweizhi;
		}else{
			return $this->dealError();
		}
	}

	//对外开放的接口  获取错误信息
	public function geterror(){
		//如果返回的是空值  就带表没有错误发生 ，不为空就代表详细错误信息
		return $this->errorInfo;

	}

	//判断文件的格式
	protected function checkHuizhui($h){
		
		if(in_array($h, $this->yesHouzhui)){
			//可以上传文件格式

			return true;
		}else{
			$this->errorInfo = "文件格式不正确";
			//不可使
			return false;
		}
	}

	//其文件名保持唯一性
	protected function qimingzi(){
		//返回一个唯一的名字
		return time().rand(0, 10000);
	}

	//截取后缀
	protected function houzhui(){
		//从客户端文件原名称截取文件后缀
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
		//$path 传过来的指定位置参数
		//将文件服务端临时文件名移动到指定的位置
		move_uploaded_file($this->tmp_name, $path);
	}

	//处理错误信息
	protected function dealError(){
		//将详细的错误信息 赋值到$this->errorInfo属性上
		switch ($this->error) {
			case 1:
				$this->errorInfo = '文件超过的php.ini的限制大小';
				break;
			case 2:
				$this->errorInfo = '文件超过表单MAX_FILE_SIZE的限制大小';
				break;
			case 3:
				$this->errorInfo = '文件部分被上传';
				break;
			case 4:
				$this->errorInfo = '没有文件被上传';
				break;
			default:
				$this->errorInfo = '';
				break;
		}
	}
}