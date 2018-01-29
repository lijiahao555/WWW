<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


use Response,Cookie,Redirect,Sensitive;

class DemoController extends Controller
{

	/** 处理添加 */
    public function index(){

    	if (!empty(Input::post('content'))) {
    		$data = Input::post();

    		$interference = ['&', '*'];
			$filename = 'E:\phpStudy\WWW\9yue\my_laravel\vendor\yankewei\laravel-sensitive\demo/words.txt'; //每个敏感词独占一行
			Sensitive::interference($interference); //添加干扰因子
			Sensitive::addwords($filename); //需要过滤的敏感词

			$words = Sensitive::filter($data['content']);

    		$res = DB::table('content')->insert(['content'=>$words,'add_name'=>$data['add_name']]);
    		if ($res) {
    			$page = DB::table('content')->orderby('id','desc')->paginate(3)->toArray();
    			return view('demo/add',$page);
    		}
    	}else{

    		$page = DB::table('content')->orderby('id','desc')->paginate(3)->toArray();

    		return view('demo/add',$page);
    	}
    }

    //处理登录
    public function loginDoo(){
    	$data = Input::post();

    	$res = DB::select('select * from user where name = "'.$data['name'].'" and password = "'.$data['password'].'"');

    	if (is_array($res)) {
    		Cookie::queue('name', $data['name']);
    		return Redirect::to('test');
    	}
    }

    /** 处理删除 */
    public function delone(){
    	$id = Input::get('id');
    	$res = DB::delete('delete from content where id = "'.$id.'"');
    	if ($res) {
    		return Redirect::to('test');
    	}
    }

    /** 修改 */
    public function up(){
    	$id = Input::get('id');
    	if (!empty(Input::post('content'))) {
    		$data = Input::post();
    		$res = DB::table('content')->where('id', $data['id'])->update(['content' => $data['content']]);
    		if ($res) {
    			return Redirect::to('test');
    		}
    	}else{
    		$data['data'] = DB::select('select * from content where id = "'.$id.'"')[0];
    		return view('demo/up',$data);
    	}
    }
}