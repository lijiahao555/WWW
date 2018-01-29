<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
	public function show(){
		$data = $this->db->get('goods_type')->result_array();
		$this->load->vars('data',$data);
		$this->load->view('exam');
	}
	public function change(){
		$id=$this->input->post('id');
		$data=$this->db->where("goods_type_id='$id'")->order_by('attribute_id','asc')->get('attribute')->result_array();
		echo json_encode($data);
	}
	public function rikao(){
		$this->load->view('rikao.html');
	}
}