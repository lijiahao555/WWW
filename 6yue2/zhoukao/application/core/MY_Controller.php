<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (empty($_SESSION['user_name'])) {
			success('请先登录','Login/login');die;
		}
		#取出session
		$name=$_SESSION['user_name'];
		#抓取当前访问的Url
		$uri1=$this->uri->segment(1);
		$uri2=$this->uri->segment(2);
		$url=$uri1.'/'.$uri2;

		#求出登录人用户ID
		$this->load->model('User_model','user');
		$user_id=$this->user->select_name($name);
		#判断当前用户所访问的权限
		if ($url!='Demo/demo' && $user_id['user_id']!=7) {
			#求出登录人的所属角色ID
			$this->load->model('User_role_model','user_role');
			$role_id=$this->user_role->select_id('role_id','user_id',$user_id);
			#求出角色所对应的权限ID
			$this->load->model('Role_access_model','role_access');
			$access_id=$this->role_access->select_id('access_id','role_id',array_column($role_id, 'role_id'));
			#根据查询出的权限ID求权限url
			$this->load->model('Access_model','access');
			$access_url=$this->access->select_id('access_url','access_id',array_column($access_id,'access_id'));
			// print_r(array_column($access_url, 'access_url'));die;
			#判断是否有权限
			if (!in_array($url,array_column($access_url, 'access_url'))) {
				success('您没有权限访问');
				die;
			}
		}
	}

}
