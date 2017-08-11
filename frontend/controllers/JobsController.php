<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;
use yii\data\Pagination;

class JobsController extends Controller{
	public $layout = 'aa';
    public function actionIndex(){
    	$db = Yii::$app->db;
    	$pagination = new Pagination([
		 		'defaultPageSize' => 5,
		 		'totalCount' => $db->createCommand('select * from qiye')->queryScalar()	,
		 		]);
		$list = $db->createCommand('select * from qiye limit 5')
		 			->queryAll();
		$list1 = $db->createCommand('select * from qiye')->queryScalar();
      	return $this->render('index',['list'=>$list,'list1'=>$list1,'pagination'=>$pagination]);
    }
}
?>