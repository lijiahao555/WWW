<?php 
class Db{

	public $ip;//服务器地址,ip
	public $name;//连接数据库，名字;
	public $pwd;//连接数据库，密码;
	public $dbname;//选择的数据库，名字;

	function __construct($ip,$name,$pwd,$dbname){
		$this->ip=$ip;
		$this->name=$name;
		$this->pwd=$pwd;
		$this->dbname=$dbname;
		//实例化时调用连接数据库方法
		$this->connect();

	}

	public function connect(){
		//连接数据库
		mysql_connect($this->ip,$this->name,$this->pwd);
		mysql_select_db($this->dbname);
		mysql_query('set names utf8');
	}

	public function add($list,$arr){
		
		$list_value='"'.implode($arr,'","').'"';

		$sql="INSERT INTO $list VALUES(null,$list_value)";
		// echo $sql;die;
		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function delete($list,$value){
		$sql="delete from $list where $value";

		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function update($sql){
		$res=mysql_query($sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

	public function select($count,$list,$tiaojian){

		$sql="select $count from $list where $tiaojian";
		
		$res=mysql_query($sql);

		$date=array();
		while ($arr=mysql_fetch_assoc($res)) {
			$date[]=$arr;
		}
		return $date;
	}

	public function select1($list,$tiaojian){

		$sql="SELECT COUNT(*) AS num FROM $list where $tiaojian";
		
		$res=mysql_query($sql);
		
		
		return $res;
	}

	
	// public function add($sql){
	// 	$res=mysql_query($sql);
	// 	if($res){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }


	// public function delete($sql){
	// 	$res=mysql_query($sql);
	// 	if($res){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }


	// public function update($sql){
	// 	$res=mysql_query($sql);
	// 	if($res){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	// public function select($sql){
	// 	$res=mysql_query($sql);
	// 	$date=array();
	// 	while ($arr=mysql_fetch_assoc($res)) {
	// 		$date[]=$arr;
	// 	}
	// 	return $date;
	// }


}

 ?>