<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Demo_model','demo');
	}
	public function demo()
	{
		$data = $this->demo->sel();
		
		$data = $this->get_exam($data);
		$res = $this->demo->get_many("is_sale=1");
		$this->load->view('exam',array('data'=>$data,'res'=>$res));
	}
	public function get_exam($data,$parent_id=0){
		$new_data=array();
		foreach ($data as $key => $v) {
			if ($v['parent_id'] == $parent_id) {
				$new_data[$key] = $v;
				$new_data[$key]['son'] = $this->get_exam($data,$v['type_id']);
			}
		}
		
		return $new_data;
	}
	public function show(){
		$sou = $this->input->get('sou');
		$data = $this->demo->get_more("goods_name",$sou);
		$this->load->view('boys',array('data'=>$data));
	}
}
