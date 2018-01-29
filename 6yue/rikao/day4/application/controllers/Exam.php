<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
	public function del(){
		$this->load->model('User_model');
		$data=$this->User_model->selectAll();
		$this->load->view('exam',array('data'=>$data));
	}

	public function del_id(){
		$id=$this->input->get('del_id');
		$this->load->model('User_model');
		$res=$this->User_model->del($id);
		if ($res) {
			echo 'ok';
		}else{
			echo 'no';
		}
	}
}
