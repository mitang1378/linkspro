<?php
namespace app\controllers;
use Yii;
use app\models\CmenuForm;
use yii\web\Controller;
use app\models\Cmenu;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $count = Cmenu::find()
                ->where(['mid'=>Yii::$app->user->getId()])
                ->orderBy('orderid asc')
                ->count();
        return $this->renderPartial('index',[
            'model' => $model,
            'count' => $count
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

    /**
     * 修改类别
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionEdit($id)
    {
        $model = $this->findModel($id);
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->renderPartial('/msg/success',['message'=>'分类修改成功']);
        }

        return $this->renderPartial('/cmenu/add',['model'=>$model]);
    }

    /*
     *升序
     */
    public function actionOrderup($id)
    {
        $model = $this->findModel($id);
        if($model->orderid > 0){
            $model->updateCounters(['orderid'=>-1]);
        }
        return $this->redirect('/cmenu/list');
    }

    /**
     * 降序
     * @param $id
     */
    public function actionOrderdown($id)
    {
        $model = $this->findModel($id);
        $model->updateCounters(['orderid'=>+1]);
        return $this->redirect('/cmenu/list');
    }
    /**
     * 删除操作
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     */
    public function actionDel($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect('/cmenu/list');
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