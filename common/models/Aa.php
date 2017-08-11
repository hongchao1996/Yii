<?php
namespace common\models;
use yii\db\ActiveRecord;
use Yii;
use yii\base\Model;

class Aa extends ActiveRecord{
	
	 public function rules()
    {
        return [
            // name, email, subject and body are required
            [['username', 'email','password', 'address'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            
        ];
    }
}