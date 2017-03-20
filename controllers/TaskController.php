<?php
namespace app\controllers;

use app\models\Task;
use Yii;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;
use app\models\TaskForm;
class TaskController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionAdd()
    {
        $mid = Yii::$app->user->getId();
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new TaskForm();
        $model->setAttributes(['task'=>Yii::$app->request->post('task')]);
        if($model->save())
        {
            $task_list = Task::find()->where(['mid'=>$mid])->asArray()->all();
            $data = ['code'=>0,'message'=>'添加任务成功！','task_list'=>$task_list];
        }else{
            $data = ['code'=>1,'message'=>'添加任务失败！'];
        }

        return $data;
    }

    public function actionDel($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $mid = Yii::$app->user->getId();
        $model = Task::find()->where(['id'=>$id,'mid'=>$mid])->one();
        if($model)
        {
            $model->delete();
            $data = ['code'=>0,'message'=>'任务删除成功'];
        }else{
            $data = ['code'=>1,'message'=>'任务删除失败'];
        }

        return $data;
    }


}