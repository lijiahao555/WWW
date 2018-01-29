<?php
namespace app\index\controller;

use app\index\AuthModel;
use app\index\model\Auth;
use app\index\view;

use think\Db;

use think\Session;
use think\Cookie;

use think\Request;

use think\Controller;

/**
 * 微信相关
 */
class Weixin extends Controller
{


    public function index()
    {

		//调试写入xml
		// file_put_contents('./a.xml',$GLOBALS['HTTP_RAW_POST_DATA'] );die;

		//加载本地xml 调试
		// $res = simplexml_load_file('./a.xml', null, LIBXML_NOCDATA);

		// LIBXML_NOCDATA 自动过滤cdata的定界符
		$res = simplexml_load_string($GLOBALS['HTTP_RAW_POST_DATA'], null, LIBXML_NOCDATA);

        // 关注事件
		if ($res->MsgType == 'event') {
            $auth = model('AuthModel');
			//订阅 关注
			if ($res->Event == 'subscribe') {

				$str = '<xml>
        					<ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
        					<FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
        					<CreateTime>'.time().'</CreateTime>
        					<MsgType><![CDATA[text]]></MsgType>
        					<Content><![CDATA[欢迎关注李家豪的测试号！]]></Content>
        				</xml>';

                //群发参数存在不进入
                if (!$res->MsgID) {
                    if (!$auth->findData((string)$res->FromUserName)) {
                        $result = $auth->insertData(['open_id' => (string)$res->FromUserName]);
                    }

                }

                 echo $str;

			}

            /** 获取地理位置 */
            if ($res->Event == 'LOCATION') {

                $auth = Auth::get(['open_id'=>(string)$res->FromUserName]);
                $auth->wei = $res->Latitude;
                $auth->jing = $res->Longitude;
                $auth->save();

            }



            //取消订阅
            if ($res->Event == 'unsubscribe') {

                $str = '<xml>
                            <ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
                            <FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
                            <CreateTime>'.time().'</CreateTime>
                            <MsgType><![CDATA[text]]></MsgType>
                            <Content><![CDATA[取消关注aaaa！]]></Content>
                        </xml>';
                $auth->deleteData((string)$res->FromUserName);

            }


		}

        //接受图片消息
        if($res->MsgType == 'image'){
            $str = '<xml>
                    <ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
                    <FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
                    <CreateTime>'.time().'</CreateTime>
                    <MsgType><![CDATA[image]]></MsgType>
                    <Image>
                    <MediaId><![CDATA['.$res->MediaId.']]></MediaId>
                    </Image>
                    </xml>';
            echo $str;
        }

        //接受语音消息
        if($res->MsgType == 'voice'){
            $str = '<xml>
                    <ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
                    <FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
                    <FromUserName><![CDATA[fromUser]]></FromUserName>
                    <CreateTime>'.time().'</CreateTime>
                    <MsgType><![CDATA[voice]]></MsgType>
                    <Voice>
                    <MediaId><![CDATA['.$res->MediaId.']]></MediaId>
                    </Voice>
                    </xml>';
            echo $str;
        }


        // text事件
        if ($res->MsgType == 'text') {

            $auth = model('AuthModel');

            // 搜地图半径的内容
            if (strpos((string)$res->Content, '附近') !== false) {

                //入库
                $auth->updateData(['search' => (string)$res->Content],(string)$res->FromUserName);

                $data = $auth->findData((string)$res->FromUserName);

                $data['new_search'] = explode('附近',(string)$res->Content);

                $search = $this->getMp($res, $data);
                echo $search;
            }


        }

    }

    /** js sdk */
    public function getJs()
    {
        file_put_contents('./js.xml',$GLOBALS['HTTP_RAW_POST_DATA'] );
        return view('getjs');
    }

    /** JS-SDK使用权限签名算法 */
    public function getJssdk()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$acc.'&type=jsapi';

    }

    /** 搜索附近地区 内容 */
    public function getMp($res = '', $data =[])
    {


        //拼接url
        $url = 'http://api.map.baidu.com/place/v2/search?query='.$data['new_search'][1].'&location='.$data['wei'].','.$data['jing'].'&radius=2000&scope=2&output=json&ak=5X1CsGGNatpHQdsCgUmoNw84xn8b5wTN';



        $search = json_decode($this->get($url));
        // print_r($search);die;
        if ($search->status == 0) {

            if (!empty($search->results)) {

                //拼接
                $arr = '';
                foreach ($search->results as $k => $v) {

                        $arr .= '附近'.$data['new_search'][1].'：'.($k+1).' . '.$v->name.'

    '.' 所在地：'.$v->address.'



    ';
                }
                    // 文字格式
                    $str = '<xml>
                                <ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
                                <FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
                                <CreateTime>'.time().'</CreateTime>
                                <MsgType><![CDATA[text]]></MsgType>
                                <Content><![CDATA['.$arr.']]></Content>
                            </xml>';


            } else {

                $str = '<xml>
                            <ToUserName><![CDATA['.$res->FromUserName.']]></ToUserName>
                            <FromUserName><![CDATA['.$res->ToUserName.']]></FromUserName>
                            <CreateTime>'.time().'</CreateTime>
                            <MsgType><![CDATA[text]]></MsgType>
                            <Content><![CDATA[您的搜索附近暂时搜索不到]]></Content>
                        </xml>';
            }

            return $str;
        }

    }

    /** 获取token */
    public function getToken()
    {

    	if (!empty(input('post.'))) {
    		$post = input('post.');

			// 初始化curl
			$res = $this->getToken2($post);

			return json_decode($res,true);

    	} else {

    		return view('getAccess_Token');

        }
    }

    /** 获取token */
    public function getToken2($post = [])
    {

        if (Cookie::has('token')) {

            return Cookie::get('token');

        } else {

            // 设置url
            if (!empty($post)) {

                $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type='.$post['type'].'&appid='.$post['id'].'&secret='.$post['key'].'';

            } else {

                $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx65c96fa613ac4f0e&secret=5a62ea768f0ab48cd9e7a289515ae953';
            }

            //返回json数据
            $access_token = $this->get($url);

            Cookie::set('token', $access_token, 7200);

            return Cookie::get('token');

        }

    }

    /** 微信文字群发 */
    public function Text()
    {
    	if (!empty($post = input('post.'))) {
            // post提交
            $data =[];

            //是群发还是选发
            if ($post['type']) {

                $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token='.$post['access_token'];
                $data = '{"filter":{"is_to_all":true},"msgtype": "text","text": { "content": "'.$post['content'].'"},"clientmsgid":"'.rand(0,9999).'"}';

            } else {

                $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.$post['access_token'];

                $open_id = json_encode($post['id']);

                $data = '{
                   "touser":[
                    '.$open_id.'
                   ],
                    "msgtype": "text",
                    "text": { "content": "'.$post['content'].'"},
                    "clientmsgid":"'.rand(0,9999).'"
                }';

            }



    		$res = $this->post($url,$data);

            return json_decode($res, true);

    	}else{

            // 展示数据

    		$auth = model('AuthModel');

    		$data = $auth->selectData();

            $token = json_decode($this->getToken2(),true);

            $user = $this->getUser($token,$data);

            $list = json_decode($user, true);

    		$this->assign('list', $list['user_info_list']);

    		return $this->fetch('text');

    	}
    }

    /** 获取用户基本信息 */
    public function getUser($token = '', $data = [])
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token='.$token['access_token'];
        // $url = 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=5_NpW4VJNlCRR0bcznrpFhz6Q01HIDVV3aoBlVAwIqVEcAMTxObwf4vIdop1c4s7egJjnRpv-hG0UCQMN_KUiKSi_b_Z4QUwc3WI7Fh6koULPDip062f9TjJK-qYuiJ3U0HLLQa-TPOgfBvkWZCMLdAGALVU';
        $arr = [];

        foreach ($data as $k => $v) {
            $arr['user_list'][$k]['openid'] = $v['open_id'];
            $arr['user_list'][$k]['lang'] = 'zh_CN';
        }

        return $this->post($url, json_encode($arr));
    }

    /** 设置菜单 */
    public function getMenu()
    {
        if (!empty($post = input('post.'))) {

            $arr = array();

            foreach ($post['father_type'] as $key => $val) {// 循环
                $parent = array();

                //一级菜单 且 对应的子级存在
                if ($val == 'parent' && !empty($post['child_type'][$key])) {

                    //一级菜单名字
                    $parent['name'] =  $post['father_name'][$key];


                    foreach ($post['child_type'][$key] as $k => $v) {// 循环

                        //判断是 点击事件还是视图事件 给出相应的key值
                        switch ($v) {
                            case 'click': $c_key  = 'key'; break;
                            case 'view': $c_key = 'url'; break;
                        }

                        // 拼接数据  子级的事件内容不为空
                        if (!empty($post['child_content'][$key][$k])) {

                            $str = array('name' => $post['child_name'][$key][$k] , 'type' => $v , $c_key => $post['child_content'][$key][$k]);

                        } else {

                            // 子级的事件内容为空
                            $str = array('name' => $post['child_name'][$key][$k] , 'type' => $v , $c_key => $c_key);

                        }

                        // 二级菜单内容
                        $parent['sub_button'][$k] = $str;

                    }

                }else{
                    // 父级 一级菜单 子级不存在

                    //父级菜单==parent 和 事件内容为空时
                    if ($val == 'parent' && empty($post['father_content'][$key])) {

                        $parent = array('name' => $post['father_name'][$key] , 'type' => 'click' , 'key' => 'click');

                    } else {
                    //父级菜单不等于parent时 和 事件内容不为空时

                        // 父级菜单不等于parent时 父级事件内容不为空时
                        if ($val == 'parent' && !empty($post['father_content'][$key]))
                        {

                            $parent = array('name' => $post['father_name'][$key] , 'type' => 'key' , 'key' => $post['father_content'][$key]);

                        } else {

                            //父级菜单不等于parent时 和 父级事件内容为空时 判断是什么事件
                            switch ($val) {
                                case 'click': $c_key = ['key' => 'key', 'type' => 'click']; break;
                                case 'view': $c_key = ['key' => 'url', 'type' => 'view']; break;
                            }

                            $parent = array('name' => $post['father_name'][$key], 'type' => $c_key['type'], $c_key['key'] => $post['father_content'][$key]);

                        }

                    }
                }
                //赋值
                $arr[] = $parent;
            }

            //赋值
            $data['button'] = $arr;

            //转换json数据  JSON_UNESCAPED_UNICODE转换成文字
            $data = json_encode($data,JSON_UNESCAPED_UNICODE);

            // 链接
            $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$post['token'];

            echo $this->post($url,$data);

        } else {

            //加载视图
            return view('getMenu');
        }
    }


    /** curl post方法 */
    public function post($url = '', $data = []){
		$curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
	    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    $data = curl_exec($curl); // 3.抓取URL并把它传递给浏览器
        curl_close($curl);

        return $data;
	}

    /** curl get方法 */
	public function get($url = '', $arr = ''){
		$curl = curl_init();
		if (is_array($arr)) {
			$url = $this->get_array($arr,$url);
		}
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);	// 设置网页不输出
	    curl_setopt($curl, CURLOPT_URL, $url);//2.设置URL和相应的选项
	    $data = curl_exec($curl); // 3.抓取URL并把它传递给浏览器
        curl_close($curl);
        return $data;
	}

    /** 拼接数组成字符串 */
	public function get_array($arr,$url){
		$str = $url.'?';
		foreach ($arr as $k => $v) {
			$str .= $k.'='.$v.'&';
		}
		return trim($str,'&');
	}

    /** 获取media_id */
    public function getTW()
    {
        if (!empty($post = input('post.'))) {

            $url = 'https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=5_6HKfRr7huEA-B5w-NzCIxPxhausGrif6XMvM_Z4BbcxcYcr0Z0Co0awfPiUzwkTb7KwenEmkA1jMaaIWpzLYk908LKMDq21X8kgOJFJoT_h4_jv4YQGBDmPA8A7U1U8YG4Sw6i6sdMZpmUKRGZXjAGAMFD';

            $data = [];
            for ($i=0; $i <2 ; $i++) {
                $data['articles'][$i]['thumb_media_id'] = 'o8BGVGGGC39eEyG0UxCI40XLuyiUkE4UghWqByuWR9_1rGPEIGWmN0O2oCNVO0Dk';
                $data['articles'][$i]['title'] = $post['title'].$i;
                $data['articles'][$i]['content'] = $post['content'].$i;
            }



            $data = json_encode($data);


            $data = '{
               "articles": [{"thumb_media_id":"tPAUR9eTSIcEmaGQA-HyFvwO8bCwlcIN620kZvtW_NfjA3L-oEeoaRUfm6TLFx0K","title":"nihao","content":"我就是试试","show_cover_pic":1}]}';


            $res = $this->post($url,$data);
            var_dump($res);die;
            // '-AMIYj2DsfAflbMSrHUpQyct6Yo2HSoIzC7hqsVJDJOtejPZBnFRGnJAofNfYctR';
        }else{

            return $this->fetch('getTW');

        }
    }

    public function TwAll()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=5_6HKfRr7huEA-B5w-NzCIxPxhausGrif6XMvM_Z4BbcxcYcr0Z0Co0awfPiUzwkTb7KwenEmkA1jMaaIWpzLYk908LKMDq21X8kgOJFJoT_h4_jv4YQGBDmPA8A7U1U8YG4Sw6i6sdMZpmUKRGZXjAGAMFD';
        $data = '{
                   "filter":{
                      "is_to_all":true
                   },
                   "mpnews":{
                      "media_id":"kh-k4T7rv0V-OHe-XZakSkFjRvuIU4iq6eJBRf799z74IwK_6q7t7IBt0rclK2S1"
                   },
                    "msgtype":"mpnews",
                    "send_ignore_reprint":0
                }';
        $res = $this->post($url, $data);
        var_dump($res);die;

    }

    /** 授权登录 */
    public function getAdmin()
    {
        $code = input('get.');
        //获取code
        if (empty(Session::get('code'))) {
            Session::set('code', $code['code']);
        }else{
            $code = Session::get('code');
            Session::delete('code');
            // 获取access_token
            $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx65c96fa613ac4f0e&secret=5a62ea768f0ab48cd9e7a289515ae953&code='.$code.'&grant_type=authorization_code';

            $access_token = $this->get($url);

            $access_token = json_decode($access_token,true);

            // 获取用户信息
            $user_info = 'https://api.weixin.qq.com/sns/userinfo?access_token='.$access_token['access_token'].'&openid='.$access_token['openid'].'&lang=zh_CN';

            $user_info = $this->get($user_info);

            $user_info = json_decode($user_info,true);
            $user_info['openid'] = $access_token['openid'];
            $this->assign('data', $user_info);

            return $this->fetch('user');
        }


    }

    /** 编辑定时任务  */
    public function crontab(){
        if (!empty($data = input('post.'))) {
            echo 1;die;
        }else{

            $get = input('get.');
            print_r($get);die;
            $this->assign('data', $get);

            return $this->fetch('user2');
        }
    }

    /** 获取临时素材 */
    public function getsource()
    {
        return $this->fetch('getSource');
    }

    /** 文件上传 */
    public function upload_photo(){
        
        $file = $this->request->file('file');
        $img_url = ROOT_PATH . 'public' . DS . 'static/uploads/weixin';

        if(!empty($file)){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->rule('date')->move($img_url);
            $error = $file->getError();
            //验证文件后缀后大小
            if(!empty($error)){
                dump($error);exit;
            }
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg
                $photo = $info->getFilename();

            }else{
                // 上传失败获取错误信息
                $file->getError();
            }
        }else{
            $photo = '';
        }

        if($photo != ''){

            $img = $img_url.'/'.$photo;

            return json_decode($this->media_id($img), true);

        }else{

            return ['code'=>404,'msg'=>'失败'];
        }
    }

    public function getSource2($img)
    {


        $files = request()->file('files');

        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads/');
        var_dump($info);die;
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getFilename(); 
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }




            // 移动到框架应用根目录/public/uploads/ 目录下
        
        echo 1;die;
        if($info){

                $data['media'] = "http://www.ljiahao.top/tp/public/static/uploads/20180114/b01e1a2402ca3599ff8e5c2c772a0ddb.JPG;type=image;filename=b01e1a2402ca3599ff8e5c2c772a0ddb.JPG;filelength=2048;content-type=".$_FILES['files']['type']."";

                echo $this->post($url, $data);
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }


    }

    public function media_id($img = '')
    {

        $img = '/phpstudy/www/tp/public/static/uploads/weixin/20180115/9c0b348fcbd9e84cd237d46da279f293.JPG';

        $token = json_decode($this->getToken2(),true);
        $url = 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token='.$token['access_token'].'&type=image';

        return $this->http_post($url, $img);

    }

    /** 图片curl */
    public function http_post($url ='' , $img_url = '' )
    {

        $curl = curl_init();
        if(class_exists('\CURLFile')){

            curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, true);
            $data = array('media' => new \CURLFile($img_url));
        }else{

            if (defined ( 'CURLOPT_SAFE_UPLOAD' )) {
                curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, false );
            }
            $data = array('media' => '@' . realpath($img_url));
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }


    public function aaa()
    {
        $http = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx65c96fa613ac4f0e&redirect_uri='.urlEncode('http://www.ljiahao.top/admin/frontend/web/index.php?r=wexin/index').'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';

        echo $http;die;
        // https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx65c96fa613ac4f0e&redirect_uri=http%3A%2F%2Fwww.ljiahao.top%2Fadmin%2Ffrontend%2Fweb%2Findex.php%3Fr%3Duser%2Fuser&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect

        echo $http;die;
        $http = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx65c96fa613ac4f0e&redirect_uri=http%3A%2F%2F47.95.198.52%2Ftp%2Fpublic%2Findex.php%2Findex%2FWeixin%2FgetAdmin&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
    }

}

