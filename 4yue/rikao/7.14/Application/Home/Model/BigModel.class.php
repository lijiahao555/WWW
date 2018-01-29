<?php 
namespace Home\Model;
use Think\Model;
class BigModel extends Model { 
   protected $tableName = 'big'; 
   /**
    * addOne  添加大事件
    * $data   数据对应数据库的
    * return  返回值
    */
   public function addOne($data){
   		$data['t_id']=$data["box"];
   		$data['time']=date('Y-m-d H:i:s');
   		return M($this->tableName)->add($data);
   }
   /**
    * sel  查询数据
    * return  返回值
    */
   public function sel(){
   		$User= M('big');
   		return $b=$User->join('type on big.t_id=type.type_id')->select();
   }
   /**
    * delOne  删除
    * $id    参数
    * return  返回值
    */
   
   public function delOne($id){
         return M($this->tableName)->delete($id);
   }
   /**
    * upone  修改
    * $id    参数
    * return  返回值
    */
   public function upOne($id){
         $i=$id['id'];
         $data['name']=$id['name'];
         $data['content']=$id['content'];
         return M($this->tableName)->where("id='$i'")->save($data);
       
   }
   /**
    * souAll  搜索
    * return  返回值
    */
   public function souAll($sou){
     return M($this->tableName)->join('type on big.t_id=type.type_id')->where("name like '%$sou%'")->select();
   }
}