<?php
class Demo_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function select(){
    	return $this->db->get('demo',3,0)->result_array();
    }
}