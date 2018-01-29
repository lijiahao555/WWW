<?php
namespace Admin\Controller;
use Think\Controller;
class LabelController extends CommonController {
	/** 展示添加标签页面 */
    public function label(){
        $this->display();
    }
    /** 展示标签列表页面 */
    public function show(){
    	$list=D('Label')->select();
    	$this->assign('list',$list);
    	$this->display();
    }
    /** 添加一条标签 */
    public function labelOne(){
    	$data=I('post.');
    	$res=D('Label')->addOne($data);
    	if ($res) {
    		$this->success('添加成功',U('Label/show'),2);
    	}else{
    		$this->error('添加失败',U('Label/show'),2);
    	}
    }
    /** 删除一条标签 */
    function del(){
        $id=I('get.id');
        $res=D('Label')->delOne($id);
        if ($res) {
            $this->success('删除成功',U('Label/show'),2);
        }else{
            $this->error('删除失败',U('Label/show'),2);
        }
    }
    /** 展示修改的信息 */
    function up(){
        $id=I('get.id');
        $res=D('Label')->find($id);
        $this->assign('res',$res);
        $this->assign('id',$id);
        $this->display();
    }
    /** 修改一条标签 */
    function upOne(){
        $data=I('post.');
        $res=D('Label')->upOne($data);
        if ($res) {
            $this->success('修改成功',U('Label/show'),2);
        }else{
            $this->error('修改失败',U('Label/show'),2);
        }
    }

}