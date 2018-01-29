<?php
class Mylist extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function select($table,$size='',$limit=''){
    	return $this->db->limit($size,$limit)->get($table)->result_array();
    }

    //删除
    public function del($table,$tiaojian,$id){
    	return $this->db->delete($table,array($tiaojian=>$id));
    }
}