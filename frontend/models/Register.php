<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

class Register extends ActiveRecord{
	
	 public function rules()
    {
        return [
            [['username','status','email','password','qpassword'], 'required'],
           // ['username', 'unique', 'targetClass' => '\common\models\User'],
            
            ['email', 'email'],
            
            ['verifyCode', 'required'],
            ['verifyCode', 'captcha'],
            
            [['file'], 'file', 'skipOnEmpty' => false, 'maxFiles'=>10],
           // [['file'], 'file'],
            
            ['qpassword', 'required'],
            ['qpassword', 'compare', 'compareAttribute'=>'password'],
            
        ];
    }
    
}

?>