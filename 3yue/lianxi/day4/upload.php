<?php 
class Upload{
	public $name;//原名称
	public $type;//种类
	public $size;//大小
	public $tmp_name;//临时文件名
	public $error;//错误代码

	//错误信息 为空则没有出错
	protected $fileerror='';

	//上传文件格式
	protected $file_geshi=array('.png','.jpg','gif');

	function __construct($fileinfo){
		//$file  实例化类，调用对象传来的值
		//初始化参数 将传过来的文件信息赋值到本类的属性上
		$this->name=$fileinfo['name'];//原名称
		$this->type=$fileinfo['type'];//种类
		$this->size=$fileinfo['size'];//大小
		$this->tmp_name=$fileinfo['tmp_name'];//临时文件名
		$this->error=$fileinfo['error'];//错误代码/信息

	}
	public function upload(){
		if ($this->error==0) {
			//第一步，起名字
			$filename=$this->username();
			//第二步，后缀
			$houzhui=$this->houzhui();
			if (!$this->file_geshi_panduan($houzhui)) {
				return false;
			}
			//第三步，建立、判断文件夹是否存在
			$path="./img/";
			$this->chuangjian($path);

			//第四步，拼接图片信息
			$fileweizhi=$path.$filename.$houzhui;

			//第五步，把临时文件移动到置顶文件夹
			$this->file_move($fileweizhi);
			return $fileweizhi;
		}else{
			$this->file_cuowu();
		}
	}

	//对外接口，判断错误信息的
	public function geterror(){
		//返回空值，没错
		return $this->fileerror;
	}

	//判断上传文件格式
	protected function file_geshi_panduan($h){
		if (in_array($h, $this->file_geshi)) {
			//可以上传文件格式
			return true;
		}else{
			//不可以
			$this->fileerror="格式错误";
			return false;
		}
	}

	protected function username(){
		return time().rand(0,20000);
	}

	protected function houzhui(){
		return substr($this->name, strrpos($this->name,'.'));
	}

	protected function chuangjian($path){
		if (!file_exists($path)) {
			mkdir($path,0777);
		}
	}

	protected function file_move($path){

		move_uploaded_file($this->tmp_name, $path);
	}

	protected function file_cuowu(){
		switch ($this->error) {
			case 1:
				$this->fileerror="文件超过了PHP,ini的大小";
				break;
			case 2:
				$this->fileerror="文件超过了MAX_file_size的大小";
				break;
			case 3:
				$this->fileerror="文件部分被上传";
				break;
			case 4:
				$this->fileerror="文件没有上传";
				break;
			default:
				$this->fileerror="";
				break;
		}
	}



}
 ?>