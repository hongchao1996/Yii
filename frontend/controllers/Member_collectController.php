<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;

class Member_collectController extends CommenController{
    public function actionIndex(){
    		$db = Yii::$app->db;
	 		$list = $db->createCommand('select * from gongsi_geren inner join qiye on gongsi_geren.gongsi_id = qiye.id where statuss = 1 and status = 4')->queryAll();
	 		//print_r($list);die;
	 		return $this->render('index',['list'=>$list]);	
    }
}
?>