<?php
namespace app\models;
use yii\db\ActiveRecord;

/**
 * 类别数据模型
 */
class Cmenu extends ActiveRecord
{
    public function getUrls()
    {
        return $this->hasMany(Url::className(), ['cid'=>'id']);
    }

    public static function tableName()
    {
        return "{{%cmenu}}";
    }
}