<?php 
class Demo extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function add($data){
    	echo $data;die;
    }


}