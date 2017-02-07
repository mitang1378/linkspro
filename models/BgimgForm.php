<?php
namespace app\models;

use yii\base\Model;
use app\models\Upfiles;

class BgimgForm extends Model{

    public $path;

    public function rules()
    {
        return [
            ['path','required'],
            ['path','string']
        ];
    }

    public function save()
    {
        if(!$this->validate())
        {
            return null;
        }
        $mid = \Yii::$app->user->getId();
        $this->changeStatus($mid);//变更背景图使用状态
        $model = new Upfiles();
        $model->path = $this->path;
        $model->status = 1;
        $model->created_at = time();
        $model->mid = $mid;
        $model->class = 'bgimg';
        return $model->save()?$model:null;
    }

    /**
     * 变更该用户背景图使用状态
     * @param $mid
     */
    public function changeStatus($mid)
    {
        Upfiles::updateAll(['status'=>0],['mid'=>$mid,'class'=>'bgimg']);
    }

    /**
     * 选择使用中背景
     */
    public function chooseBg($id,$mid)
    {
        Upfiles::updateAll(['status'=>1],['mid'=>$mid,'id'=>$id]);
    }
}