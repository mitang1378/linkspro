<?php
use yii\helpers\Url;
?>
<html>
<head>
    <title>Bug Ask Desktop</title>
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="statics/css/site.css">
</head>
<body>
<p class="text-right">
    <a href="<?=Url::to(['/url/add','cid'=>$cmenu->id]);?>" class="btn btn-success" style="margin: 15px 20px 15px 0;">添加<?=$cmenu->name?></a>
</p>
<table class="table table-bordered table-hover">
    <?php
    foreach ($model as $k => $li) {
        ?>
        <tr>
            <td width="20"><span class="glyphicon glyphicon-record"></span></td>
            <td>
                <?=$li->title?>
            </td>
            <td width="60">
                <a href="<?=Url::toRoute(['/url/orderup','id'=>$li->id])?>" class="btn <?= $k==0?'disabled':''?>" style="padding: 0;"><span class="glyphicon glyphicon-arrow-up"></span></a>
                <a href="<?=Url::toRoute(['/url/orderdown','id'=>$li->id])?>" class="btn <?= $k==($count-1)?'disabled':''?>"  style="padding: 0;"><span class="glyphicon glyphicon-arrow-down"></span></a>
            </td>
            <td width="60">
                <a href="<?=Url::toRoute(['/url/edit','id'=>$li->id])?>"><span class="glyphicon glyphicon-cog"></span></a>
                <a href="<?=Url::toRoute(['/url/delete','id'=>$li->id])?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>