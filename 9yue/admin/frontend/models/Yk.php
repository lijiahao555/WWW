<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yk".
 *
 * @property integer $id
 * @property string $open_id
 * @property string $name
 * @property string $url
 * @property integer $time
 */
class Yk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time'], 'integer'],
            [['open_id', 'name', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'open_id' => 'Open ID',
            'name' => 'Name',
            'url' => 'Url',
            'time' => 'Time',
        ];
    }
}
