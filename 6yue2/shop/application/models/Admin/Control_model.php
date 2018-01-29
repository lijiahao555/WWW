<?php
class Control_model extends MY_Model {

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * 根据权限ID,求出权限url
     * @param  [type] $control_id array
     * @return [type]             array
     */
    public function url($control_id){
        return $this->db->select('control_url')->where_in("control_id",$control_id)->get('control')->result_array();
    }
}