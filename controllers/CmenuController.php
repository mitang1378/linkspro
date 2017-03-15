<?php
namespace app\controllers;
use Yii;
use app\models\CmenuForm;
use yii\web\Controller;
use app\models\Cmenu;
use yii\web\NotFoundHttpException;

/**
 * 类别管理
 */
class CmenuController extends Controller{

    /**
     * 类别列表
     */
    public function actionList()
    {
        $model = Cmenu::find()
                 ->where(['mid'=>Yii::$app->user->getId()])
                 ->orderBy('orderid asc')
                 ->all();
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

    public function actionEdit($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->renderPartial('/msg/success',['message'=>'分类修改成功']);
        }

        return $this->renderPartial('/cmenu/add',['model'=>$model]);
    }

    public function findModel($id)
    {
        if(($model = Cmenu::findOne($id)) !== null)
        {
            return $model;
        }else{
            throw  new NotFoundHttpException('该分类已不存在！');
        }
    }
}