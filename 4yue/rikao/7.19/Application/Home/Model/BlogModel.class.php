<?php
namespace Home\Model;
use Think\Model;
class BlogModel extends Model { 
   protected $tableName = 'blog';
   public function addOne($data,$file){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath   =     './' ;// 设置附件上传大小
		$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录// 上传文件 
		$info   =   $upload->upload();
		
		$f=$info['file'];
		$file=$f['savepath'].$f['savename'];
		if(!$info) {// 上传错误提示错误信息    
			$this->error($upload->getError());
		}
		$biao=implode($data['box'], ',');
		$list['name']=$data['name'];
		$list['file']=$file;
		$list['biao']=$biao;
		return M($this->tableName)->add($list);
   }

   	function select(){
   		return M($this->tableName)->select();
   	}

   	function find($id){
   		return M($this->tableName)->find($id);
   	}
   	function upOne($post,$file){
   		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath   =     './' ;// 设置附件上传大小
		$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录// 上传文件 
		$info   =   $upload->upload();
		$f=$info['file'];
		$file=$f['savepath'].$f['savename'];
		$l=M($this->tableName)->find($id);
		if ($file=='') {

			$fil=$l['file'];
		}else{
			$fil=$file;
		}
		$id=$post['id'];
		$biao=implode($data['box'], ',');

		$data['name']=$post['name'];
		$data['file']=$fil;
		$data['biao']=$biao;
		$a=M($this->tableName)->where("id=$id")->save($data);
		echo $a;die;
   	}

}
