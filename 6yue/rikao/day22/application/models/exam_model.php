<?php
class Exam_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function count(){
    	$count=$this->db->query("SELECT COUNT(*) AS num FROM day1")->row_array();
    	$zong=ceil($count['num']/$this->size);
    	$res=$this->db->get("day1",3,0)->result_array();
    	$data['zong']=$zong;
    	$data['res']=$res;
    	return $data;
    }

    function select(){
        $query=$this->db->get('day1');
        if ($id) {
            return $query->row_array();
        }else{
            return $this->db->get_where("day1","id=6",3,0)->result_array();
            // $array = array('name' => 12, 'title' => 123, 'status' => 684);
            // print_r($array);die;
            // return $this->db->select('name')->get_where('day1',"id=5")->row_array();
           
        }
    }

    function selectAll($ye,$sou){
    	$start=($ye-1)*$this->size;
        if ($sou=='') {
            $res=$this->db->get("day1",$this->size,$start)->result_array();
        }else{
            return $this->db->like("name","$sou")->get("day1",$this->size,$start)->result_array();
            
        }
		
        return $res;
    }

    function count_sou($sou){
        if ($sou!='') {
            $this->db->like("name","$sou");
            $this->db->from('day1');
            $count=$this->db->count_all_results();
            $zong=ceil($count/$this->size);
        }else{
            $count=$this->db->query("SELECT COUNT(*) AS num FROM day1")->row_array();
            $zong=ceil($count['num']/$this->size);
        }
        return $zong;
    }

    public function del($id){
        return $this->db->where('id='.$id)->delete('day1');
    }
}