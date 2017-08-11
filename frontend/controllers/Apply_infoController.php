<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;

class Apply_infoController extends CommenController{
    public function actionIndex(){
    	$db = Yii::$app->db;
    	$list = $db->createCommand("select * from yuexin")->queryAll();
    	$list1 = $db->createCommand("select * from job_date")->queryAll();
    	$list2 = $db->createCommand("select * from region where parent_id = 1")->queryAll();
      	return $this->render('index',['list'=>$list,'list1'=>$list1,'list2'=>$list2]);
    }
    public function actionAdd_do(){
    	$db = Yii::$app->db;
    	$data = $_POST;
    	$session = \Yii::$app->session;
    	$mysession = $session->get('smister_array');
    	$data['user_id'] = $mysession[0]['id'];
    	$res = $db->createCommand()->batchInsert('myxinxi',['username','sex','c_date','email','phone','job_date','now_job','now_zhiye','job_city','now_money','qi_job','qi_zhiye','qi_city','qi_y_money','d_date','user_id'],[[$data['username'],$data['sex'],$data['c_date'],$data['email'],$data['phone'],$data['job_date'],$data['now_job'],$data['now_zhiye'],$data['job_city'],$data['now_money'],$data['qi_job'],$data['qi_zhiye'],$data['qi_city'],$data['qi_y_money'],$data['d_date'],$data['user_id']]])->execute();
    	if($res){
    		$this->redirect(array('apply_resume/index'));
    	}else{
    		echo '失败';
    	}
    }
    public function actionRegister(){
    	$db = Yii::$app->db;
    	$id = $_GET['id'];
    	$list2 = $db->createCommand("select * from region where parent_id = ".$id)->queryAll();
    	$list = json_encode($list2);
      	print_r($list);
    }
    public function actionGai(){
  		$session = \Yii::$app->session;
    	$mysession = $session->get('smister_array');
    	if($mysession){
	    	$id = $mysession[0]['id'];
	    	$db = Yii::$app->db;
	    	$res = $db->createCommand()->delete('myxinxi','user_id ='.$id)->execute();
    	}
    	$this->redirect(array('apply_info/index'));	
    }

    //apply_resume 的添加
    public function actionAdd_du(){
    	$data = $_POST;
    	$session = \Yii::$app->session;
    	$mysession = $session->get('smister_array');
    	$data['user_id'] = $mysession[0]['id'];
    	$db = Yii::$app->db;
    	$res = $db->createCommand()->batchInsert('lvli',['jiaoyu_id','com_name','zhi_name','job_zhize','yuyan','user_id'],[[$data['jiaoyu_id'],$data['com_name'],$data['zhi_name'],$data['job_zhize'],$data['yuyan'],$data['user_id']]])->execute();
    	if($res){
    		$this->redirect(array('apply_review/index'));
    	}else{
    		echo '添加失败';
    	}
    }

    //apply_review 的上一步
     public function actionShang(){
    	$session = \Yii::$app->session;
    	$mysession = $session->get('smister_array');
    	if($mysession){
	    	$id = $mysession[0]['id'];
	    	$db = Yii::$app->db;
	    	$res = $db->createCommand()->delete('lvli','user_id ='.$id)->execute();
    	}
    	$this->redirect(array('apply_resume/index'));
    }

}
?>