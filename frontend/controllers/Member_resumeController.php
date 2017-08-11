<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;

class Member_resumeController extends CommenController{
    public function actionIndex(){
    	$db = Yii::$app->db;
    	$list = $db->createCommand('select * from myxinxi inner join yuexin on myxinxi.now_money = yuexin.id')->queryAll();
    	$list2 = $db->createCommand('select * from lvli inner join jiaoyu on lvli.jiaoyu_id = jiaoyu.id')->queryAll();
    	//print_r($list2);die;
      return $this->render('index',['list'=>$list,'list2'=>$list2]);
    }
    public function actionAdd_do(){
    	echo 123;
    }
    public function actionXiazai(){
        $url = 'http://localhost/Yii/yii/advanced/frontend/web/index.php?r=member_resume%2Findex';
        $list = file_get_contents($url);
        echo $list;     
    }
}
?>