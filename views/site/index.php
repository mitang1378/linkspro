<?php
    use yii\helpers\Url;
?>
<html>
<head>
    <title>Bug Ask Desktop</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="statics/css/font-awesome.css"/>
    <link href="statics/css/site.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="statics/css/mplayer.css">
    <link rel="stylesheet" href="statics/css/taskmodel.css">
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
                <span class="glyphicon glyphicon-th-large"></span><span class="title"><?=$menu['name']?></span>
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

        <!---------------------任务模块开始------------------------->
        <div class="task_model">
            <div class="list-group" id="tasklist">
                <a href="#" class="list-group-item list-group-item-info">
                    任务列表
                    <span class="pull-right" id="task_add"><i class="glyphicon glyphicon-plus"></i> </span>
                </a>
                <?php foreach ($tasklist as $item){ ?>
                <a href="#" class="list-group-item taskitem">
                    <?=$item['task']?>
                    <span class="trash task_trash" data-id="<?=$item['id']?>"><i class="glyphicon glyphicon-trash"></i></span>
                </a>
                <?php } ?>
            </div>
        </div>
        <!---------------------任务模块结束------------------------->
        <div class="row text-center">
            <a href="javascript:;" onclick="addModel('left')" class="sbtn sbtn-success w100">
                新增模块
            </a>
        </div>
    </div>
    <div class="col-md-8 col-sm-12 pull-right" style="padding-right:0;">
        <?php foreach ($right_menu as $menu){?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-th-large"></span><span class="title"><?=$menu['name']?></span>
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
<!-------------------音乐播放器开始-------------------------->
<div class="mp">
    <div class="mp-box">
        <img src="/statics/img/mplayer_error.png" alt="music cover" class="mp-cover">
        <div class="mp-info">
            <p class="mp-name">燕归巢</p>
            <p class="mp-singer">许嵩</p>
            <p><span class="mp-time-current">00:00</span>/<span class="mp-time-all">00:00</span></p>
        </div>
        <div class="mp-btn">
            <button class="mp-prev" title="上一首"></button>
            <button class="mp-pause" title="播放"></button>
            <button class="mp-next" title="下一首"></button>
            <button class="mp-mode" title="播放模式"></button>
            <div class="mp-vol">
                <button class="mp-vol-img" title="静音"></button>
                <div class="mp-vol-range" data-range_min="0" data-range_max="100" data-cur_min="80">
                    <div class="mp-vol-current"></div>
                    <div class="mp-vol-circle"></div>
                </div>
            </div>
        </div>
        <div class="mp-pro">
            <div class="mp-pro-current"></div>
        </div>
        <div class="mp-menu">
            <button class="mp-list-toggle"></button>
            <button class="mp-lrc-toggle"></button>
        </div>
    </div>
    <button class="mp-toggle">
        <span class="mp-toggle-img"></span>
    </button>
    <div class="mp-lrc-box">
        <ul class="mp-lrc"></ul>
    </div>
    <button class="mp-lrc-close"></button>
    <div class="mp-list-box">
        <ul class="mp-list-title"></ul>
        <table class="mp-list-table">
            <thead>
            <tr>
                <th>歌名</th>
                <th>歌手</th>
                <th>时长</th>
            </tr>
            </thead>
            <tbody class="mp-list"></tbody>
        </table>
    </div>
</div>
<script src="/statics/js/mplayer.js"></script>
<script src="/statics/js/mplayer-list.js"></script>
<script src="/statics/js/mplayer-functions.js"></script>
<script src="/statics/js/jquery.nstSlider.min.js"></script>
<script>
    var modeText = ['顺序播放','单曲循环','随机播放','列表循环'];
    var player = new MPlayer({
        // 容器选择器名称
        containerSelector: '.mp',
        // 播放列表
        songList: mplayer_song,
        // 专辑图片错误时显示的图片
        defaultImg: '/statics/img/mplayer_error.png',
        // 自动播放
        autoPlay: false,
        // 播放模式(0->顺序播放,1->单曲循环,2->随机播放,3->列表循环(默认))
        playMode:0,
        playList:0,
        playSong:0,
        // 当前歌词距离顶部的距离
        lrcTopPos: 34,
        // 列表模板，用${变量名}$插入模板变量
        listFormat: '<tr><td>${name}$</td><td>${singer}$</td><td>${time}$</td></tr>',
        // 音量滑块改变事件名称
        volSlideEventName:'change',
        // 初始音量
        defaultVolume:80
    }, function () {
        // 绑定事件
        this.on('afterInit', function () {
            //console.log('播放器初始化完成，正在准备播放');
        }).on('beforePlay', function () {
            var $this = this;
            var song = $this.getCurrentSong(true);
            var songName = song.name + ' - ' + song.singer;
           //console.log('即将播放'+songName+'，return false;可以取消播放');
        }).on('timeUpdate', function () {
            var $this = this;
            //console.log('当前歌词：' + $this.getLrc());
        }).on('end', function () {
            var $this = this;
            var song = $this.getCurrentSong(true);
            var songName = song.name + ' - ' + song.singer;
            //console.log(songName+'播放完毕，return false;可以取消播放下一曲');
        }).on('mute', function () {
            var status = this.getIsMuted() ? '已静音' : '未静音';
            //console.log('当前静音状态：' + status);
        }).on('changeMode', function () {
            var $this = this;
            var mode = modeText[$this.getPlayMode()];
            $this.dom.container.find('.mp-mode').attr('title',mode);
            //console.log('播放模式已切换为：' + mode);
        });
    });

    $(document.body).append(player.audio); // 测试用

    setEffects(player);

</script>

<!-------------------音乐播放器结束-------------------------->

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
    //添加任务
    $('#task_add').on("click",function () {
        layer.prompt({title: '添加任务', formType: 2}, function(text, index){
            layer.close(index);
            $.ajax({
                url :'<?=Url::to(['/task/add'])?>',
                type:'post',
                data:{task:text},
                success:function (data) {
                    layer.msg(data.message);
                    $('#tasklist .taskitem').remove();
                    $.each(data.task_list,function (i,item) {
                        $("#tasklist").append('<a href="#" class="list-group-item">'+item.task+'<span class="trash task_trash" data-id="'+item.id+'"><i class="glyphicon glyphicon-trash"></i></span></a>');
                    })
                },
                error:function () {
                    layer.msg('服务器通信失败');
                }
            });
        });
    });
    //删除任务
    $('.task_trash').on('click',function () {
        task = $(this).parent('.list-group-item');
        id   = $(this).data('id');
        if(id){
            $.ajax({
                url:'<?=Url::to(['/task/del'])?>',
                type:'get',
                data:{id:id},
                success:function (data) {
                    if(data.code == 0)
                    {
                      task.fadeOut("slow");
                    }else{
                      layer.msg('任务删除失败');
                    }
                },
                error:function () {
                    layer.msg('服务器通信失败');
                }
            });
        }else{
            layer.msg('需要删除的任务不存在');
        }
    });
</script>

</body>
</html>
