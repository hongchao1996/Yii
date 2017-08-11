<?php
/*
 **��¼
 */
namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Register;
use Yii\base\Model;
use Yii;

class CommenController extends Controller{
    public function __construct($id, $module, $config = [])
	{
		$this->id = $id;
        $this->module = $module;
		$session = \Yii::$app->session;
	 	$bb = $session->get('smister_array');

	 	$cookie = \Yii::$app->request->cookies->get('xiaochao');
	 	if(!empty($cookie)){
	 		$aa = $cookie->value;
	 	}
		if(!empty($aa)&&!empty($bb))
		{
			$bb = $aa;
		}
		if(!isset($bb)||empty($bb))
		{
			//header('Location:http://home.com/index.php?r=login/login');
			// header('Refresh:3,Url=http://home.com/index.php?r=login/login');
			// echo '请您先登录，三秒后调到登录页面';
			//die;
			echo  "<script>alert('请您先登录');location.href='http://home.com/index.php?r=login/login';</script>";
		}
	}
}
?>