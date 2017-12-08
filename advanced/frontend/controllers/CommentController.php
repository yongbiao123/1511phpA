<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;//控制器
use yii\data\Pagination;//分页
use frontend\models\Comment;//模型
use frontend\models\Admin;//模型

header('content-type:text/html;charset=utf-8');//防止乱码

class CommentController extends Controller{

    public function actionLog(){
        $model = new Admin();
        return $this->render('login',['model' => $model]);
    }

    public function actionLogin(){
        $arr = Yii::$app->request->post('Admin');//接值
        $username = $arr['username'];
        $password = $arr['password'];

        $connection = \Yii::$app->db;
        $command = $connection->createCommand("SELECT * FROM admin WHERE username='".$username."' and password='".$password."'")->queryOne();

        if($command){
            //设置session
            $session = Yii::$app->session;
            $session->set('username',$username);
            return $this->redirect(['comment/index']);//视图层index.php页面
        }else{
            return $this->redirect(['comment/log']);//视图层log.php页面
        }
    }

    public function actionIndex(){
        //读取session
        $session = Yii::$app->session;
        $username = $session->get('username');
        //分页代码
        $query = Comment::find();

        $pagination = new Pagination([
            'defaultPageSize' => 3,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'username' => $username,
            'list' => $countries,
            'pagination' => $pagination,
        ]);
    }

    public function actionSave(){
        //读取session
        $session = Yii::$app->session;
        $username = $session->get('username');
        //实例化 Comment 模型层
        $model = new Comment();
        if($model->load(Yii::$app->request->post())){
            // 验证 $model 收到的数据
            // 做些有意义的事 ...
            if($id = Yii::$app->request->get('id')){//判断id是否存在
                $model = $model->findOne($id);//查找要修改的数据
                $post=Yii::$app->request->post('Comment');//修改后的数据
                $model->comment=$post['comment'];//赋值
            }else{
                $model->username = $username;
            }
            //进行添加 修改操作
            $id = $model->save();
            if($id){
                return $this->redirect(['comment/index']);
            }
        }else{
            // 无论是初始化显示还是数据验证错误
            if($id = Yii::$app->request->get('id')){//获取到要修改的id
                $model = $model->findOne($id);//通过id查到对应的数据
            }
            return $this->render('save',['model' => $model]);
        }
    }

    public function actionDel(){
        $id = Yii::$app->request->get('id');
        $model = new Comment();
        $res = $model->deleteAll('id=:id', [':id' => $id]);
        if($res){
            return $this->redirect(['comment/index']);
        }
    }
}



























