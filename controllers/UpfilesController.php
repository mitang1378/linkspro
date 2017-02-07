<?php
namespace app\controllers;

use app\models\Upfiles;
use Yii;
use yii\web\Controller;
use app\models\BgimgForm;
class UpfilesController extends Controller{
    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'app\common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/upload/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ]
        ];
    }

    /**
     * 背景图列表
     */
    public function actionBglist()
    {
        $mid = Yii::$app->user->getId();
        $list = Upfiles::find()->where(['mid'=>$mid,'class'=>'bgimg'])->all();
        return $this->renderPartial('list',['list'=>$list]);
    }

    /**
     * 背景图上传
     * @return string|\yii\web\Response
     */
    public function actionBgimg()
    {
        $model = new BgimgForm();
        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect('/upfiles/bglist');
        }

        return $this->renderAjax('add',['model'=>$model]);
    }

    /**
     * 选择使用背景图
     */
    public function actionChoose($id)
    {
        $model = new BgimgForm();
        $mid = Yii::$app->user->getId();
        $model->changeStatus($mid);
        $model->chooseBg($id, $mid);
        return $this->redirect('/upfiles/bglist');
    }

}