<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/** 登录信息展示 */
	public function login(){
		$this->load->view('Admin/admin');
	}
	/** 处理登录信息 */
	public function adminDo(){
		$data=$this->input->post();
		$this->load->model('User_model','user');
		$res=$this->user->adminDo($data);
		if ($res==1) {
			$this->session->set_userdata('name', $data['name']);
			success('登陆成功','Infor/Infor_show');
		}else{
			success('登陆失败','Admin/login');
		}
	}
}
