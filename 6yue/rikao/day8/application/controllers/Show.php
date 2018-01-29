<?php
class Show extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Exam_model','show');
	}
	public function show()
	{
		$data=$this->show->selectAl();
		$this->load->vars('data',$data);
		$this->load->view('Show/show');
	}
	public function ajax(){
		$id=$this->input->get('id');
		$data=$this->show->sel($id);
		echo json_encode($data);
	}
}