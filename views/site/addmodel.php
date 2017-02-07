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
<table class="table table-bordered table-hover">
    <?php
    foreach ($model as $li) {
        ?>
        <tr <?php if($li->location != 0){?>class="active" <?php }?>>
            <td width="20"><span class="glyphicon glyphicon-record"></span></td>
            <td>
                <?=$li->name?>
            </td>
            <?php if($li->location == 0){?>
            <td width="60" class="text-center">
                <a href="<?=Url::toRoute(['/site/plusmodel','id'=>$li->id,'location'=>$location])?>"><span class="glyphicon glyphicon-plus"></span></a>
            </td>
            <?php }?>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>

