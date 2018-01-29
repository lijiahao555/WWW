<?php 
namespace Home\Model;
use Think\Model;
class RizhiModel extends Model {
protected $tableName = 'rizhi'; 
	public function rizhi($post){
		$data['id'] = $post['id'];
		$data['name'] = $post['name'];
		$data['content'] = $post['content'];
		$data['addtime'] = date('Y-m-d H:i:s');
		
		$data['t_id'] = $post['type'];
		return $this->add($data);

	}
	




}

 ?>
