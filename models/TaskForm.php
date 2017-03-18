<?php
namespace app\models;

use yii\base\Model;
use app\models\Task;
class TaskForm extends Model
{
    public $task;

    public function rules()
    {
        return [
          ['task','required'],
          ['task','string']
        ];
    }

    public function save()
    {
        if(!$this->validate())
        {
            return null;
        }

        $model = new Task();
        $model->task = $this->task;
        return $model->save()?$model:null;
    }

}