<?php
namespace app\models;

use app\models\Url;
use yii\base\Model;

class UrlForm extends Model
{
    public $title;
    public $url;
    public $order;
    public $cid;
    public function rules()
    {
        return [
            [['title','url','cid'],'required'],
            [['order'],'integer']
        ];
    }

    /**
     * 保存常用网址
     * @return \app\models\Url|null
     */
    public function save()
    {
        if(!$this->validate())
        {
            return null;
        }
        $mid = \Yii::$app->user->getId();
        if(empty($this->id)){
            $model = new Url();
        }else{
            $model = Url::find()->where(['id'=>$this->id])->one();
        }
        $model->title = $this->title;
        $model->url   = $this->url;
        $model->order   = $this->order;
        $model->cid   = $this->cid;
        $model->mid   = $mid;
        $model->save();
        return  empty($model)?null:$model;
    }

    public function attributeLabels()
    {
        return [
            'title' =>  '网站名称',
            'url'   =>  '网址',
            'order' =>  '排序'
        ];
    }

}