<?php
namespace Admin\Model;
use Think\Model;
class BlogModel extends Model {
	/**
	 * 添加博文信息
	 * @param [type] $post 数据
	 */
	function addOne($post){
		$name=$_SESSION['name'];
		$login_id=M('login')->where("login_name='$name'")->find();
		$post['blog_addtime']=date('Y-m-d H:i:s');
		$post['admin_id']=$login_id['login_id'];
		return $this->add($post);
	}
	/**
	 * 展示博文页面操作
	 */
	function selectAll(){
		return $this->select();
	}

	function del($id){
		return $this->delete($id);
	}
		
}