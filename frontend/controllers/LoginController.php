<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;

class LoginController extends Controller{
	public function actionIndex(){
		$query = new Register();
		return $this->render('index',['model'=>$query]);
	}
	
	public function actionLogin(){
		$model=new Register();
            return $this->render('login', [
                'model' => $model,
            ]);
	}
	public function actionLogin_do(){
	    $data = $_POST;
	    $cookie = \Yii::$app->request->cookies->get('xiaochao');
	    $query = new Register();   
	    if($datas = $query->find()->where(['username' =>$data['Register']['username']])->asArray()->all()){
	        if($data['Register']['password']==$datas[0]['password']){
	            if($data['Register']['status']==1){
	                $cookie = new \yii\web\Cookie();
	                $cookie->name = 'xiaochao';
	                $cookie->expire = time()+86400*7;
	                $cookie->value = $datas; 
	                \Yii::$app->response->getCookies()->add($cookie);
	                //取cookie
 	                //$cookie = \Yii::$app->request->cookies;
 	                //print_r($cookie);die;   
	            }
	           $session = \Yii::$app->session;
	           $session->set('smister_name' , 'xiaochaole');
               $session->set('smister_array' ,$datas);
               //取session
               //print_r($session->get('smister_array'));die;  
	           $this->redirect(array('index/index'));
	        }else{
	            echo '密码错误';
	        }
	    }else{
	        echo '用户名错误';
	    }
	}
	public function actionTuichu(){
		$session = \Yii::$app->session;
		$session->removeAll();
	    return $this->redirect(array('index/index'));
	}
}
?>