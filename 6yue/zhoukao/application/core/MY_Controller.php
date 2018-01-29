<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (empty($_SESSION['name'])) {
			success('请先登录','Admin/login');
		}
		/** 根据session求出登录人的ID */
		$name=$_SESSION['name'];
		$this->load->model('User_model','user');
		$user_id=$this->user->id($name);
		if ($user_id!=1) {
			//根据用户id求出所拥有的角色id
			$this->load->model('Role_model','role');
			$role_id=$this->role->id($user_id);

			//根据角色id求出权限id
			$this->load->model('Role_access_model','role_access');
			$access_id=$this->role_access->id($role_id);

			//根据权限ID 求出Url
			$this->load->model('Access_model','access');
			$access_url=$this->access->url($access_id);

			//获取当前用户访问的url
			$url1=$this->uri->segment(1);
			$url2=$this->uri->segment(2);
			$u=$url1.'/'.$url2;
			if (!in_array($u,$access_url)) {
				success('没有权限访问,返回节目列表','Infor/Infor_show');
			}
		}
	}
}
