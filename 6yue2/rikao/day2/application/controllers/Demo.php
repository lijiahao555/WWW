<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends CI_Controller {
	public function show(){
		$this->load->view('demo');
	}
}
