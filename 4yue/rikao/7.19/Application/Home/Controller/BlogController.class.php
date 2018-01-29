<?php
namespace Home\Controller;
use Think\Controller;
class BlogController extends Controller {
	public function add(){
    	$this->display('add');
    }
    function addDo(){
    	$data=I('post.');
    	$file=$_FILES['file'];
    	$list=D('Blog')->addOne($data,$file);
    	if ($list) {
    		$this->success('ok',U('Blog/show'),2);
    	}else{
    		$this->error('no',U('Blog/add'),2);
    	}
    }
    function show(){
    	$list=D('Blog')->select();
    	// var_dump($list);die;
    	$this->assign('list',$list);
    	$this->display('show');
    }

    function up(){
     	$id=I('get.id');
    	$list=D('Blog')->find($id);

     	$this->assign('id',$id);
     	$this->assign('list',$list);
     	$this->display('up');
     	
    }

    function upOne(){
    	$post=I('post.');
    	$file=$_FILES['file'];

    	D('Blog')->upOne($post,$file);
    }
}