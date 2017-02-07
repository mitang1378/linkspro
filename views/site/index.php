<?php
    use yii\helpers\Url;
?>
<html>
<head>
    <title>Bug Ask Desktop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="statics/css/font-awesome.css"/>
    <link href="statics/css/site.css" rel="stylesheet" type="text/css" />
    <link href="http://apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://apps.bdimg.com/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.js"></script>
    <script src="statics/layer/layer.js"></script>
    <link rel="icon" href="statics/img/favicon.ico">
    <style>
        .prettyprint ol.linenums > li {
            list-style-type: decimal;
        }
    </style>
</head>
<body style="background: url(<?php if(empty($bgimg)){?>/statics/img/bg.jpg<?php }else{echo $bgimg; }?>)">
<div class="container">
    <form action="http://www.baidu.com/baidu" target="_blank">
        <div class="col-md-2 col-sm-12 text-center bd_logo">
            <img src="statics/img/bd_logo.png" width="200" alt="Baidu" border="0" class="img-responsive">
        </div>
        <div class="col-md-8 col-sm-12 bd_input">
            <input type="text"  onfocus="checkHttps" name="word"  size="30" placeholder="site:www.bugask.com">
        </div>
        <div class="col-md-2 col-sm-12 bd_submit text-center">
            <input type="submit" value="百度搜索">
        </div>
    </form>
</div>
<div class="container" style="margin-top:50px;">
    <div class="col-md-3 col-sm-12">
        <?php foreach ($left_menu as $menu){?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-large"></span><?=$menu['name']?>
                <a href="<?=Url::toRoute(['/site/stopmodel','id'=>$menu['id']]);?>" class="pull-right panel-icon"><span class="glyphicon glyphicon-trash"></span></a>
                <a onclick="tipwindows(<?=$menu['id']?>)" class="pull-right panel-icon"><span class="glyphicon glyphicon-wrench"></span></a>
            </div>
            <div class="panel-body">
                <?php
                foreach ($menu['urls'] as $li){
                    ?>
                    <a href="<?=$li['url']?>" target="_blank">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <?=$li['title']?>
                    </a>
                <?php }?>
            </div>
        </div>
        <?php }?>
        <div class="row text-center">
            <a href="javascript:;" onclick="addModel('left')" class="sbtn sbtn-success w100">新增模块</a>
        </div>
    </div>
    <div class="col-md-8 col-sm-12 pull-right" style="padding-right:0;">
        <?php foreach ($right_menu as $menu){?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-large"></span><?=$menu['name']?>
                <a href="<?=Url::toRoute(['/site/stopmodel','id'=>$menu['id']]);?>" class="pull-right panel-icon"><span class="glyphicon glyphicon-trash"></span></a>
                <a onclick="tipwindows(<?=$menu['id']?>)" class="pull-right panel-icon"><span class="glyphicon glyphicon-wrench"></span></a>
            </div>
            <div class="panel-body url_list">
                <?php
                foreach ($menu['urls'] as $li){
                    ?>
                    <a href="<?=$li['url']?>" target="_blank">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <?=$li['title']?>
                    </a>
                <?php }?>
            </div>
        </div>
        <?php }?>
        <div class="row text-center">
            <a href="javascript:;" onclick="addModel('right')" class="sbtn sbtn-success w100">新增模块</a>
        </div>
    </div>
</div>

<div class="circle">
    <div class="ring">
        <a href="/" class="menuItem fa fa-home fa-2x"></a>
        <a href="#" class="menuItem fa fa-comment fa-2x"></a>
        <a href="#" class="menuItem fa fa-calendar fa-2x"></a>
        <a href="javascript:;" onclick="bgImg()" class="menuItem fa fa-camera fa-2x"></a>
        <a href="<?=Url::toRoute('/site/logout')?>" class="menuItem fa fa-power-off fa-2x" data-method="post"></a>
        <a href="<?=Url::toRoute('/site/login')?>" class="menuItem fa fa-user fa-2x"></a>
        <a href="#" class="menuItem fa fa-cogs fa-2x"></a>
        <?if (Yii::$app->user->getIdentity()->email='83398365@qq.com') { ?>
        <a href="javascript:;" onclick="cmenu()" class="menuItem fa fa-bars fa-2x"></a>
        <?}?>
    </div>
    <a href="#" class="center fa fa-th fa-2x"></a>
</div>
<script type="text/javascript">
    function tipwindows(cid) {
        //iframe层
        layer.open({
            type: 2,
            title: "管理模块",
            shadeClose: true,
            shade: 0.8,
            area: ['400px', '40%'],
            content:'/url/list?cid='+cid//iframe的url
        });
    }
    function cmenu() {
        //iframe层
        layer.open({
            type: 2,
            title: '设置类别',
            shadeClose: true,
            shade: 0.8,
            area: ['400px', '40%'],
            content: '/cmenu/list' //iframe的url
        });
    }
    //新增模块
    function addModel(location) {
        //iframe层
        layer.open({
            type: 2,
            title: '新增模块',
            shadeClose: true,
            shade: 0.8,
            area: ['400px', '40%'],
            content: '/site/addmodel/?location='+location //iframe的url
        });
    }
    //背景图管理
    function bgImg() {
        //iframe层
        layer.open({
            type: 2,
            title: '背景管理',
            shadeClose: true,
            shade: 0.8,
            area: ['480px', '40%'],
            content: '/upfiles/bglist/' //iframe的url
        });
    }
    var items = document.querySelectorAll('.menuItem');
    for(var i = 0, l = items.length; i < l; i++) {
        items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
        items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
    }
    document.querySelector('.center').onclick = function(e) {
        e.preventDefault();
        document.querySelector('.circle').classList.toggle('open');
    }
</script>

</body>
</html>
