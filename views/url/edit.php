<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
$this->title = "修改网址";
?>
<html>
<head>
    <title><?=$this->title?>-Bug Ask Desktop</title>
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="statics/css/site.css">
</head>
<body>
<div class="container">
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{endWrapper}\n{error}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-4',
                'wrapper' => 'col-sm-8',
                'error' => '',
                'hint' => '',
            ],
        ],
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?=$form->field($url, 'title')->textInput(['maxlength' => true])?>
    <?=$form->field($url, 'url')->textInput(['maxlength' => true])  ?>
    <?=$form->field($url, 'order')->textInput(['maxlength'=>true])  ?>
    <?=$form->field($url, 'cid')->hiddenInput()->label(false)?>
    <div class="form-group text-center">
        <?= Html::resetButton('重置', ['class' => 'btn  btn-primary']) ?>
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>
    <?php
    ActiveForm::end();
    ?>
</div>
</body>
</html>