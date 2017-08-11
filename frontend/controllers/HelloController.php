<?php

namespace frontend\controllers;
use yii\web\Controller;
use common\models\Aa;
use common\models\LoginForm;
use yii\data\Pagination;
use Yii;

class HelloController extends Controller{

	public function actionDemo1(){

        //DAO模式
        // $db = Yii::$app->db;
        // //查询
        // $id = Yii::$app->request->get('id');
        // $list = $db->createCommand('select * from aa where id = :id',[':id'=>$id])->queryAll();
        // $listone = $db->createCommand('select * from aa')->queryOne();
        // $listnum = $db->createCommand('select count(*) from aa')->queryScalar();
        //修改
        // $upl = $db->createCommand('update aa set username=999 where id=28')->execute();
        // $upl1 = $db->createCommand()->update('aa',['username'=>'我擦'],'id=28')->execute();
        //多条添加
        // $ins = $db->createCommand()->batchInsert('aa',['username','password','email'],[[123,123,'123@qq.com'],[456,456,'456@qq.com'],[789,789,'789@qq.com']])->execute();
        // 删除
        //$del = $db->createCommand()->delete('aa','id=35')->execute();
        //var_dump($del);



		//$query = new Aa();
		// $list = $query->findBysql('select * from country')->asarray()->all();
		// $list = $query->findBysql('select * from country')->asarray()->one();
		// 搜索
		//$list = $query->find()->where(['u_name'=>'我擦'])->asarray()->one();
		
		//添加
		// $query->u_name = '我擦';
		// $query->insert();
		
		//删除
		// $id = 1;
		// $query->findOne($id)->delete();
		
		//修改
		// $list = $query->find()->where(['id'=>2])->one();
		// $list->u_name = '妹的';
		// $list->save();
		//print_r($list);
		 return $this->render('demo');
		}
		public function actionDemo(){

        	$model=new Aa();
            return $this->render('demo', [
                'model' => $model,
            ]);
    	}

        //添加
    	public function actionShow(){
    		$query = new Aa();
    		$request = Yii::$app->request;
    		$data = $request->post();
    		if($query->load($data)){
    			$query->save();
    		}else{
    			echo '添加失败';
    		}
    	 	$this->redirect(array('/hello/show2'));
    	}


        //展示
    	public function actionShow2(){
    		$query = new Aa();
    		$pagination = new Pagination([
		 		'defaultPageSize' => 5,
		 		'totalCount' => $query->find()->count(),
		 		]);
				 $countries = $query->find()->orderBy('id')
		 			->offset($pagination->offset)
		 			->limit($pagination->limit)
		 			->all();
    			return $this->render('show',[
    					'list' => $countries,
    					'pagination'=>$pagination
    				]);
    	}

        //删除
    	public function actionDel(){
    		$query = new Aa();
    		$id = $_GET['id'];
    		$res = $query->findOne($id)->delete();
    		if($res){
    			$this->redirect(array('/hello/show2'));
    		}else{
    			echo '删除失败';
    		}
    	}

        //修改
	    public function actionUpl(){
            $id = $_GET['id'];
            $query = new Aa();
            $list = $query->find()->where(['id'=>$id])->asArray()->one();
            return $this->render('gai',['list'=>$list,'model'=>$query]);   
        }
        public function actionGaile(){
            $data = $_POST;
            $id = $data['Aa']['id'];
            $query = new Aa();
            $list = $query->find()->where(['id'=>$id])->one();
            $list->username = $data['Aa']['username'];
            $list->email = $data['Aa']['email'];
            $list->address = $data['Aa']['address'];
            $res = $list->save();
           if($res){
                $this->redirect(array('/hello/show2'));
           }else{
            echo '修改失败';
           }
        }
}

?>