<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Demo_model','demo');
	}
	public function index()
	{
		$this->load->view('Demo/add');
	}
	public function addDo(){
		$data=$this->input->post();
		$res=$this->demo->add($data);
		if ($res) {
			success('添加成功','Demo/show');
		}else{
			success('添加失败');
		}
	}
	public function show(){
		$data=$this->demo->select();
		$count=$this->demo->infor_num();

		$this->load->vars('zong',$count);

		$this->load->vars('data',$data);
		$this->load->view('Demo/show');
	}

	/** 展示 */
	// public function Infor_show(){
	// 	//求出登录人的角色名
	// 	$name=$_SESSION['name'];
	// 	$role_name=$this->role->name($name);

	// 	$data=$this->infor->Infor_show();
	// 	$this->load->vars('name',$role_name);
	// 	$this->load->view('Infor/Infor_show',array('data'=>$data));
	// }
	/** ajax返回的展示信息数据 */
	public function ajax(){
		$ye=$this->input->get('ye');
		$sou=$this->input->get('sou');
		$data=$this->demo->ajax($ye,3,$sou);
		// $count=$this->infor->num();
		echo json_encode($data);
	}


	public function del(){
		$id = $this->input->get('id');
		$res=$this->demo->del($id);
		if ($res) {
			success('删除成功','Demo/show');
		}else{
			success('删除失败');
		}
	}
	public function up(){
		$id = $this->input->get('id');
		$data=$this->demo->selectOne($id);
		foreach ($data as $key => $v) {
			$data=$v;
		}
		$this->load->vars('data',$data);
		$this->load->vars('id',$id);
		$this->load->view('Demo/up');
	}
	public function upOne(){
		$data=$this->input->post();
		$res=$this->demo->up($data);
		if ($res) {
			success('修改成功','Demo/show');
		}else{
			success('修改失败');
		}
	}
}
