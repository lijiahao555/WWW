<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Infor_model','infor');
		
		$this->load->model('Role_model','role');
		$this->load->model('User_model','user');
	}
	/** 展示未通过的数据 */
	public function add(){
		//求出登录人角色名
		$name=$_SESSION['name'];
		$role_name=$this->role->name($name);

		$data=$this->infor->add_select();
		$count=$this->infor->add_num();

		$this->load->vars('zong',$count);
		$this->load->vars('name',$role_name);
		
		$this->load->view('Add/add',array('data'=>$data));
	}
	/** 添加信息返回ajax的信息 */
	public function add_ajax(){
		$ye=$this->input->get('ye');
		$data=$this->infor->add_ajax($ye,10);
		echo json_encode($data);		
	}

	/** 处理审核信息 返回添加后的信息 */
	public function addDo(){
		//传值
		$infor_id=$this->input->get('id');
		$page=$this->input->get('page');
		//根据登录人求出id
		$name=$_SESSION['name'];
		$user_id=$this->user->id($name);

		$res=$this->infor->exam_add($infor_id,$user_id);
		if ($res) {
			$ye=$this->input->get('ye');
			$data=$this->infor->add_ajax($page,10);
			echo json_encode($data);
		}else{
			echo "no";
		}
	}
}
