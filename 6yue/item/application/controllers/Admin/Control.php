<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends MY_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function control(){
		$this->load->view('Admin/control');
	}
	public function top(){
		$this->load->view('Admin/top');
	}
	public function menu(){
		 $this->load->view('Admin/menu');
	}
	public function main(){
		$this->load->view('Admin/main');
	}

}
