<?php
namespace Home\Model;
use Think\Model;
class PhotoModel extends Model {
    protected $tableName = 'photo'; 
    /**
     * 添加数据操作
     * @param [type] $data 数据
     * @return int
     */
  	function addOne($data){
  		$upload = new \Think\Upload();// 实例化上传类    
  		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
  		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型  
  		$upload->rootPath  =   './';
  		$upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件     
  		$info   =   $upload->upload();    
  		$f=$info['photo_file'];
  		$file=$f['savepath'].$f['savename'];
  		if(!$info) {// 上传错误提示错误信息        
  			$this->error($upload->getError());    
  		}
  		$arr['photo_name']=$data['photo_name'];
  		$arr['photo_content']=$data['photo_content'];
  		$arr['photo_file']=$file;
  		$arr['photo_time']=strtotime($data['photo_time']);
  		$res=M($this->tableName)->add($arr);
  		for ($i=0; $i <count($data['sort']) ; $i++) { 
  			$s[$i]['photo_id']=$res;
  			$s[$i]['sort_id']=$data['sort'][$i];
  		}
		  $list=M('photo_sort')->addAll($s);
      if ($res&&$list) {
        return 1;
      }else{
        return 2;
      }
  	}
    /**
     * 查询展示数据
     * @return [type] array
     */
    function select(){
      $list=M($this->tableName)->select();
      foreach ($list as $k => $v) {
          $res=M('sort')->join("photo_sort on sort.sort_id=photo_sort.sort_id")->where("photo_id=".$v['photo_id'])->getField("sort_name",true);    
        $list[$k]['photo_sort']=implode(',', $res);
        
      }
      return $list;
    }
}