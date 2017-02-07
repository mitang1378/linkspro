<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Url;
use app\models\UrlForm;
use yii\filters\VerbFilter;
use app\models\Cmenu;
class UrlController extends Controller
{
    /**
     * 常用网址
     * @return string
     */
    public function actionList($cid)
    {
        $model = Url::find()->where(['cid'=>$cid])->all();
        $cmenu = Cmenu::find()->where(['id'=>$cid])->one();
        return  $this->renderPartial('index',[
            'model'=>$model,
            'cmenu'=>$cmenu
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
}