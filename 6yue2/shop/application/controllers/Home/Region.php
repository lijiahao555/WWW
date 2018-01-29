<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Region_model','region');
	}
	public function show(){
		$data = $this->region->get_sel_more();
		$res = $this->exam($data);
		$this->load->vars('data',$res);
		$this->load->view('Home/Region');
	}
	public function exam($data,$parent_id=0){
		$new_data=array();
		foreach ($data as $key => $v) {
			if ($v['parent_id']==$parent_id) {
				$new_data[$key] = $v;
				$new_data[$key]['son'] = $this->exam($data,$v['region_id']);
			}
		}
		return $new_data;
	}
}