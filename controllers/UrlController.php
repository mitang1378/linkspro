<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Url;
use app\models\UrlForm;
use yii\filters\VerbFilter;
use app\models\Cmenu;
use yii\web\NotFoundHttpException;

class UrlController extends Controller
{
    /**
     * 常用网址
     * @return string
     */
    public function actionList($cid)
    {
        $model = Url::find()->where(['cid'=>$cid])->orderBy('order asc')->all();
        $cmenu = Cmenu::find()->where(['id'=>$cid])->one();
        $count = Url::find()->where(['cid'=>$cid])->count();
        return  $this->renderPartial('index',[
            'model'=>$model,
            'cmenu'=>$cmenu,
            'count' => $count
        ]);
    }

    /**
     * 添加网址
     */
    public function actionAdd($cid)
    {
        $model = new UrlForm();

        if($model->load(\Yii::$app->request->post()) && $model->save())
        {
            return $this->renderPartial('/msg/success',['message'=>'添加成功']);
        }
        return  $this->renderPartial('add',[
            'model'=>$model,
            'cid' =>$cid
        ]);
    }

    /**
     * 修改网址
     */
    public function actionEdit($id)
    {
        $url = Url::findOne($id);
        if($url->load(\Yii::$app->request->post()) && $url->save())
        {
            return $this->renderPartial('/msg/success',['message'=>'修改成功']);
        }
        return  $this->renderPartial('edit',[
            'url'=>$url,
        ]);
    }
    /**
     * 删除网址
     */
    public function actionDelete($id)
    {
        $mid = Yii::$app->user->getId();
        Url::deleteAll(['id'=>$id,'mid'=>$mid]);
        return $this->goBack(Yii::$app->request->getReferrer());
    }

    /**
     * 升序
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionOrderup($id)
    {
        $model = $this->findModel($id);
        if($model->order > 0)
        {
            $model->updateCounters(['order'=>-1]);
        }

        return $this->goBack(Yii::$app->request->getReferrer());
    }

    public function actionOrderdown($id)
    {
        $model = $this->findModel($id);
        $model->updateCounters(['order'=>+1]);
        return $this->goBack(Yii::$app->request->getReferrer());
    }

    /**
     * @param $id
     * @return static
     * @throws NotFoundHttpException
     */

    public function findModel($id)
    {
        $mid = Yii::$app->user->getId();
        if(($model = Url::findOne($id)) !== null )
        {
            return $model;
        }else{
            throw new NotFoundHttpException('未找到该项目');
        }
    }
}