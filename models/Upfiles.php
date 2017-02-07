<?php
namespace app\models;

use yii\db\ActiveRecord;
class Upfiles extends ActiveRecord{
    public static function tableName()
    {
        return "{{%upfiles}}";
    }
}