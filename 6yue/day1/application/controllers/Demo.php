<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public $size=3;

	public function add(){
		$this->load->view('Demo/demo');
	}
	public function addOne(){
		$data= $this->input->post();
		$this->load->model('day1');
		$this->day1->add($data);
		echo $r;die;
	}
	public function show(){
		// echo base_url('/Demo/ajax');die;
		$count=$this->db->query("SELECT COUNT(*) AS num FROM day1")->row_array();
		$zong=ceil($count['num']/$this->size);
		$this->load->vars('zong',$zong);

		$sql="SELECT * FROM day1";
		$query = $this->db->query($sql);
		$data=$query->result_array();
		$data=array('data'=>$data);
		$this->load->view('Demo/show',$data);
	}

	public function ajax(){
		$p=$this->input->get('ye');
		$start=($p-1)*$this->size;
		$data = $this->db->query("SELECT * FROM day1 LIMIT $start,".$this->size)->result_array();
		echo json_encode($data);
	}
}