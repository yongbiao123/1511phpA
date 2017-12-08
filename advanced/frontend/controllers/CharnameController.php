<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;//控制器
use yii\data\Pagination;//分页
use frontend\models\Charname;//模型

header('content-type:text/html;charset=utf-8');//防止乱码

class CharnameController extends Controller
{
	//防止攻击
	public $enableCsrfValidation = false;
    //public $layout = false;
	public function actionAdd(){
		return $this->render('add');
	}
	//展示界面
	public function actionShow(){
		$model = new Charname();
	    $pagination = new Pagination([
            'defaultPageSize' => 3,//每页显示3条数据
            'totalCount' => $model->find()->count(),//统计总条数
        ]);
        $list = $model->find()
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->asArray()
                ->all();
		return $this->render('index',[
            'list'=>$list,
            'pagination'=>$pagination
        ]);
	}
	//添加页面
    public function actionAdd_do(){
        $model = new Charname();
        $data = Yii::$app->request->post();
        $model->name = $data['name'];
        $model->value = $data['value'];
        $model->type = $data['type'];
        $model->tian = $data['tian'];
        $model->yz = $data['yz'];
        $model->long = $data['xiao'].'-'.$data['da'];
        $model->save();
        return $this->redirect(['show']);
    }
	//删除
	public function actionDel(){
		$id = Yii::$app->request->get('id');
		$model = new Charname();
        $model->deleteAll(['id'=>$id]);
		return $this->redirect(['show']);
	}
	//修改界面
	public function actionUpdate(){
		$id = Yii::$app->request->get('id');
		$model = new Charname();
		$data = $model->find()->where(['id'=>$id])->asArray()->one();
		$res = explode("-", $data['long']);
		$data['xiao']=$res[0];
		$data['da']=$res[1];
		return $this->render('update',['data'=>$data]);
	}
	//执行修改
	public function actionUpdate_do(){
		$data = Yii::$app->request->post();//修改后的数据
        $id = $data['id'];
		$model = new Charname();
		$res = $model->findOne($id);//修改前的数据
        $res->name = $data['name'];
        $res->value=$data['value'];
        $res->type=$data['type'];
        $res->yz=$data['yz'];
        $res->tian=$data['tian'];
        $res->long=$data['xiao'].'-'.$data['da'];
		$res->save();
		return $this->redirect(['show']);
	}
}
?>