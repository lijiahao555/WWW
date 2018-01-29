<?php
class Product_model extends MY_Model {
	public function __construct()
    {
        parent::__construct();

    }
	public $table_name="product";
	public function get_sel_sql($goods_id){
		$sql = "SELECT goods_attribute_id,goods_id,attribute_id,attribute_name,attribute_value FROM goods_attribute INNER JOIN attribute ON goods_attribute.attr_id=attribute.attribute_id WHERE goods_id='$goods_id'";
		return $this->db->query($sql)->result_array();
	}
}