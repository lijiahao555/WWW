<?php
namespace Home\Model;
use Think\Model;
class AdminModel extends Model {
    protected $tableName = 'admin';
    /**
     * 验证用户登录信息
     * @param  [type] $data array
     * @return [type]       int
     */
    function exam($data){
    	$admin_name=$data['admin_name'];
    	$admin_pwd=$data['admin_pwd'];
    	$res=M($this->tableName)->where("admin_name='$admin_name'")->find();
    	if ($res) {
    		if ($admin_pwd==$res['admin_pwd']) {
    			return 0;
    		}else{
    			return 1;
    		}
    	}else{
    		return 2;
    	}
    }
    /**
     * 查询属于$name的单条信息
     * @param  [type] $name string
     * @return [type]       array
     */
    function find($name){
        $data=M($this->tableName)->where("admin_name='$name'")->find();
        return $data;
    }
    /**
     * 查询出所有的学生，并把属于每个学生的课程赋值到学生信息上
     * @return [type] array
     */
    function select(){
        $data=M($this->tableName)->select();
        // print_r($data);die;
        foreach ($data as $k => $v) {
           $res=M("admin_class")->join("class on class.class_id=admin_class.class_id")->where("admin_id=".$v['admin_id'])->getField('class_name',true);

           $data[$k]['class_name']=implode($res,',');
        }
        // print_r($data);die;
       return $data;
    }

    function selectOne($where=1){
        $sql=M($this->tableName)->where($where)->find();
        $data=array(
            $sql
            );
        foreach ($data as $k => $v) {
            $res=M("admin_class")->join("class on class.class_id=admin_class.class_id")->where("admin_id=".$v['admin_id'])->getField('class_name',true);
           $data[$k]['class_name']=implode($res,',');
        }
        // print_r($data);die;
       return $data;
    }
}