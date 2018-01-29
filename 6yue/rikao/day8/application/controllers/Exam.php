<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
	static $new_data=array();
	public function show(){
		$this->load->model('Exam_model','exam');
		$data=$this->exam->selectAll();
		$res=$this->type($data);
		$this->load->vars('res',$res);
		$this->load->view('show');
	}
	public function type($data,$parent_id=0,$key=0){
		foreach ($data as $k => $v) {
			if ($v['parent_id']==$parent_id) {
				$data[$k]['key']=$key;
				self::$new_data[]=$data[$k];
				$this->type($data,$v['id'],$key+1);
			}
		}
		return self::$new_data;
	}

}
