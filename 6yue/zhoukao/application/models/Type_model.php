<?php
class Type_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }
    public function select(){
        return $this->db->get('type')->result_array();
    }
}