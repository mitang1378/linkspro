<?php
use yii\bootstrap\ActiveForm;
$this->title ="注册";
?>
<div class="container">
    <div class="row">
        <div class="register">
            <div class="panel panel-inverse">
                <div class="panel-heading"><h4 class="panel-title">注册</h4></div>
                <div class="panel-body panel-form">
                    <?php $form = ActiveForm::begin([
                        'id' => 'register-form',
                        'options' => ['class'=>'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-md-6\">{input}</div>\n<div class=\"col-md-4\">{error}</div>",
                            'labelOptions' => ['class' => 'control-label col-md-2 col-sm-2'],
                        ]
                    ]); ?>
                    <?=$form->field($model,'email')->textInput()?>
                    <?=$form->field($model,'password')->passwordInput()?>
                    <?=$form->field($model,'repassword')->passwordInput()?>
                    <?=$form->field($model,'nickname')->textInput()?>
                    <div class="form-group text-center" style="padding: 20px 0;">
                            <button type="submit" class="btn btn-success">立即注册</button>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>
