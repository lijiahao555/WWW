<?php 
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class ShowController extends Controller{
	public function show(){
	
		
		$this->display();
	}
	public function add(){
		$this->display('add');
	}

	public function addDo(){
		$post=I('post.');
		$date=microtime('Y-m-d H:i:s');
		// var_dump($date);die;
		 $upload = new \Think\Upload();// 实例化上传类    
		 $upload->maxSize   =     3145728 ;// 设置附件上传大小    
		 $upload->rootPath   =     './' ;//
		 $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		 $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
		 $info   =   $upload->upload();    
		 if(!$info) {// 上传错误提示错误信息        
		 	$this->error($upload->getError()); die;   
		 }
		$f=$info['file'];
		$file=$f['savepath'].$f['savename'];
		$User = M("type"); // 实例化User对象
		$data['name'] = $post['name'];
		$data['file'] = $file;
		$data['count'] = $post['count'];
		$data['on'] = $post['on'];
		$data['date'] = $date;

		$sql=$User->add($data);
		if ($sql) {
			$this->success('添加成功','show');
		}else{
			$this->success('添加失败');
		}
	
	}
	public function ajax(){
		$page=I('get.p',1);
		$size=6;
		$sql=page('type',$page,$size,'where=1');
		// echo "<pre>";
		// var_dump($sql['list']);die;
		$this->assign('date',$sql);
		$this->display();
	}
	public function xiao(){
		$name=I('get.name');
		$User = M("type"); // 实例化User对象
		$sql=$User->where("name='$name'")->find();
		// var_dump($sql);die;
		if ($sql==NULL) {
			echo 1;
		}else{
			echo 2;
		}

	}
}
 ?>