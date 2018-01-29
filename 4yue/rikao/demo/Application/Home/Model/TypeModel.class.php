<?php
namespace Home\Model;
use Think\Model;
class TypeModel extends Model {    
	function selectMany(){
		return $this->select();
	}
}