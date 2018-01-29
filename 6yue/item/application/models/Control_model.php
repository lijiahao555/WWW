<?php
class Control_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }  
    /**
     * 根据权限ID求出权限的url
     * @param  [type] $control_id array
     * @return [type]             array
     */
    public function url($control_id){
        $res=$this->db->select('control_control')->where_in('control_id',$control_id)->get('control')->result_array();
        foreach ($res as $key => $v) {
            $arr[]=$v['control_control'];
        }
        return $arr;
    }
}
