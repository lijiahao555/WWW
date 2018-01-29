<?php
/**
 * @Author: Marte
 * @Date:   2017-10-16 08:58:54
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-10-16 15:24:34
 */
header("content-type:text/html;charset=utf-8");
$pdo = new ClassPDO('lian_xi');


$data = file_get_contents('zifu.txt');
$zheng = '#(.*) - .*30/Aug/(.*) .*\s*"(.*) /#U';
preg_match_all($zheng, $data, $arr);
unset($arr[0]);
$data = array();
foreach ($arr[1] as $k => $v) {
    $data[$k]['l_name'] = $v;
    $data[$k]['l_time'] = $arr[2][$k];
    $data[$k]['l_email'] = $arr[3][$k];
}
foreach ($data as $k => $v) {
    $pdo->add($v);
}
exit;




// $arr = array('c_name' => '232');
// $data = $pdo->add($arr);
// var_dump($data);exit;

// $arr = array('c_id' => 12);
// $data = $pdo->del($arr);
// var_dump($data);exit;

// $arr = array('c_name' => '我是修改');
// $ary = array('c_id' => 13);
// $data = $pdo->save($arr,$ary);
// var_dump($data);exit;


// $data = $pdo->sel();
// var_dump($data);exit;












/**
*  pdo 类
*/
class ClassPDO
{
    private static $db;
    private $table_name;
     function __construct($table_name='books_classify')
    {
        if (!self::$db) {
            $dsn = "mysql:host=127.0.0.1;dbname=text";
            $db = new PDO($dsn, 'root', 'root');
            self::$db = $db;
        }
        $this->table_name = $table_name;

    }
    // 查询所有
    public function sel(){
        $rs= self::$db->query("SELECT * FROM ".$this->table_name."");
        $rs->setFetchMode(PDO::FETCH_ASSOC);
        $result_arr = $rs->fetchAll();
        return $result_arr;
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
        $sql = "INSERT INTO ".$this->table_name."(".$key.") VALUES(".$val.")";
        return self::$db->exec($sql);
    }
    // 删除
    public function del($arr){
        $id_name = array_keys($arr);
        $val_name = implode(array_values($arr),',');
        $sql = "DELETE FROM ".$this->table_name." WHERE ".$id_name[0]." in(".$val_name.");";
        return self::$db->exec($sql);
    }
    // 修改 1 修改字段 2 where条件
    public function save($arr,$ary){
        $val = '';
        foreach ($arr as $k => $v) {
            $val .= $k.'='."'$v',";
        }
        $val = trim($val,',');
        $id_name = array_keys($ary);
        $val_name = implode(array_values($ary),',');
        $sql = "UPDATE books_classify SET ".$val." WHERE ".$id_name[0]." in(".$val_name.");";
        return self::$db->exec($sql);
    }
}

