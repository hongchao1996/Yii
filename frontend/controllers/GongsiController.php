<?php

namespace frontend\controllers;
use yii\web\Controller;
use Yii;
class GongsiController extends Controller{
	public $layout = 'aa';
	public function actionIndex(){
		$id = Yii::$app->request->get('id');
		$db = Yii::$app->db;
		$list = $db->createCommand('select * from qiye where id ='.$id)->queryAll();
		$list1 = $db->createCommand('select * from gongsi_geren where status = 4 and gongsi_id ='.$id)->queryAll();
		return $this->render('index',['list'=>$list,'list1'=>$list1]);
	}
	public function actionAdds(){
		$session = \Yii::$app->session;
	 	$mysession = $session->get('smister_array');
	 	$user_id = $mysession[0]['id'];
	 	$qiye_id = Yii::$app->request->get('id');
	 	$status = 0;
	 	$statuss = 0;
	 	$times = time();
	 	$db = Yii::$app->db;
	 	$res = $db->createCommand()->batchInsert('gongsi_geren',['geren_id','gongsi_id','status','times','statuss'],[[$user_id,$qiye_id,$status,$times,$statuss]])->execute();
	 	if($res){
	 		$this->redirect(array('member_apply/index'));
	 	}
	}
	public function actionCang(){
		$qiye_id = $_GET['id'];
		$session = \Yii::$app->session;
	 	$mysession = $session->get('smister_array');
	 	$user_id = $mysession[0]['id'];
		$statuss = 1;
		$status = 4;
	 	$times = time();
	 	$db = Yii::$app->db;
	 	$res = $db->createCommand()->batchInsert('gongsi_geren',['geren_id','gongsi_id','times','statuss','status'],[[$user_id,$qiye_id,$times,$statuss,$status]])->execute();
	 	if($res){
	 		$this->redirect(array('member_collect/index'));
	 	}
	}
}

?>