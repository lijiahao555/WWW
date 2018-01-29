<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends Controller {
	/** 展示登录列表 */
   function admin(){
   		$this->display();
   }
   /** 处理登录数据 */
   function adminDo(){
   		$data=I('post.');
   		$Admin=D('Admin')->exam($data);
   		if ($Admin==0) {
   			$_SESSION['name']=$data['admin_name'];
   			if ($data['admin_7']==7) {
   				setcookie("name",$data['admin_name'],time()+60*60*24*7,'/');
   			}
   			$this->success("登录成功",U('Class/choice'),2);
   		}else if($Admin==1){
   			$this->error("密码错误",U('Admin/admin'),2);
   		}else{
   			$this->error("姓名错误",U('Admin/admin'),2);
   		}
   }

}