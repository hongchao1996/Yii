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
    	$db = Yii::$app->db;
    	$list = $db->createCommand('select * from jiaoyu')->queryAll();
    	return $this->render('index',['list'=>$list]);
    }
     public function actionShang(){
    	echo 1;
    }
}
?>