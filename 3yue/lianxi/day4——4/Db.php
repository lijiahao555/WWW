<?php 
header('content-type:text/html;charset=utf8');

class Db{
		public $IP;
		public $name;
		public $pwd;
		public $dbname;

	function __construct($IP,$name,$pwd,$dbname){
		$this->IP=$IP;
		$this->name=$name;
		$this->pwd=$pwd;
		$this->dbname=$dbname;
		//实例化对象的时候，调用连接数据库的方法；
		$this->connect();
	}

	public function connect(){
		mysql_connect($this->IP,$this->name,$this->pwd);
		mysql_select_db($this->dbname);
		mysql_query('set names utf8');
	}

	public function add($list,$arr){
		
		$list_value='"'.implode($arr,'","').'"';	
		$sql="INSERT INTO $list VALUES(null,$list_value)";

		$res=mysql_query($sql);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function delete($lit,$condition){
		$sql="DELETE FROM $list WHERE $condition";
		$res=mysql_query($sql);
		if ($res) {
			return true;
		}else{
			return false;
		}
	}

	public function update($list,$confition){
		$sql="UPDATE $list SET WHERE $condition";
		$res=mysql_query($sql);
		if ($res) {
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


}
 ?>