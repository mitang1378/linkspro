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
        <a href="<?=Url::to('/tool/add');?>" class="btn btn-success" style="margin: 15px 20px 15px 0;">添加工具</a>
    </p>
    <table class="table table-bordered table-hover">
        <?php
        foreach ($model as $li) {
            ?>
            <tr>
                <td width="20"><span class="glyphicon glyphicon-record"></span></td>
                <td>
                    <?=$li->title?>
                </td>
                <td width="60">
                    <a href="#"><span class="glyphicon glyphicon-cog"></span></a>
                    <a href="#"><span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>

