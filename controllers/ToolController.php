<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\ToolForm;
use app\models\Tool;
class ToolController extends Controller
{
    public function actionList()
    {
        $model = Tool::find()->with()->all();
        return $this->renderPartial('index',[
            'model' => $model
        ]);
    }

    public function actionAdd()
    {
        $model = new ToolForm();
        if($model->load(\Yii::$app->request->post()) && $model->save())
        {
            return $this->renderPartial('/msg/success',['message'=>'添加工具成功']);
        }
        return $this->renderPartial('add',['model'=>$model]);
    }
}