<?php
namespace app\models;
use yii\base\Model;
use app\models\Cmenu;
/**
 * 类别表单模型
 */
class CmenuForm extends Model{
    public $name;
    public function rules()
    {
        return [
            ['name','required'],
            ['name','string','min'=>2,'max'=>'16']
        ];
    }

    /**
     * 存储类别
     */
    public function save()
    {
        if(!$this->validate())
        {
            return null;
        }
        $model = new Cmenu();
        $model->name = $this->name;
        $model->mid  = \Yii::$app->user->getId();
        $model->location = 0;
        return $model->save()?$model:null;
    }

    /**
     * 字段别名
     */
    public function attributeLabels()
    {
        return [
          'name' => '名称',
        ];
    }
}