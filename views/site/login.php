<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login">
    <div class="login-content">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
        ]); ?>
            <div class="form-group m-b-20">
                <input type="text" name="LoginForm[email]" class="form-control input-lg" placeholder="Email Address">
            </div>
            <div class="form-group m-b-20">
                <input type="password" name="LoginForm[password]" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="login-buttons m-b-20">
                <button type="submit" class="btn btn-success btn-block btn-lg">登录管理</button>
            </div>
            <div class="login-buttons">
                <a href="<?=Url::toRoute('site/register')?>" target="_self" class="btn btn-info btn-block btn-lg">立即注册</a>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
