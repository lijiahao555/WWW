<?php
namespace Home\Model;
use Think\Model;
class BlogModel extends Model {
    protected $tableName = 'blog'; 
    /**
     * [addOne] 添加博文信息
     * @param [type] $data  要添加的数据
     * @return  返回添加成功几条数据
     */
    function addOne($data){
    	$data['time']=date('Y-m-d H:i:s');
    	$res=M($this->tableName)->add($data);

    	for ($i=0; $i <count($data['label']) ; $i++) { 
    		$arr[$i]['blog_id']=$res;
    		$arr[$i]['label_id']=$data['label'][$i];
    	}

    	return M('blog_label')->addAll($arr);
    }	
    /**
     * 查询要展示的数据
     * @return [type] 数组
     */
    function select(){
    	// echo "<pre>";
    	$data=M($this->tableName)->select();
    	foreach ($data as $k => $v) {
    		$res=M('blog_label')->join("label on blog_label.label_id=label.label_id")->where("blog_id=".$v['id'])->getField('label_name',true);
            print_r($res);die;
    		$data[$k]['label_name']=implode($res, ',');
    	}
    	
    	return $data;
    }
    /**
     *  删除
     * @param  [type] $id int
     * @return [type]     int
     */
    function delOne($id){
    	$res=M($this->tableName)->where("id='$id'")->delete();
    	$num=M('blog_label')->where("blog_id='$id'")->delete();
    	if ($res&&$num) {
    		return 1;
    	}else{
    		return 2;
    	}
    }
    /**
     * 被修改的单条信息展示
     * @param  [type] $id int
     * @return [type]     string
     */
    function upfind($id){
    	return $data=M($this->tableName)->where("id=$id")->find();
    }
    /**
     * 修改单条内容操作
     * @param  [type] $data array
     * @return [type]      int
     */
    function upOne($data){

        $data['time']=date('Y-m-d H:i:s');
        $id=$data['name'];
        $res=M($this->tableName)->where("id='$id'")->save($data);
        $del=M('blog_label')->where("blog_id=".$id)->delete();
        // for ($i=0; $i <count($data['label']) ; $i++) { 
        //     $arr[$i]['blog_id']=$id;
        //     $arr[$i]['label_id']=$data['label'][$i];
        // }
       if ($res) {
           if ($del) {
               for ($i=0; $i <count($data['label']) ; $i++) { 
                    $arr[$i]['blog_id']=$id;
                    $arr[$i]['label_id']=$data['label'][$i];
                }
                 return $a=M('blog_label')->addAll($arr);
            }
       }else{
            die;
       }  
    }

}