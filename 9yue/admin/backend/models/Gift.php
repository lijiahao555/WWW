<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;  
 
/**
 * This is the model class for table "gift".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 * @property integer $money
 */
class Gift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gift';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['money'], 'integer'],
            [['name', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
            'money' => 'Money',
        ];
    }

    public function upload(){  
        // $this->img->baseName  源文件名
        return $this->img->saveAs('../web/upload/' . 'gift'.date('YmdHis').rand(10000,99999) . '.' . $this->img->extension);  
  
    }

}
