<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
$this->title = "添加背景图";
?>
<html>
<head>
    <title><?=$this->title?>-Bug Ask Desktop</title>
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'path')->widget('app\common\widgets\file_upload\FileUpload',[
        'config'=>[
            //图片上传的一些配置，不写调用默认配置
            'domain_url' => 'http://site.bugask.com',
        ]
    ])->label(false) ?>
    <div class="form-group">
        <?=\yii\helpers\Html::submitButton('保存背景',['class'=>'btn btn-success save'])?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
</body>
</html>