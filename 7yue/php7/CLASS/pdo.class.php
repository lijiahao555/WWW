<?php 
/**
*  pdo 类
*/
class ClassPdo
{

    private static $ClassPdo; 			// 保存本类实例在此属性中
    private $db; 						// 实例pdo类
    public  $table_name = 'lian_xi';	// 表名
    public  $where = array('1=1');		// where条件
    public  $order = '';				// 排序 order by
    public  $limit = '';				//  limit 限制条数



    // 构造方法声明为private，防止直接创建对象
    private function __construct()
    {
        if (!$this->db) {
            $dsn = "mysql:host=127.0.0.1;dbname=text";
            $db = new PDO($dsn, 'root', 'root');
            $this->db = $db;
        }
    }

    // 阻止用户复制对象实例
    public function __clone(){}

    // 初始化
    public static function ini(){
    	if (!self::$ClassPdo) {
            self::$ClassPdo = new ClassPdo;
        }
        return self::$ClassPdo;
    }

    // query 方法
    public function query($sql){
        $rs = $this->db->query($sql);
        if (is_object($rs)) {
            $rs->setFetchMode(PDO::FETCH_ASSOC);
            return $rs->fetchAll();
        }
        return $rs;
    }

    // 查询所有 protected
    protected function sel($where=''){
    	$sql = "SELECT * FROM {$this->table_name} WHERE ";
    	if ($where) {
    		foreach ($where as $k => $v) {
    			$this->where[] = $k."='".$v."'";
    		}
    	}
    	$sql .= implode(' AND ', $this->where);
    	if ($this->order) {
        	$sql .= " ".$this->order;
    	}
    	if ($this->limit) {
        	$sql .= $this->limit;
    	}
    	$rs= $this->db->query($sql);
    	$rs->setFetchMode(PDO::FETCH_ASSOC);
    	return $rs;
    }

    public function sel_all($where=''){
    	$rs = $this->sel($where);
        return $rs->fetchAll();
    }

    // 查询单条数据
    public function sel_one($where=''){
    	$rs = $this->sel($where);
        return $rs->fetch();
    }
    
    // 添加
    public function add($arr){
        $key = '';
        $val = '';
        foreach ($arr as $k => $v) {
            $key .= $k.',';
            $val .= $v."','";
        }
        $key = trim($key,',');
        $val = "'".trim($val,",'")."'";
        $sql = "INSERT INTO {$this->table_name}(".$key.") VALUES(".$val.")";
        return $this->db->exec($sql);
    }

    // 删除
    public function del($where){
    	$sql = "DELETE FROM {$this->table_name} WHERE ";
    	if ($where) {
    		foreach ($where as $k => $v) {
    			$this->where[] = $k."='".$v."'";
    		}
    	}
    	$sql .= implode(' AND ', $this->where);
        return $this->db->exec($sql);
    }

    // 修改 1 修改字段 2 where条件
    public function save($arr,$where){
        $val = '';
        foreach ($arr as $k => $v) {
            $val .= $k.'='."'$v',";
        }
        $val = trim($val,',');
        $sql = "UPDATE {$this->table_name} SET {$val} WHERE ";
    	if ($where) {
    		foreach ($where as $k => $v) {
    			$this->where[] = $k."='".$v."'";
    		}
    	}
    	$sql .= implode(' AND ', $this->where);
        return $this->db->exec($sql);
    }

    // where 条件
    public function where($arr){
    	foreach ($arr as $k => $v) {
    		$this->where[] = $k."='".$v."'";
    	}
    	return $this;
    }

    // order 参1,要排序的字段 参2,选择顺序,或倒序 默认顺序
    public function order($field,$desc='ASC'){
    	$this->order = "ORDER BY {$field} ASC";
    	return $this;
    }

    // limit 限制条数
    public function limit($q,$s=''){
    	$this->limit = " LIMIT {$q},{$s}";
    	if (!$s) {
    		$this->limit = " LIMIT {$q}";
    	}
    	return $this;
    }
}
$where = array('l_id'=>'2');
$arr = array('l_name'=>'00','l_email'=>'222','l_time'=>'333');
$pdo = ClassPdo::ini();
// var_dump($pdo->save($arr,$where));
var_dump($pdo->query("DELETE FROM lian_xi WHERE l_id=3"));
 ?>