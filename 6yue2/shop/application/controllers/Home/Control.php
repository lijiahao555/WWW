<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Category_model','category');
	}
	/** 展示前台用户登录 */
	
}