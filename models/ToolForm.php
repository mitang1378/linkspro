<?php
namespace app\models;

use app\models\Tool;
use yii\base\Model;

class ToolForm extends Model
{
    public $title;
    public $url;
    public $order;

    public function rules()
    {
        return [
            [['title','url'],'required'],
            ['order','integer']
        ];
    }

    public function save()
    {
        if(!$this->validate())
        {
            return null;
        }
        $model = new Tool();
        $model->title = $this->title;
        $model->url   = $this->url;
        $model->oid   = $this->order;
        $model->save();
        return empty($model)?null:$model;
    }

    public function attributeLabels()
    {
        return [
            'title' => '工具名称',
            'url'   => '工具地址',
            'order' => '排序'
        ];
    }
}