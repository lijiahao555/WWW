<?php

class Welcome extends controller{
    // 首页
	public function index(){
        $arr = M('bookss_model')->sel();
        $this->assign('arr', $arr);
		$this->display();
	}

    //详情页
    public function xiang(){
$id = $_GET['id'];
var_dump($id);
echo "cheng";exit;
        $id = $_GET['id'];
        $jing_name = $id.'.html';
        $jing_url  = 'public/jing/'.$jing_name;
        $file_time = file_exists($jing_url) ? filemtime($jing_url) : 1;
        if (!file_exists($jing_url) || $file_time+10 < time()) {
            echo "重新生成文件";
            ob_start();
            $arr = M('bookss_model')->query("SELECT * FROM bookss WHERE b_id=$id");
            $this->assign('arr', $arr[0]);
            $this->display();
            $ss = ob_get_clean();
            file_put_contents($jing_url,$ss);
        }
        require_once $jing_url;
    }
    // 点击量自动+1
    public function jiayi(){
        $id = $_GET['id'];
        $arr = M('bookss_model')->query("SELECT * FROM bookss WHERE b_id=$id");
        $b_dian = ++$arr[0]['b_dian'];
        $arr = M('bookss_model')->save(array('b_dian'=>$b_dian),array('b_id'=>$id));
        var_dump($arr);

    }
    public function sou(){
        $sou = isset($_GET['sou']) ? $_GET['sou'] : '';
        $ye = isset($_GET['ye']) ? $_GET['ye'] : 1;
        $pian = ($ye-1)*3;

        $sql = "SELECT * FROM bookss WHERE 1=1 AND b_name  LIKE '%$sou%' LIMIT $pian,3;";
        $ary = array(11211,11212,11213);
        $memcache = new memcache;
        $fuwu = $ary[crc32($sql)%3];
        $memcache->connect('127.0.0.1',11212);
        exit;
        if (!$arr = $memcache->get($sql)) {
            echo "重新加载";
            $arr = M('bookss_model')->query($sql);
            $memcache->set($sql,$arr);
        }



        $this->assign('arr', $arr);
        $this->display();
    }


    public function cai(){
        header("content-type:text/html;charset=utf-8");
        /*   cURL - Get方式请求天气接口  返回Json数据 */
        // $url = "http://www.hongshu.com/bookstore.html";
        // //开启curl
        // $curlobj = curl_init();
        // //设置访问的URL
        // curl_setopt($curlobj,CURLOPT_URL,$url);
        // //执行之后不打印出来
        // curl_setopt($curlobj,CURLOPT_RETURNTRANSFER,1);
        // curl_setopt($curlobj, CURLOPT_SSL_VERIFYPEER,false);// 对认证证书来源的检查
        // curl_setopt($curlobj, CURLOPT_SSL_VERIFYHOST,false);// 从证书中检查SSL加密算法是否存在
        // //执行curl
        // $content = curl_exec($curlobj);
        // //执行完毕释放
        // curl_close($curlobj);
        // //输入或者打印结果
        // echo $content;
        // // print_r($content);
        // echo VIEW_DIR.'/welcome/index.html';exit;

        $file = file_get_contents(VIEW_DIR.'/welcome/index.html');

        $zhengze =  '#<li>\s*'.
                    '<div class="hp_jiaobiao">.*</div>\s*'.
                    '<a href=".*" class="hp_fengmian">\s*'.
                    '<img class=".*" src="(.*)" width="200" height="250">\s*'.
                    '<div class=".*">\s*'.
                    '<img src=".*" width=".*" height=".*">\s*'.
                    '</div>\s*'.
                    '<div class=".*">\s*'.
                    '<img src=".*" width="200" height="252">\s*'.
                    '</div>\s*'.
                    '</a>\s*'.
                    '<p class="hp_shuming">(.*)</p>\s*'.
                    '<p class="hp_zuozhe">(.*) 著</p>\s*'.
                    '<div class="hp_caozuo">\s*'.
                    '<p class="cred">(.*)</p>\s+'.
                    '#';
        preg_match_all($zhengze,$file,$arr);

        $dsn = "mysql:host=127.0.0.1;dbname=text;"; //就是构造我们的DSN（数据源）

        $db = new PDO($dsn,'root','root');          // 初始化一个PDO对象

        foreach ($arr[1] as $key => $value) {
            $ss = file_get_contents('http:'.$value);
            $img_name = date('Ymdhis',time()).mt_rand().'.jpg';
            $img_url = './public/img/'.$img_name;
            file_put_contents($img_url,$ss);

            $b_name = $arr[2][$key]; // 名称
            $b_feng = $img_url;      // 封面
            $b_zuo  = $arr[3][$key]; // 作者
            $b_piao = $arr[4][$key]; // 票数

            $sql = "INSERT INTO bookss(b_name,b_feng,b_zuo,b_piao) VALUES('$b_name','$b_feng','$b_zuo','$b_piao');";                 // mysql语句
            if ($key == 9) {
                echo $b_name;exit;
            }
            $list = $db->exec($sql);                    // 执行MySQL语句的另一种方法
        }




    }

}


