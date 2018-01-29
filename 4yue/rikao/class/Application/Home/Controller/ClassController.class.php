<?php
namespace Home\Controller;
use Think\Controller;
class ClassController extends CommonController {
	/** 展示选课界面 */
    function add(){
    	$name=$_SESSION['name'];
    	$data=D('Admin')->find($name);
    	$list=D('Class')->select();
    	$this->assign('list',$list);
    	$this->assign('data',$data);
    	$this->display();
    }

    function addOne(){
    	$data=I('post.');
    	$res=D('Class')->addOne($data);
    	if ($res) {
    		$this->success("选课成功",U('Class/show'),2);
    	}else{
    		$this->error("选课失败",U('Class/add'),2);
    	}
    }

    function show(){
    	$admin=D('Admin')->select();
    	$infor=D('Infor')->select();
        

        foreach ($infor as $key => $val) {
            for ($i=0; $i <count($admin) ; $i++) {
                if ( $admin[$i]['admin_id'] == $val['infor_id'] ) {

                    $admin[$i]['infor_age'] = $val['infor_age'];
                    $admin[$i]['infor_sex'] = $val['infor_sex'];
                    $admin[$i]['infor_tel'] = $val['infor_tel'];
                    $admin[$i]['infor_email'] = $val['infor_email'];
                    $admin[$i]['infor_content'] = $val['infor_content'];
                    $admin[$i]['infor_hobby'] = $val['infor_hobby'];
                }
            }
        }
        $this->assign('list',$admin);
    	$this->display('show');
    }

    function choice(){
        $name=$_SESSION['name'];
        $this->assign('name',$name);
        $this->display('choice');
    }
    function self(){
        $name=I('get.name');
        $list=D('Admin')->selectOne("admin_name='$name'");
        foreach ($list as $k => $v) {
             $data=M('infor')->where("infor_id=".$v['admin_id'])->find();
        }
        
        $this->assign('list',$list);
        $this->assign('data',$data);
        $this->display('self');
    }
    function up(){
        $id=I('get.id');
        $list= D('Class')->findOne($id);
        
        $this->assign('list',$list);
        $this->assign('id',$id);
        $this->display();
    }
    function upOne(){
        $data=I('post.');
        $res=D('Class')->upOne($data);
        if ($res) {
            $this->success("修改成功",U('Class/show'),2);
        }else{
            $this->error("修改失败",U('Class/show'),2);
        }
    }
}