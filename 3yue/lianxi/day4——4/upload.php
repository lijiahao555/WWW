<?php 
header('content-type:text/html;charset=utf8');
class Upload{
	public $name;//客户端原名称
	public $size;//文件大小
	public $type;//文件种类
	public $tmp_name;//临时文件名
	public $error;//错误信息

	function __construct($file_info){
		//把传过来的值赋值到指定值上
		$this->name=$file_info['name'];//客户端原名称
		$this->size=$file_info['size'];//文件大小
		$this->type=$file_info['type'];//文件种类
		$this->tmp_name=$file_info['tmp_name'];//临时文件名
		$this->error=$file_info['error'];//错误信息
	}

	public function upload(){
		//起名字
		$file_name=$this->file_name();
		//找后缀
		$file_houzhui=$this->file_houzhui();
		//创建文件夹
		$path='./img/';
		$this->file_wenjianjia($path);
		//拼接
		$file_pinjie=$path.$file_name.$file_houzhui;
		
		//临时文件移动到指定文件夹
		$file_zhiding=$this->file_zhiding($file_pinjie);
		return $file_pinjie;
	}

	protected function file_name(){
		return time().rand(0,20000);
	}

	protected function file_houzhui(){
		return substr($this->name, strrpos($this->name,'.'));
	}

	protected function file_wenjianjia($path){
		if (!file_exists($path)) {
			mkdir($path,0777);
		}
	}

	protected function file_zhiding($file_pinjie){
		move_uploaded_file($this->tmp_name,$file_pinjie);
	}



}
 ?>