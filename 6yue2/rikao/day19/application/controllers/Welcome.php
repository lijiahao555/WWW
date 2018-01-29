<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$sql="SELECT *,CONCAT(path,'-',category_id) as new_path FROM category ORDER BY new_path asc";
		$sql_data = $this->db->query($sql)->result_array();
		$data = $this->db->get('category')->result_array();
		$new_data = $this->exam($data);
		echo "<pre>";
		print_r($new_data);die;
		$this->load->view('welcome_message');
	}
	public function exam($data,$parent_id=0){

		$new_data=array();
		foreach ($data as $key => $v) {
			if ($v['parent_id']==$parent_id) {
				$new_data[$key] = $v;
				$new_data[$key]['son'] = $this->exam($data,$v['category_id']);
			}
		}
		return $new_data;
	}
	
}
