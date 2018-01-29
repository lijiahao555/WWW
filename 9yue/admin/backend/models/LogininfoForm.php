<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class LogininfoForm extends Model
{
    public $admin_name;
    public $email;
    public $tel;
    public $file_upload;

    public function rules()
	{
	    return [
            [['file_upload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
	}

	public function upload()
    {
        var_dump($this);
        if ($this->validate()) {

            $this->file_upload->saveAs('../web/uploads/' . $this->file_upload->baseName . '.' . $this->file_upload->extension);
            return true;
        } else {
            return false;
        }
    }

}

