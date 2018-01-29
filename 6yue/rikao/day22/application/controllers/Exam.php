<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('exam_model','user');
	}

	public $size=3;

	public function show(){
		$data=$this->user->count();
		$this->load->vars('data',$data);

		$this->load->view('show');
	}

	public function ajax(){
		$ye=$this->input->get('ye');
		$sou=$this->input->get('sou');
		$res=$this->user->selectAll($ye,$sou);
		$data=$this->user->count_sou($sou);
		$arr['res']=$res;
		$arr['data']=$data;
		echo json_encode($arr);
	}

	public function del(){

		$id=$this->input->get('id');
		$page=$this->input->get('page');
		$this->load->model('exam_model');
		$res=$this->exam_model->del($id);
		if ($res) {
			$data=$this->exam_model->selectAll($page);
			echo json_encode($data);
		}else{
			echo 'no';
		}
	}

	public function seek(){
		$this->user->seek($sou);
	}

}
