<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		//引入Model
		$this->load->model('index_model','M');
		$this->load->model('login_model','D');
		//加载session类
		$this->load->library('session');
		//取session值
		$user = $this->session->userdata('user');
		if(!$user['user_id']){
			success('竟然忘了登陆',site_url('login/login_c/index'));
		}
		//获取当前控制器方法
		$url_name = $this->uri->segment(2).'/'.$this->uri->segment(3);
		//判断是否是管理员或主页
		if ($url_name!='index_c/index'&&$url_name!='index_c/'&&$user['user_id']!=1) {
			//通过session用户user_id在user_role查询角色role_id
			$role = $this->D->get_data('user_role','user_id',$user['user_id']);
			//角色id赋值给一个一维数组
			foreach ($role as $key => $val) {
				$role_id[] = $val['role_id'];
			}
			//通过角色id查看role_url表获取权限url_id
			$role_url = $this->D->get_data('role_url','role_id',$role_id);
			if (empty($role_url)) {
				success('竟然没有权限',site_url('Index/index_c/index'));
			}
			//把url_id赋值给一维数组
			foreach ($role_url as $key => $val) {
				$url_id[] = $val['url_id'];
			}
			//通过权限id查询url表拥有的所有权限
			$url = $this->D->get_data('url','url_id',$url_id);
			//查询用户拥有的权限并赋值给一维数组
			foreach ($url as $key => $val) {
				$url_allow[] = $val['url'];
			}
			if (!in_array($url_name,$url_allow)) {
				success('竟然没有权限',site_url('Index/index_c/index'));
			}
		}

	}
	//定义一个静态数组
		static $newData = array();
	//无限极分类
		public function Tree($data,$parent_id=0,$level=0)
		{
			if ($data)
			{
				foreach ($data as $key => $value)
				{
					if ($value['parent_id']==$parent_id)
					{
						$value['level'] = $level;
						self::$newData[] = $value;
						$this->Tree($data,$value['type_id'],$level+1);
					}
				}
				return self::$newData;
			}
		}

}
