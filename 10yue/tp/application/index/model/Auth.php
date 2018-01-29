<?php
namespace app\index\model;

use think\Model;

class Auth extends Model
{
	protected $table = 'Auth';

    //自定义初始化
    protected static function init()
    {
        //TODO:自定义的初始化
    }
}
