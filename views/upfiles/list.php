<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;
$this->title = "管理背景图";
?>
<html>
<head>
    <title><?=$this->title?>-Bug Ask Desktop</title>
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="/statics/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row bglist">
        <?php
            foreach ($list as $li){
        ?>
           <div class="item">
                 <img src="<?=$li->path?>" class="img-thumbnail">
                 <?php
                    if($li->status == 1){
                 ?>
                    <span>使用中</span>
                 <?php
                    }else {
                        ?>
                    <a class="choose" href="<?=Url::toRoute(['/upfiles/choose','id'=>$li->id])?>">选中</a>
                        <?php
                    }
                 ?>   
           </div>
        <?php
            }
        ?>
        <div class="item">
            <a href="<?=Url::toRoute(['/upfiles/bgimg'])?>">
                <img src="/statics/img/upload.png" class="img-thumbnail">
            </a>
        </div>
    </div>
</div>
</body>
</html>