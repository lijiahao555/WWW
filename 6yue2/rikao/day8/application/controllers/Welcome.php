<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index(){
		$sql="SELECT *,CONCAT(path,'-',category_id) AS new_path FROM category ORDER BY new_path ASC";
		$res=$this->db->query($sql)->result_array();
		// print_r($res);die;
		$this->load->vars('data',$res);
		$this->load->view('Demo');
	}
	public function demo(){
		$data = $this->db->get('category')->result_array();
		$res=$this->a($data);
		print_r($res);die;
	}
	public function a($data,$parent_id=0){
		static $new_data=array();
		foreach ($data as $k => $v) {
			if ($v['parent_id'] == $parent_id) {
				$new_data[]=$v;
				$this->a($data,$v['category_id']);
			}
		}
		return $new_data;
	}
}
