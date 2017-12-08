<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;//控制器
use frontend\models\Register;//模型

header('content-type:text/html;charset=utf-8');

class RegisterController extends Controller{
    public function actionAdd(){
        return $this->render('register');
    }
    public function actionAdd_do(){
        $model = new Register();
        $data = Yii::$app->request->post();
        $model->tel = $data['tel'];
        $model->password = $data['password'];
        $model->repassword = $data['repassword'];
        $id = $model->save();
        if($id){
            return $this->render('register_2',['id'=>$id]);
        }
    }
    public function actionDo(){
        $model = new Register();
        $data = Yii::$app->request->post();
        $model->name = $data['name'];
        $model->sr = $data['sr'];
        $model->address = $data['address'];
        $id = $model->save();
        if($id){
            return $this->redirect(['next']);
        }
    }
    public function actionAa(){
        return $this->render(['register_2']);
    }
    public function actionNext(){
        $model = new Register();
        Yii::$app->request->post();
        $model->save();
        return $this->render('register_3');
    }
}
