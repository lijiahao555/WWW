<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Demo_model','demo');
	}
	public function show()
	{
		$sql="SELECT *,CONCAT(path,'-',id) AS new_path FROM path ORDER BY new_path ASC";
		$data = $this->demo->sel($sql);
		$this->load->vars('data',$data);
		$this->load->view('demo');
	}
	public function ajax(){
		$search = $this->input->post('search');
		$data = $this->demo->select($search);
		// print_r($data);die;
		if (!empty($data)) {
			echo json_encode($data);
		}else{
			echo json_encode('no');
		}
	}
}
