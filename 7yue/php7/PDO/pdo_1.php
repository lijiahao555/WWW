<?php
/**
 * pdo 初学
 * @Author: Marte
 * @Date:   2017-09-29 10:37:06
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-10-08 09:25:50
 */


// $db->setAttribute(PDO::ATTR_CASE,PDO::CASE_UPPER);//setAttribute() 方法是设置部分属性


// $sql = "select * from user";//mysql语句
// // $list = $db->query($sql);//执行MySQL语句
// // $list->setFetchMode(PDO::FETCH_ASSOC);//设置获取结果集的返回值的类型-关联数组形式
// // $list = $list->fetchAll();// 提取结果集的内容
// $list = $db->exec($sql);//执行MySQL语句的另一种方法



$arr = array(
        array('u_name'=>"1.html",'u_pas'=>"1.jpg"),
        array('u_name'=>"2.html",'u_pas'=>"2.jpg"),
        array('u_name'=>"3.html",'u_pas'=>"3.jpg"),
);


var_dump(PDO_add($arr));



// 参1 添加的数据
// 参2 库命
// 参3 表名
function PDO_add($arr,$warehouse='text',$surface='user')
{
    header("content-type:text/html;charset=utf-8");
    $dsn = "mysql:host=127.0.0.1;dbname=".$warehouse.";";//就是构造我们的DSN（数据源）
    $db = new PDO($dsn,'root','root');// 初始化一个PDO对象


    $sql = 'insert into '.$surface;
    $sql .= '('.implode(array_keys($arr[0]),',').') VALUES';//获取字段名称
    $ary = array();//所有要入库的数据
    $i = 1;//预定义从1开始
    foreach ($arr as $key => $value) {
        $sql .= '(';
        foreach ($value as $k => $v) {
            $sql .= '?,';
            $ary[$i] = $v;$i++;
        }
        $sql = trim($sql,',');$sql .= '),';
    }
    $sql = trim($sql,',');


    $list=$db->prepare($sql);
    foreach ($ary as $key => $value) {
        $list->bindvalue($key,$value);
    }

    return $list->execute();
}

