<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;

//表
use App\Models\User;
use App\Models\OauthUser;


/**
 * 登录
 */
class LoginController extends Controller
{

    public function login()
    {

    	return view('login/login');

    }

    /** QQ第三方登录 */
    public function qq()
    {

    	$state = md5(uniqid(rand(), TRUE));

    	$url = 'https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101353491&redirect_uri='.URLEncode('http://www.iwebshop.com/index.php').'&state='.$state;

    	header("location:$url");
    }

    /** qq回调回来内容 */
    public function qq2()
    {

    	$openid = Input::get('open_id');

    	$appid = Input::get('appid');

    	$access_token = Input::get('access_token');

    	$url = 'https://graph.qq.com/user/get_user_info?access_token='.$access_token.'&oauth_consumer_key='.$appid.'&openid='.$openid.'';

    	$data = file_get_contents($url);
    	$data = json_decode($data, true);

    	// $user = User::create(['username' => $data['nickname']]);
    	$user = '{"username":"\u4eba\u6027\u8584\u5982\u7eb8.","id":1}';
    	$user = JSON_decode($user, true);

        $arr = [
    		'user_id' => $user['id'],
    		'oauth_user_id' => $openid,
    		'oauth_id' => 1,
    		'datetime' => date('Y-m-d H:i:s'),
    	];

        $result = OauthUser::create($arr);

        if ($result) {
            echo "成功";
        }
        else
        {
            echo "失败";
        }

    }

}
