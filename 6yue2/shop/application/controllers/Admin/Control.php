<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function control(){
		$this->load->view('Admin/index');
	}
	public function main(){
		$this->load->view('Admin/main');
	}
	public function menu(){
		$this->load->view('Admin/menu');
	}
	public function top(){
		$this->load->view('Admin/top');
	}
	
}