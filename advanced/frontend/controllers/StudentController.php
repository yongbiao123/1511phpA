<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;//控制器
use yii\data\Pagination;//分页
use frontend\models\Student;//模型

header('content-type:text/html;charset=utf-8');//防止乱码

class StudentController extends Controller{

    public function actionIndex(){
        $query = Student::find();
        $pagination = new Pagination(['defaultPageSize' => 3, 'totalCount' => $query->count(),]);
        $countries = $query->orderBy('id')->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index', [
            'list' => $countries,
            'pagination' => $pagination,
        ]);
    }

    public function actionSave(){
        $model = new Student();//实例化Student 模型层
        //载入的数据 进行验证
        if($model->load(Yii::$app->request->post())){
            // 验证 $model 收到的数据
            if($id = Yii::$app->request->get('id')){
                //修改
                $model = $model->findOne($id);//修改之前的数据
                $post=Yii::$app->request->post('Student');//修改之后的数据
                $model->username=$post['username'];
                $model->sex=$post['sex'];
                $model->age=$post['age'];
                $model->hobby=implode(',',$post['hobby']);//将数组用，隔开
            }else{
                //添加
                $model->hobby = implode(',',$model->hobby);
            }
            //进行添加 修改操作
            $id = $model->save();
            if($id){
                return $this->redirect(['student/index']);
            }
        }else{
            // 无论是初始化显示还是数据验证错误
            //修改ID
            if($id = Yii::$app->request->get('id')){
                $model = $model->findOne($id);//修改之前的数据
                $model->hobby = explode(',',$model->hobby);//让之前的爱好默认选中
            }
            return $this->render('save',['model' => $model]);
        }
    }

    public function actionDel(){
        $id = Yii::$app->request->get('id');
        $model = new Student();
        $res = $model->deleteAll('id=:id', [':id' => $id]);
        if($res){
            return $this->redirect(['student/index']);
        }
    }
}



























