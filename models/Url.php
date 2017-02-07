<?php
namespace app\models;

use yii\db\ActiveRecord;

class Url extends ActiveRecord
{
    public function rules()
    {
        return [
            [['title','url','cid'],'required'],
            [['order','id'],'integer']
        ];
    }

    public static function tableName()
    {
        return "{{%links}}";
    }

    public function attributeLabels()
    {
        return [
            'title' => '名称',
            'url'   => '地址',
            'order' => '排序'
        ];
    }
}