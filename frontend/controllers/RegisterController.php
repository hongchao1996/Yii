<?php
/*
 **ע��
 */
namespace frontend\controllers;
use Yii\base\Model;
use yii\web\Controller;
use frontend\models\Register;
use Yii;
use yii\web\UploadedFile;
class RegisterController extends Controller{

	public function actionReg(){
		$model=new Register();
            return $this->render('reg', [
                'model' => $model,
            ]);
	}
	public function actionIndex(){
		$query = new Register();
		return $this->render('index',['model'=>$query]);
	}
	public function actionRegister_do(){
		//print_r($_POST);
		// $model = new Register();
		
		// //���ļ��ϴ�
		// if (Yii::$app->request->isPost) {
		//     $files = $model->file = UploadedFile::getInstances($model, 'file');
		//     foreach ($files as $file){
		//        $list =  $file->saveAs('../uploads/' . $file->baseName . '.' . $file->extension); 
		//     }
		// }
		// //ȡ���ļ���
		// foreach($files as $v){
		//     $img[] = $v->name;
		// }
		
		// //���
		// if($list){
	        $request = Yii::$app->request;
     		$data = $request->post();
     		//print_r($data);
  //   		$img = implode(',', $img);
  //   		$data["Register"]['file'] = $img;
     		$db = Yii::$app->db;
     		$list = $db->createCommand()->batchInsert('register',['username','password'],[[$data['Register']['username'],$data['Register']['password']]])->execute();
     		if($list){
     		    $this->redirect(array('index/index'));
     		}
		 //}
	}
}

?>