<?php
namespace Home\Model;
use Think\Model;
class ClassModel extends Model {
    protected $tableName = 'class';
    /**
     * 查询课程信息
     * @return [type] array
     */
    function select(){
    	return M($this->tableName)->select();
    }
    /**
     * 添加数据
     * @param [type] $data int
     */
    function addOne($data){
    	for ($i=0; $i <count($data['class_id']) ; $i++) { 
    		$arr[$i]['admin_id']=$data['admin_id'];
    		$arr[$i]['class_id']=$data['class_id'][$i];
    	}
    	return M('admin_class')->addAll($arr);
    }

    function findOne($id){

        $list=M($this->tableName)->select();

        $data=M('admin_class')->join('class on admin_class.class_id=class.class_id')->where("admin_id=".$id)->getField('class_name',true);
      
        
        foreach ($list as $k => $v) {
            if (in_array($v['class_name'],$data)) {
                $list[$k]['flag']=1;
            }else{
                $list[$k]['flag']=0;
            }
        }
        
        return $list;
    }

    function upOne($data){
        $id=$data['id'];
        $del=M('admin_class')->where("admin_id=".$id)->delete();

        for ($i=0; $i <count($data['admin_id']) ; $i++) { 
            $arr[$i]['admin_id']=$id;
            $arr[$i]['class_id']=$data['admin_id'][$i];
        }
        if ($del) {
            return M('admin_class')->addAll($arr);
        }else{
            return false;
        }
    }


}