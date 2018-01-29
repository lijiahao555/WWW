<?php
namespace Home\Model;
use Think\Model;
class InforModel extends Model {
    protected $tableName = 'infor';
    /**
     * 查询所有的学生详细信息
     * @return [type] array
     */
    function select(){
    	return M($this->tableName)->select();
    }

    function upOne($data){
        $data['infor_hobby']=implode($data['infor_hobby'], ',');
        // print_r($data);die;

        $id=$data['id'];
        return M($this->tableName)->where("infor_id=".$id)->save($data);
    }

    public function find($id){
        return M($this->tableName)->where("infor_id=".$id)->find();
    }

}