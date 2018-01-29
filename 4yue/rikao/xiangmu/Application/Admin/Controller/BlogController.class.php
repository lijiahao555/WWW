<?php
namespace Admin\Controller;
use Think\Controller;
class BlogController extends CommonController {
	/** 展示分类添加 */
    public function blog(){
    	$this->display();
    }
    /** 展示博文信息 */
    public function show(){
        $list=D('Blog')->selectAll();
        $this->assign('list',$list);
    	$this->display();
    }
    /** 操作添加博文信息 */
    function blogOne(){
    	$post=I('post.');
    	$res=D('Blog')->addOne($post);
        if ($res) {
            $this->success("添加成功",U('Blog/show'),2);
        }else{
            $this->error("添加失败",U('Blog/blog'),2);
        }
    }
    /** 博文删除 */
    function del(){
        $id=I('get.id');
        $res=D('Blog')->delOne($id);
        if ($res) {
           echo "ok";
        }else{
            echo "no";
        }
    }
}