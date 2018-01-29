<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infor extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Infor_model','infor');
		
		$this->load->model('Role_model','role');
		$this->load->model('User_model','user');
	}
	/** 展示 */
	public function Infor_show(){
		//求出登录人的角色名
		$name=$_SESSION['name'];
		$role_name=$this->role->name($name);

		$data=$this->infor->Infor_show();
		$count=$this->infor->infor_num();
		$this->load->vars('zong',$count);
		$this->load->vars('name',$role_name);
		$this->load->view('Infor/Infor_show',array('data'=>$data));
	}
	/** ajax返回的展示信息数据 */
	public function ajax(){
		$ye=$this->input->get('ye');
		$data=$this->infor->ajax($ye,10);
		// $count=$this->infor->num();
		echo json_encode($data);		
	}

}
