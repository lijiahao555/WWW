<?php
class Goods_attribute_model extends MY_Model {
	public function __construct()
    {
        parent::__construct();

    }
	public $table_name="goods_attribute";
	public function sel($arr){
		return $this->db->get_where($this->table_name,$arr)->row_array();
		
	}
}