<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf8');
class IndexController extends Controller {
    public function index(){
    	$User = M("type");
    	$list = $User->select();

    	$this->assign('a',$list);
    	$this->display('add');
    }

    public function xiao(){
    	$name=I('get.name');
    	$User = M("book");
    	$list = $User->where("Book_name='$name'")->find();
    	if ($list==NULL) {
    		echo 1;
    	}else{
    		echo 0;
    	}

    }

    public function addDo(){
    	$post=I('post.');
    	$upload = new \Think\Upload();// 实例化上传类    
    	$upload->maxSize   =     3145728 ;// 设置附件上传大小    
    	$upload->rootPath   =     './' ;// 设置附件上传大小    
    	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
    	$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
    	$info   =   $upload->upload();   
    	// var_dump($info);die; 
    	if(!$info) {// 上传错误提示错误信息        
    		$this->error($upload->getError());
    	}
    	$f=$info['book_photo'];
    	$book_photo=$f['savepath'].$f['savename'];
    	$User = M("book"); // 实例化User对象
    	$data['book_name'] = $post['book_name'];
    	$data['book_price'] = $post['book_price'];
    	$data['book_auther'] = $post['book_auther'];
    	$data['book_photo'] = $book_photo;
    	$data['book_desc'] = $post['book_desc'];
    	$data['Tid'] = $post['Tid'];
    
    	$sql=$User->add($data);
    	if ($sql) {
    		$this->success('添加成功','show');
    	}else{
    		$this->success('添加失败');
    	}
    }

    public function ajax(){
		$page=I('get.p',1);
		
		$size=2;
		$sql=page('book',$page,$size,'where=1');

		// echo "<pre>";
		// var_dump($sql['list']);die;
		$this->assign('data',$sql);
		$this->assign('page',$page);
		$this->display('ajax');
	}

    public function show(){
    	
    	$this->display('show');
    }

    public function del(){
    	$id=I('get.id');
      
    	// var_dump($id);die;
    	$User = M("book"); // 实例化User对象
    	$sql=$User->delete($id);
        if ($sql==false) {
           echo 0;die;
        }
    	$this->ajax();
    }

}