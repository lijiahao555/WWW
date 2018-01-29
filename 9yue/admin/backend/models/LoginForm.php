<?php
namespace backend\models;
use yii\base\Model;


class LoginForm extends Model
{
    public $username;
    public $password;
    public $captcha;
    public function rules()
    {
        return [
            [['username','password'], 'required'],
        ];
    }
}
