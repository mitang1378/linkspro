<?php
namespace app\models;

use yii\db\ActiveRecord;

class Tool extends ActiveRecord
{
    public static function tableName()
    {
        return "{{%tools}}";
    }
    
}