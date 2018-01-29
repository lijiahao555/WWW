<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
	public $size=3;
	public function show(){
		$result=$this->db->query("SELECT * FROM day1 LIMIT 0,3")->result_array();
		$res=$this->db->query("SELECT COUNT(*) AS num FROM day1")->row_array();
		$zong=ceil($res['num']/$this->size);
		$this->load->vars('data',$result);
		$this->load->vars('zong',$zong);
		$this->load->view('show');
	}
}
