<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends CommonController {
	/** 展示分类添加 */
    public function comment(){
    	$this->display();
    }

    public function show(){
    	$this->display();
    }
}