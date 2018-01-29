<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pass extends MY_Controller {
	public $site = 10;
	function __construct(){
		parent::__construct();
		$this->load->model('Index_model','work');
		$this->load->model('type_model','type');
	}
	//节目入库
	public function add_prog(){
		$prog = $this->input->post();
		foreach ($prog as $key => $value) {
			foreach ($value as $k => $val) {
				$prog_data[$k][$key] = $val;
			}
		}
		if ($this->db->insert_batch('prog',$prog_data)) {
			success('Add pass');
		}else{
			error('Add Fail');
		}
	}
	//节目数量
	public function show(){
		$sql = "SELECT type_name,a.type_id FROM put_works as a LEFT JOIN put_type as b on a.type_id=b.type_id GROUP BY a.type_id";
		$type = $this->db->query($sql)->result_array();
		$data = array(
			'type' => $type,
			);
		$this->load->view('pass/show',$data);
	}
}