<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;

class Apply_resumeController extends CommenController{
    public function actionIndex(){
    	return $this->render('index');
    }
}
?>