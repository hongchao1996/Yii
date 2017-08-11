<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;

class Member_applyController extends CommenController{
    public function actionIndex(){
    

	 		$db = Yii::$app->db;
	 		$list = $db->createCommand('select * from gongsi_geren inner join qiye on gongsi_geren.gongsi_id = qiye.id where statuss = 0')->queryAll();

	 		return $this->render('index',['list'=>$list]);
	 
    }
}
?>