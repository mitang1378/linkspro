<?php
namespace app\controllers;
use Yii;
use app\models\CmenuForm;
use yii\web\Controller;
use app\models\Cmenu;
/**
 * 类别管理
 */
class CmenuController extends Controller{

    /**
     * 类别列表
     */
    public function actionList()
    {
        $model = Cmenu::find()->where(['mid'=>Yii::$app->user->getId()])->all();
        return $this->renderPartial('index',[
            'model' => $model
        ]);
    }

    /*
     * 添加类别
     */
    public function actionAdd()
    {
        $model = new CmenuForm();
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->renderPartial('/msg/success',['message'=>'分类添加成功']);
        }

        return $this->renderPartial('/cmenu/add',['model'=>$model]);
    }
}