<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	/** 自动加载session */
	public function __construct(){
		parent::__construct();
	}
	/** 登录页面 */
	public function login(){
		$this->load->vars('exam',$this->exam());
			$this->load->view('Admin/login');
	}
	/** 处理登录数据 */
	public function admin(){
		$data=$this->input->post();
		if ($data=='') {
			success('请先登录','Admin/Login/login');die;
		}
		$this->load->model('User_model','user');
		$res=$this->user->admin($data);
		if ($res==0) {
			$this->session->set_userdata('name',$data['username']);
			success('登录成功','Admin/Control/control');
		}else if($res==2){
			success('密码错误','Admin/Login/login');die;
		}else if($res==3){
			success('账号错误','Admin/Login/login');die;
		}else{
			success('校验码不正确','Admin/Login/login');die;
		}
	}
	/** 校验码 */
	public function exam(){
		$this->load->helper('captcha');
		$vals = array(
		    'img_path'  => './captcha/',
		    'img_url'   => base_url('captcha'),
		    'font_path' => './path/to/fonts/texb.ttf',
		    'img_width' => '150',
		    'img_height'    => 30,
		    'expiration'    => 7200,
		    'word_length'   => 3,
		    'font_size' => 16,
		    'img_id'    => 'Imageid',
		    'pool'      => '0123456789',
		);

		$cap = create_captcha($vals);
		$this->session->set_userdata('exam',$cap['word']);
		return  $cap['image'];
	}


}
