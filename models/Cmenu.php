<?php
namespace app\models;
use yii\db\ActiveRecord;

/**
 * 类别数据模型
 */
class Cmenu extends ActiveRecord
{
    public function rules()
    {
        return [
            ['name','required'],
            ['name','string','min'=>2,'max'=>'16'],
            ['orderid','integer']
        ];
    }
    public function getUrls()
    {
        return $this->hasMany(Url::className(), ['cid'=>'id'])->orderBy('order asc');
    }

    public static function tableName()
    {
        return "{{%cmenu}}";
    }

    public function attributeLabels()
    {
        return [
            'name' => '名称',
            'orderid' => '排序'
        ];
    }
}