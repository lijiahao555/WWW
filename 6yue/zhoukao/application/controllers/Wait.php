<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wait extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Infor_model','infor');
		
		$this->load->model('Role_model','role');
		$this->load->model('User_model','user');
	}
	/** 展示待审核列表 */
	public function wait(){
		//求角色名
		$name=$_SESSION['name'];
		$role_name=$this->role->name($name);
		$user_id=$this->user->id($name);
		
		$data=$this->infor->wait($user_id);
		$count=$this->infor->wait_num($user_id);
		$this->load->vars('zong',$count);
		$this->load->vars('name',$role_name);
		$this->load->view('Wait/wait',array('data'=>$data));
	}
	/** 审核返回的ajax */
	public function exam_ajax(){
		$ye=$this->input->get('ye');
		$data=$this->infor->wait_ajax($ye,10);
		// $count=$this->infor->num();
		echo json_encode($data);		
	}

}
