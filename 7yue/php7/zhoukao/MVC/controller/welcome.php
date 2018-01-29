<?php

class Welcome extends controller{

	//首页
	public function index(){

		$this->assign('nei', 'nei');
		$this->display();

	}

    //首页
    public function demo(){

        $memObj = new memcache();               // 实例化memcache
        $memObj->connect('127.0.0.1','11211');  // 连接memcache

        if (!empty($_GET['sou'])) {
            if ($aa = $memObj->get($_GET['sou'])) {
                echo $aa;
            }else{
                $sql = "select * from lian_xi where l_name='{$_GET['sou']}'";
                $data = M('lian_xi_model')->query($sql);
                if ($data==array()) {
                    echo "-1";
                }else{
                    echo $data[0]['l_browse'];
                }
                exit;
            }
            exit;
        }

        // 每刷新一次 某个id 随机+1
        $data = M('lian_xi_model')->sel();
        $ran = rand(0,11);
        $id   = $data[$ran]['l_name'];
        $num  = $data[$ran]['l_browse']+1;
        $str  = M('lian_xi_model')->save(array('l_browse'=>$num),array('l_name'=>$id));

        // 刷新之后,同时更新memcache缓存中前10的IP及IP访问次数；
        $sql = "select * from lian_xi order by l_browse DESC LIMIT 10";
        $data = M('lian_xi_model')->query($sql);
        $memObj->flush(); // 清空所有数据
        foreach ($data as $k => $v) {
            $memObj->set($v['l_name'],$v['l_browse']);            // 添加(修改)数据
        }

        $this->assign('data', $data);
        $this->display();

    }

}

