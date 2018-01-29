<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weixin".
 *
 * @property integer $id
 * @property string $appid
 * @property string $appsecret
 * @property string $url
 * @property string $token
 */
class Weixin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weixin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appid', 'appsecret', 'url', 'token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appid' => 'Appid',
            'appsecret' => 'Appsecret',
            'url' => 'Url',
            'token' => 'Token',
        ];
    }
}
