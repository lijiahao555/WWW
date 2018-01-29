<?php 
namespace Home\Model;
use Think\Model;
class BookModel extends Model {
    // protected $tableName = 'categories';
    /**
     * 处理添加一条图书信息
     * @param [type] $data 数据
     */
    function addOne($data){
    	$upload = new \Think\Upload();// 实例化上传类    
    	$upload->maxSize   =     3145728 ;// 设置附件上传大小    
    	$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
    	$upload->rootPath  =      './'; // 设置附件上传目录    // 上传文件     
    	$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
    	$info   =   $upload->upload();   
    	$file=$info['file'];
    	$data['file']=$file['savepath'].$file['savename'];
    	if(!$info) {// 上传错误提示错误信息       
    	 $this->error($upload->getError()); 
    	 die;  
    	}
    	return $this->add($data);
    }

    function selectAll(){
    	return $this->limit(0,6)->select();
    }



}