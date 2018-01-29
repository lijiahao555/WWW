<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('user_model','user');
	}
	public function add(){
		if (!$_POST) {
			$this->load->view('add');
		}else{
			$data=$this->input->post();
			$result=$this->user->add($data);
			if ($result) {
				 $res=$this->user->selectAll();
				 echo json_encode($res);
			}else{
				echo 'no';
			}
		}
	}
}
