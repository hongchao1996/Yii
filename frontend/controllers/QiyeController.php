<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;

class QiyeController extends Controller{
    public function actionIndex(){
    	$db = Yii::$app->db;
    	$list = $db->createCommand('select * from gongsi_geren inner join myxinxi on gongsi_geren.geren_id = myxinxi.id where gongsi_geren.gongsi_id = 1 and status !=4')->queryAll();
      	return $this->render('index',['list'=>$list]);
    }
    public function actionDel(){
    	echo 1;
    }
    public function actionGai(){
    	$user_id = $_GET['id']; 
        $db = Yii::$app->db;
        $res = $db->createCommand()->update('gongsi_geren',['status'=>2],['and','geren_id='.$user_id,'statuss=0','gongsi_id=1'])->execute();
        if($res){
            echo  "<script>alert('已拒绝');location.href='http://home.com/index.php?r=qiye/index';</script>";
        }
    }
    public function actionKan(){
        $session = \Yii::$app->session;
        $mysession = $session->get('smister_array');
        $id = $mysession[0]['id'];
    	$db = Yii::$app->db;
        $list = $db->createCommand('select * from myxinxi inner join yuexin on myxinxi.now_money = yuexin.id where user_id='.$id)->queryAll();

         $res = $db->createCommand()->update('gongsi_geren',['status'=>1],['and','geren_id='.$id,'statuss=0','gongsi_id=1'])->execute();
        echo json_encode($list);
    }
    public function actionTong(){
    	
    }
}
?>