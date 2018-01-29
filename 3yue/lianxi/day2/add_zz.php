<?php 
header('content-type:text/html;charset=utf8');

class Exam{
	public function ck($name){
		$z_name="/^[\x{4e00}-\x{9fa5}]{1,10}$/u";
		$reg=preg_match($z_name, $name);
		if ($reg) {
			return true;
		}else{
			return false;
		}

	}


}

 ?>